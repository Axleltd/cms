<?php
namespace App\Http\Controllers\Api;

use App\Model\Student;
use App\Transformers\StudentTransformer;

class StudentController extends ApiController
{
    public function index()
    {
        return $this->getCollection(Student::all(), new StudentTransformer());
    }

    public function show($id)
    {
        return $this->getItem(Student::findOrFail($id), new StudentTransformer());
    }


}
