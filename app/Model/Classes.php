<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'excerpt', 'status'];

    protected $casts = ['status' => 'boolean'];

    protected $table = 'classes';

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function resources()
    {
        return $this->hasMany(Resource::class, 'class_id');
    }
}
