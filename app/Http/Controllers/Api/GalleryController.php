<?php
namespace App\Http\Controllers\Api;


use App\Transformers\GalleryTransformer;
use Spatie\MediaLibrary\Media;

class GalleryController extends ApiController
{
    public function index()
    {
        return $this->getCollection(Media::all(),new GalleryTransformer());
    }

    public function show($id)
    {
        return $this->getItem(Media::findOrFail($id),new GalleryTransformer());
    }


}
