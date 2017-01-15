<?php

namespace Axle\Transformers;



use App\Resource;
use League\Fractal;


class StaffTransformer extends Fractal\TransformerAbstract
{
    //protected $availableIncludes;
    protected $availableIncludes= [
      'media'
    ];

    public function transform(Resource $resource)
    {
        return [
            'id' => (int) $resource->id,
            'title' => $resource->title,
            'description' => $resource->description,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/pages?id='.$resource->id
            ],
        ];
    }



    public function includeMedia(Resource $resource)
    {
        return $this->collection($resource->media, new GalleryTransformer());
    }
}





