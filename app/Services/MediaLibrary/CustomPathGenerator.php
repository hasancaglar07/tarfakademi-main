<?php

namespace App\Services\MediaLibrary;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class CustomPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        $modelType = strtolower(class_basename($media->model_type));

        return $modelType.DIRECTORY_SEPARATOR.$media->model_id.DIRECTORY_SEPARATOR.$media->id.DIRECTORY_SEPARATOR;
    }

    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media).'conversions'.DIRECTORY_SEPARATOR;
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media).'responsive-images'.DIRECTORY_SEPARATOR;
    }
}
