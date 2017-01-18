<?php
namespace App\Http\Controllers\Api;

use App\Model\Message;
use App\Transformers\MessageTransformer;

class MessageController extends ApiController
{
    public function index()
    {
        return $this->getCollection(Message::all(),new MessageTransformer());
    }

    public function show($id)
    {
        return $this->getItem(Message::findOrFail($id),new MessageTransformer());
    }


}
