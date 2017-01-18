<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Resource extends Model implements HasMediaConversions
{
    use HasMediaTrait;
    protected $fillable = ['title', 'slug', 'description', 'excerpt', 'status'];

    protected $casts = ['status' => 'boolean'];

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
            ->setManipulations(['w' => 320, 'h' => 200])
            ->performOnCollections('images');

    }
}