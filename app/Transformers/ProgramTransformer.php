<?php
namespace App\Transformers;

use App\Model\Program;
use League\Fractal;

class ProgramTransformer extends Fractal\TransformerAbstract
{
    protected $availableIncludes = [
        'media'
    ];

    public function transform(Program $program)
    {
        return [
            'id' => (int)$program->id,
            'slug' => $program->slug,
            'title' => $program->fullName,
            'description' => $program->phone_no,
            'requirement' => $program->requirements,
            'intake' => $program->alternate_no,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/program/' . $program->slug
            ],
        ];
    }

    public function includeMedia(Program $program)
    {
        return $this->collection($program->media(), new GalleryTransformer());
    }

    public function students(Program $program)
    {
        return $this->collection($program->students(), new StudentTransformer());
    }
}





