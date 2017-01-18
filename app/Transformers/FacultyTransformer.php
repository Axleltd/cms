<?php

namespace App\Transformers;

use App\Model\Faculty;
use App\Model\Message;
use League\Fractal;


class FacultyTransformer extends Fractal\TransformerAbstract
{
    //protected $availableIncludes;
    protected $availableIncludes = [
        'media', 'staffs'
    ];

    public function transform(Faculty $faculty)
    {
        return [
            'id' => (int)$faculty->id,
            'slug' => $faculty->slug,
            'title' => $faculty->title,
            'description' => $faculty->description,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/faculties?id=' . $faculty->id
            ],
        ];
    }

    public function includeMedia(Message $message)
    {
        return $this->collection($message->media, new GalleryTransformer());
    }

    public function includeStaffs(Message $message)
    {
        return $this->collection($message->staffs, new StaffTransformer());
    }
}





