<?php

namespace App\Model;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['position','username' ,'email', 'password'];

    protected $hidden= ['password','remember_token'];

    public function program()
    {
        return $this->belongsTo(Program::class,'program_id');
    }
}

