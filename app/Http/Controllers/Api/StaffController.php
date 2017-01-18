<?php
namespace App\Http\Controllers\Api;

use App\Model\Staff;
use App\Transformers\StaffTransformer;

class StaffController extends ApiController
{
    public function index()
    {
        return $this->getCollection(Staff::all(), new StaffTransformer());
    }

    public function show($id)
    {
        return $this->getItem(Staff::findOrFail($id), new StaffTransformer());
    }


}
