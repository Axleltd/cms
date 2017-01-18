<?php
namespace App\Http\Controllers\Api;

use App\Model\Event;
use App\Transformers\EventTransformer;
use Illuminate\Http\Request;

class EventController extends ApiController
{
    public function index()
    {
        return $this->getCollection(Event::all(), new EventTransformer());
    }

    public function show($id)
    {
        return $this->getItem(Event::findOrFail($id), new EventTransformer());
    }

    public function store(Request $request)
    {
        $event = Event::create($this->data($request));
    }

    public function update($id, Request $request)
    {
        Event::findOrFail($id)->update($this->data($request));
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
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
