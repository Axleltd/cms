<?php

namespace App\Model;


use App\Presenters\ProfilePresenter;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Profile extends Model implements HasMediaConversions
{
    use ProfilePresenter,HasMediaTrait;
    protected $fillable = ['first_name','last_name','phone_no','alternate_phone'];

    public function parent()
    {
        return $this->morphTo();
    }
    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
            ->setManipulations(['w' => 320, 'h' => 200])
            ->performOnCollections('images');
    }
}

