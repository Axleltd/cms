<?php

namespace Axle\Transformers;

use League\Fractal;
use App\Page;
class PageTransformer extends Fractal\TransformerAbstract
{

    public function transform(Page $page)
    {
        return [
            'id' => (int) $page->id,
            'title' => $page->title,
            'descriptions' => $page->descriptions,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/pages?id='.$page->id
            ],
            'posts' => [
                'title' => 'Blah Blah Blah',
                'description' => 'test test test',
                'links' => [
                    'rel' => 'blank',
                    'url' => 'api/v1/posts?id='.$page->id
                ]
            ]
        ];
    }
}





