<?php

namespace Axle\Transformers;



use App\Event;
use League\Fractal;


class EventTransformer extends Fractal\TransformerAbstract
{
    //protected $availableIncludes;
    protected $availableIncludes= [
      'media'
    ];

    public function transform(Event $event)
    {
        return [
            'id' => (int) $event->id,
            'title' => $event->title,
            'description' => $event->description,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/events?id='.$event->id
            ],
        ];
    }



    public function includeMedia(Event $event)
    {
        return $this->collection($event->media, new GalleryTransformer());
    }
}





