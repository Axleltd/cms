<?php

namespace App\Transformers;

use App\Model\Student;
use League\Fractal;


class StudentTransformer extends Fractal\TransformerAbstract
{
    //protected $availableIncludes;
    protected $availableIncludes = [
        'media', 'profile'
    ];

    public function transform(Student $student)
    {
        return [
            'id' => (int)$student->id,
            'title' => $student->title,
            'description' => $student->description,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/pages?id=' . $student->id
            ],
        ];
    }

    public function includeMedia(Student $student)
    {
        return $this->collection($student->media, new GalleryTransformer());
    }

    public function includeProfile(Student $student)
    {
        return $this->collection($student->profile, new ProfileTransformer());
    }
}





