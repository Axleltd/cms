<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Program extends Model implements HasMediaConversions
{
    use HasMediaTrait;

    protected $fillable = ['title','slug','description','intake','requirements','faculty_id','status'];

    protected $casts = ['status' => 'boolean'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class,'program_id');
    }

    public function classes()
    {
        return $this->hasMany(Classes::class,'program_id');
    }

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
            ->setManipulations(['w' => 320, 'h' => 200])
            ->performOnCollections('images');
    }

}



