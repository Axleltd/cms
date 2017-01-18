<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = ['title','slug','description','status'];

    protected $casts = ['status' => 'boolean'];

    public function programs()
    {
        return $this->hasMany(Program::class,'faculty_id');
    }

    public function staffs()
    {
        return $this->hasMany(Staff::class,'faculty_id');
    }
}
