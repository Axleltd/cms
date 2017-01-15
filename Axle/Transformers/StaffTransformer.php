<?php

namespace Axle\Transformers;



use App\Staff;
use League\Fractal;


class StaffTransformer extends Fractal\TransformerAbstract
{
    //protected $availableIncludes;
    protected $availableIncludes= [
      'media'
    ];

    public function transform(Staff $staff)
    {
        return [
            'id' => (int) $staff->id,
            'title' => $staff->title,
            'description' => $staff->description,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/pages?id='.$staff->id
            ],
        ];
    }



    public function includeMedia(Staff $staff)
    {
        return $this->collection($staff->media, new GalleryTransformer());
    }
}





