<?php
namespace App\Http\Controllers\Api;

use App\Model\Page;
use App\Transformers\PageTransformer;
use Illuminate\Http\Request;

class PageController extends ApiController
{
    public function index()
    {
        return $this->getCollection(Page::with('posts')->get(), new PageTransformer());
    }

    public function show($id)
    {
        if($page = Page::find($id))
        {
            return $this->getItem($page, new PageTransformer());
        }
        return $this->respondNotFound('Page Not found');
    }


    public function store(Request $request)
    {
        if($event = Page::create($this->data($request))){
            $this->respond(
                'Page Created Sucessfully'
            );
        }
    }

    public function update($id, Request $request)
    {
        Page::findOrFail($id)->update($this->data($request));
    }

    public function destroy($id)
    {
        Page::findOrFail($id)->delete();
    }

    protected function data(Request $request)
    {
        return [
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'excerpt' => $request->excerpt,
            'status' => $request->status
        ];
    }


}
