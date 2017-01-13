<?php

namespace App\Http\Controllers\Api;


use App\User;
use Axle\Transformers\UserTransformer;
use Spatie\Fractalistic\Fractal;

class UserController
{
    public function index()
    {
        return Fractal::create()
            ->collection(User::all())
            ->transformWith(new UserTransformer())
            ->toArray();
    }

    public function show($id)
    {
        return Fractal::create()
            ->item(User::findOrFail($id),new UserTransformer())
            ->toArray();
    }
}