<?php

namespace App\Transformers;

use App\Model\Staff;
use League\Fractal;


class StaffTransformer extends Fractal\TransformerAbstract
{
    //protected $availableIncludes;
    protected $availableIncludes = [
        'media', 'profile'
    ];

    public function transform(Staff $staff)
    {
        return [
            'id' => (int)$staff->id,
            'username' => $staff->username,
            'faculty' => $staff->faculty()->title,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/staffs?id=' . $staff->id
            ],
        ];
    }


    public function includeMedia(Staff $staff)
    {
        return $this->collection($staff->media, new GalleryTransformer());
    }

    public function includeProfile(Staff $staff)
    {
        return $this->collection($staff->profile, new ProfileTransformer());
    }
}





