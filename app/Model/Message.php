<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['from','content','status','type'];

    protected $casts = ['status' => 'boolean'];
}


