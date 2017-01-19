<?php
namespace App\Http\Controllers\Api;



use App\Model\Program;
use App\Transformers\ProgramTransformer;

class ProgramController extends ApiController
{
    public function index()
    {
        return $this->getCollection(Program::all(), new ProgramTransformer());
    }

    public function show($id)
    {
        return $this->getItem(Program::findOrFail($id), new ProgramTransformer());
    }


    public function store(Request $request)
    {
        $event = Program::create([
            $this->data($request)
        ]);
    }

    public function update($id, Request $request)
    {
        Program::findOrFail($id)->update($this->data($request));
    }

    public function destroy($id)
    {
        Program::findOrFail($id)->delete();
    }

    protected function data(Request $request)
    {
        return [
            'title' => $request->title,
            'description' => $request->description,
            'excerpt' => $request->excerpt,
            'published_on' => $request->published_on,
            'status' => $request->status
        ];
    }
}