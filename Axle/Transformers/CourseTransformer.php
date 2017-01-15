<?php

namespace Axle\Transformers;

use App\Course;
use League\Fractal;


class CourseTransformer extends Fractal\TransformerAbstract
{
    //protected $availableIncludes;
    protected $availableIncludes= [
      'media'
    ];

    public function transform(Course $course)
    {
        return [
            'id' => (int) $course->id,
            'title' => $course->title,
            'description' => $course->description,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/pages?id='.$page->id
            ],
        ];
    }



    public function includeMedia(Course $course)
    {
        return $this->collection($course->media, new GalleryTransformer());
    }
}





