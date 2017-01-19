<?php

namespace App\Transformers;

use League\Fractal;
use App\Model\User;

class UserTransformer extends Fractal\TransformerAbstract
{

    protected $availableIncludes = [
            'posts','media'
        ];

    public function transform(User $user)
    {
        return [
            'id' => (int)$user->id,
            'name' => $user->name,
            'email' => $user->email,
            'links' => [
                'rel' => 'self',
                'url' => 'api/v1/user?id=' . $user->id
            ]
        ];
    }


    public function includeMedia(User $user)
    {
        return $this->collection($user->media, new GalleryTransformer());
    }

    public function includePosts(User $user)
    {
        return $this->collection($user->posts, new StaffTransformer());
    }
}