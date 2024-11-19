<?php

namespace Nijwel\ImageUpload\Facades;

use Illuminate\Support\Facades\Facade;

class ImageUploadFacade extends Facade {
    protected static function getFacadeAccessor() {
        return 'image-upload';
    }
}