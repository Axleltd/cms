<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
class Page extends Model implements HasMediaConversions
{
    use HasMediaTrait;
    protected $fillable = ['title','description','status'];

    protected $casts = ['status' => 'boolean'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function registerMediaConversions()
    {
		$this->addMediaConversion('thumb')
			->setManipulations(['w' => 320, 'h' => 200])
            ->performOnCollections('images');
    }
    
}
