<?php

namespace App\Transformers;


use App\Model\News;
use League\Fractal;


class NewsTransformer extends Fractal\TransformerAbstract
{
    //protected $availableIncludes;
    protected $availableIncludes = [
        'media'
    ];

    public function transform(News $news)
    {
        return [
            'id' => (int)$news->id,
            'title' => $news->title,
            'description' => $news->description,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/pages?id=' . $news->id
            ],
        ];
    }


    public function includeMedia(News $news)
    {
        return $this->collection($news->media, new GalleryTransformer());
    }
}





