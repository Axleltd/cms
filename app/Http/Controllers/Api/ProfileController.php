<?php
namespace App\Http\Controllers\Api;


use App\Model\Profile;
use App\Transformers\ProfileTransformer;
use Illuminate\Http\Request;


class ProfileController extends ApiController
{
    public function index()
    {
        return $this->getCollection(Profile::all(),new ProfileTransformer());
    }

    public function show($id)
    {
        return $this->getItem(Profile::findOrFail($id), new ProfileTransformer());
    }

    public function create(Request $request)
    {
        Profile::create($this->data($request));

    }

    public function update($id,Request $request)
    {
        Profile::findOrFail($id)->update($this->data($request));

    }

    public function destroy($id)
    {
        Profile::findOrFail($id)->delete();
    }

    protected function data(Request $request)
    {
        return [

        ];
    }

}
