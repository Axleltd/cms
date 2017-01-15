<?php
namespace App\Http\Controllers\Api;


use App\Calendar;
use Axle\Transformers\CalendarTransformer;

class CalendarController extends ApiController
{
    public function index()
    {
        return $this->getCollection(Calendar::all(),new CalendarTransformer());
    }

    public function show($id)
    {
        return $this->getItem(Calendar::findOrFail($id),new CalendarTransformer());
    }


}
