<?php

namespace App\Transformers;


use League\Fractal\TransformerAbstract;
use Spatie\MediaLibrary\Media;

class GalleryTransformer extends TransformerAbstract
{
    public function transform(Media $gallery)
    {
        return [
            'file_name' => $gallery->file_name,
			'collection_name' => $gallery->collection_name,
			'name' => $gallery->name,
			'disk' => $gallery->disk,
			'size' => $gallery->size,
			'manipulations' => $gallery->manipulations,
			'custom_properties' => $gallery->custom_properties,
			'order_column' => $gallery->order_column,
			'url' => '//LINK-HERE//TODO'
        ];
    }
}