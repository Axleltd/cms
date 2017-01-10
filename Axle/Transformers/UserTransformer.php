<?php 

namespace Axle\Transformers;

use League\Fractal;
use App\User;

class UserTransformer extends Fractal\TransformerAbstract
{

/*	protected $availableIncludes = [
        'posts'
    ];*/
	
	public function transform(User $user)
	{
		return [
			'id' => (int) $user->id,
			'name' => $user->name,
			'email' => $user->email,
			'links' => [
				'rel' => 'self',
				'url' => 'api/v1/user?id='.$user->id
			]
		];
	}

	public function includePost(User $user)
	{
	}
}