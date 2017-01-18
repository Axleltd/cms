<?php

namespace App\Transformers;


use App\Model\Message;
use League\Fractal;


class MessageTransformer extends Fractal\TransformerAbstract
{
    //protected $availableIncludes;
    protected $availableIncludes = [
        'media'
    ];

    public function transform(Message $message)
    {
        return [
            'id' => (int)$message->id,
            'title' => $message->title,
            'description' => $message->description,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/pages?id=' . $message->id
            ],
        ];
    }


    public function includeMedia(Message $message)
    {
        return $this->collection($message->media, new GalleryTransformer());
    }
}





