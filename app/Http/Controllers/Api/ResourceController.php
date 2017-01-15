<?php
namespace App\Http\Controllers\Api;

use App\Resource;
use Axle\Transformers\ResourceTransformer;


class ResourceControllerController extends ApiController
{
    public function index()
    {
        return $this->getCollection(Resource::all(),new ResourceTransformer());
    }

    public function show($id)
    {
        return $this->getItem(Resource::findOrFail($id), new ResourceTransformer());
    }


}
