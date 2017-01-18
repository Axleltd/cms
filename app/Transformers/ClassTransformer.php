<?php

namespace App\Transformers;




use App\Model\Classes;
use League\Fractal;


class ClassTransformer extends Fractal\TransformerAbstract
{
    //protected $availableIncludes;
    protected $availableIncludes= [
      'media'
    ];

    public function transform(Classes $classes)
    {
        return [
            'id' => (int) $classes->id,
            'title' => $classes->title,
            'description' => $classes->description,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/pages?id='.$classes->id
            ],
        ];
    }



    public function includeMedia(Classes $classes)
    {
        return $this->collection($classes->media, new GalleryTransformer());
    }
}





