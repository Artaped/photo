<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use Sluggable;

    protected $fillable = ['title'];//для масового заполнения
    public function photos()//Связь через таблицу по id
    {
        return $this->belongsToMany(
            Photo::class,
            'photos_tag',
            'tag_id',
            'photo_id'
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
}
