<?php
namespace App\Http\Controllers\Api;


use App\Model\News;
use App\Transformers\NewsTransformer;

class NewsController extends ApiController
{
    public function index()
    {
        return $this->getCollection(News::all(),new NewsTransformer());
    }

    public function show($id)
    {
        return $this->getItem(News::findOrFail($id),new NewsTransformer());
    }


}
