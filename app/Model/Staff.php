<?php

namespace App\Model;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Staff extends Authenticatable implements HasMediaConversions
{
    use Notifiable, HasMediaTrait;

    protected $fillable = ['position', 'username', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function resources()
    {
        return $this->hasMany(Resource::class, 'staff_id');
    }

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
            ->setManipulations(['w' => 320, 'h' => 200])
            ->performOnCollections('images');

    }
}
