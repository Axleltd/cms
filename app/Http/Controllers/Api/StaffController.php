<?php
namespace App\Http\Controllers\Api;



use App\Staff;
use Axle\Transformers\StaffTransformer;

class StaffController extends ApiController
{
    public function index()
    {
        return $this->getCollection(Staff::all(),new StaffTransformer());
    }

    public function show($id)
    {
        return $this->getItem(Staff::findOrFail($id), new StaffTransformer());
    }


}
