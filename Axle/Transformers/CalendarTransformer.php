<?php

namespace Axle\Transformers;



use App\Calendar;
use League\Fractal;


class CalendarTransformer extends Fractal\TransformerAbstract
{
    //protected $availableIncludes;
    protected $availableIncludes= [
      'media'
    ];

    public function transform(Calendar $calendar)
    {
        return [
            'id' => (int) $calendar->id,
            'title' => $calendar->title,
            'description' => $calendar->description,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/pages?id='.$calendar->id
            ],
        ];
    }



    public function includeMedia(Calendar $calendar)
    {
        return $this->collection($calendar->media, new GalleryTransformer());
    }
}





