<?php

namespace Axle\Transformers;

use League\Fractal;
use App\Page;

class PageTransformer extends Fractal\TransformerAbstract
{
    //protected $availableIncludes;
    protected $availableIncludes= [
      'posts','media'
    ];

    public function transform(Page $page)
    {
        return [
            'id' => (int) $page->id,
            'title' => $page->title,
            'description' => $page->description,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/pages?id='.$page->id
            ],
        ];
    }

    public function includePosts(Page $page)
    {
        return $this->collection($page->posts, new PostTransformer());
    }

    public function includeMedia(Page $page)
    {
        return $this->collection($page->media, new GalleryTransformer());
    }
}





