<?php

namespace App;

use Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Photo extends Model
{
    use Sluggable;

    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;

    protected $fillable = ['title', 'date', 'descriptions'];

    public static function add($fields)
    {
        $photo = new static;
        $photo->fill($fields);
        $photo->user_id = 1;//Auth::user()->id;
        $photo->save();
        return $photo;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'photos_tag',
            'photo_id',
            'tag_id'
        );
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }
    //удаление поста
    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }
    //при удалении поста удаляем и картинку
    public function removeImage()
    {
        if ($this->image != null) {
            Storage::delete('uploads/' . $this->image);
        }
    }
    public function uploadImage($image)
    {
        if ($image == null) {
            return;
        }

        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }
    //получение изображения или рисунок по дефолту
    public function getImage()
    {
        if ($this->image == null) {
            return '/img/no-image.png';
        }
        return '/uploads/' . $this->image;
    }
    //задание категории
    public function setCategory($id)
    {
        if ($id == null) {
            return;
        }
        $this->category_id = $id;
        $this->save();
    }
    //задание тегов
    public function setTags($ids)
    {
        if ($ids == null) {
            return;
        }
        $this->tags()->sync($ids);
    }
    public function getCategoryID()
    {
        return $this->category != null ? $this->category->id : null;
    }
    public function hasCategory()
    {
        return $this->category != null ? true : false;
    }
}
