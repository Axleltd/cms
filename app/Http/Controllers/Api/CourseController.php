<?php
namespace App\Http\Controllers\Api;




use App\Course;
use Axle\Transformers\CourseTransformer;

class CourseController extends ApiController
{
    public function index()
    {
        return $this->getCollection(Course::all(),new CourseTransformer());
    }

    public function show($id)
    {
        return $this->getItem(Course::findOrFail($id),new CourseTransformer());
    }


}
