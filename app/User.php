<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public static function add($filds)//создание пользователя - принимаем   protected $fillable = [
        //name', 'email', 'password',];
    {
        $user = new static;
        $user->fill($filds);
        $user->save();
        return $user;
    }
    public function photos()
    {
        return $this->hasMany(Photo::class);//связь с постами 1- много
    }
    public function edit($fields)
    {
        $this->fill($fields);//получение данных
        $this->save();
    }
    public function generatePassword($password)
    {
        if ($password != null) {
            $this->password = bcrypt($password);//изменение пароля
            $this->save();
        }
    }
    public function remove()
    {
        $this->removeAvatar();//класс Storage Хранилище- удаление Аватара
        $this->delete();//удаление юзера
    }
    public function uploadAvatar($image)
    {
        if ($image == null) {
            return;
        }
        $this->removeAvatar();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->avatar = $filename;
        $this->save();
    }
    public function removeAvatar()//если есть аватар удаляем если нет то нет=)
    {
        if ($this->avatar != null) {
            Storage::delete('uploads/' . $this->avatar);
        }
    }
    public function getImage()
    {
        if ($this->avatar == null) {
            return '/img/no-image.png';
        }
        return '/uploads/' . $this->avatar;
    }
}
