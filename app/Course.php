<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [];

    protected $casts = [];

    public function classes()
    {
        return $this->hasMany(Classes::class);
    }
}
