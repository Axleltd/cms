<?php
namespace App\Http\Controllers\Api;

use App\Page;
use Axle\Transformers\PageTransformer;

class PageController extends ApiController
{
    public function index()
    {
        return $this->getCollection(Page::with('posts')->get(), new PageTransformer())
    }

    public function show($id)
    {
        return $this->getItem(Page::findOrFail($id), new PageTransformer());
    }


}
