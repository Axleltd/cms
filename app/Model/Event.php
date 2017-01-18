<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Event extends Model implements HasMediaConversions
{
    use HasMediaTrait;
    protected $fillable = ['title','slug','date','description','excerpt','status'];

    protected $casts = ['status' => 'boolean','date'=>'date'];

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
            ->setManipulations(['w' => 320, 'h' => 200])
            ->performOnCollections('images');

    }


}