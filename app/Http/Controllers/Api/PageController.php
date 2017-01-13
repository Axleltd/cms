<?php
namespace App\Http\Controllers\Api;

use App\Page;
use Axle\Transformers\PageTransformer;

class PageController extends ApiController
{
    public function index()
    {
        return $this->initManager()->createData(
                    $this->collection(Page::with('posts')->get(), new PageTransformer())
                )->toArray();

    }

    public function show($id)
    {

        return $this->fractal
            ->item(Page::findOrFail($id), new PageTransformer())
            ->toArray();

    }


}
