<?php

namespace App\Transformers;

use App\Model\Profile;
use League\Fractal;

class ProfileTransformer extends Fractal\TransformerAbstract
{
    protected $availableIncludes= [
      'media'
    ];
    public function transform(Profile $profile)
    {
        return [
            'id' => (int) $profile->id,
            'name' => $profile->fullName,
            'phone1' => $profile->phone_no,
            'phone2' => $profile->alternate_no,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/posts/'.$post->id
            ],
        ];
    }

    public function includeMedia(Profile $profile)
    {
        return $this->collection($profile->media, new GalleryTransformer());
    }
}





