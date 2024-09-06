<?php

namespace Nijwel\ImageUpload;

use Illuminate\Support\ServiceProvider;

class ImageUploadServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        // $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Load views
        // $this->loadViewsFrom(__DIR__.'/../views', 'imageupload');

        // Publish config
        $this->publishes([
            __DIR__ . '/../config/imageupload.php' => config_path('imageupload.php'),
        ]);
    }

    public function register()
    {
        // Register the package's config file
        $this->mergeConfigFrom(__DIR__ . '/../config/imageupload.php', 'imageupload');

        $this->loadHelpers();
    }


    protected function loadHelpers()
    {
        $helpers = __DIR__ . '/Helpers/helpers.php';

        if (file_exists($helpers)) {
            require_once $helpers;
        }
    }
}
