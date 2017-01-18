<?php
namespace App\Http\Controllers\Api;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use App\Http\Controllers\Controller;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;

class ApiController extends Controller
{
    /**
     * @var int
     */
    protected $statusCode = 200;

    #Fractal
    public function initManager()
    {
        $manager = new Manager();
        if (isset($_GET['include'])) {
            $manager->parseIncludes($_GET['include']);
        }
        return $manager;
    }


    public function collection($model, TransformerAbstract $transformer)
    {
        return new Collection($model, $transformer);
    }

    public function item($model,TransformerAbstract $transformer)
    {
        return new Item($model,$transformer);
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
    ##End Fractal

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     *
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNotFound($message = 'Not found')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondInternalError($message = 'Internal Error')
    {
        return $this->setStatusCode(500)->respondWithError($message);
    }

    /**
     * @param $data
     * @param array $headers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode(),
            ],
        ]);
    }


}
