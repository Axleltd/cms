<?php
namespace App\Http\Controllers\Api;

use App\Model\Resource;
use App\Transformers\ResourceTransformer;


class ResourceController extends ApiController
{
    public function index()
    {
        return $this->getCollection(Resource::all(), new ResourceTransformer());
    }

    public function show($id)
    {
        return $this->getItem(Resource::findOrFail($id), new ResourceTransformer());
    }


    public function store(Request $request)
    {
        Resource::create([
            $this->data($request)
        ]);
    }

    public function update($id, Request $request)
    {
        Resource::findOrFail($id)->update($this->data($request));
    }

    public function destroy($id)
    {
        Resource::findOrFail($id)->delete();
    }

    protected function data(Request $request)
    {
        return [
            'title' => $request->title,
            'description' => $request->description,
            'excerpt' => $request->excerpt,
            'class_id' => $request->class_id,
            'staff_id' => $request->staff,
            'status' => $request->status
        ];
    }
}
