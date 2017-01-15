<?php 
namespace App\Http\Controllers\Api;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Spatie\Fractalistic\Fractal;
use App\Http\Controllers\Controller;
use League\Fractal\TransformerAbstract;

class ApiController extends Controller
{
	public function initManager()
    {
        $manager = new Manager();
        if (isset($_GET['include'])) {
            $manager->parseIncludes($_GET['include']);
        }
        return $manager;
    }

    public function fractal()
    {
    	return Fractal::create();
    }

    public function collection($model,TransformerAbstract $transformer)
    {
    	return new Collection($model, $transformer);
    }

    public function getCollection($model, TransformerAbstract $transformer)
    {
    	return $this->initManager()->createData(
                    $this->collection($model, $transformer)
                )->toArray();
    }
    public function getItem($model, TransformerAbstract $transformer)
    {
    	return $this->initManager()->createData(
                    $this->item($model, $transformer)
                )->toArray();
    }
}
