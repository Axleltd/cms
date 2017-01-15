<?php
namespace App\Http\Controllers\Api;



use App\Event;
use Axle\Transformers\EventTransformer;

class EventController extends ApiController
{
    public function index()
    {
        return $this->getCollection(Event::all(),new EventTransformer());
    }

    public function show($id)
    {
        return $this->getItem(Event::findOrFail($id),new EventTransformer());
    }


}
