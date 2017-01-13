<?php

namespace Axle\Transformers;

use League\Fractal;
use App\Post;
class PostTransformer extends Fractal\TransformerAbstract
{
    protected $availableIncludes= [
      'media'
    ];
    public function transform(Post $post)
    {
        return [
            'id' => (int) $post->id,
            'title' => $post->title,
            'description' => $post->description,
            'published_on' => $post->published_on,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/posts/'.$post->id
            ],
        ];
    }

    public function includeMedia(Post $post)
    {
        return $this->collection($post->media, new GalleryTransformer());
    }
}





