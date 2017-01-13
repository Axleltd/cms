<?php
namespace App\Http\Controllers\Api;

use App\Post;
use Axle\Transformers\PostTransformer;
use Spatie\Fractalistic\Fractal;

class PostController
{
    public function index()
    {
        $manager = $this->initManager();
        $resource = new Collection(Post::all(), new PostTransformer());
        return $manager->createData($resource)->toArray();

    }

    public function show($id)
    {

        return Fractal::create()
            ->item(Post::findOrFail($id), new PostTransformer())
            ->toArray();

    }

}
