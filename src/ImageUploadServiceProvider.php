<?php

namespace Nijwel\ImageUpload;

use Illuminate\Support\ServiceProvider;

class ImageUploadServiceProvider extends ServiceProvider {
    public function boot() {
        $this->publishes( [
            __DIR__ . '/../config/imageupload.php' => config_path( 'imageupload.php' ),
        ] );

        // Optionally, you can auto-load the alias if it's not registered
        if ( !array_key_exists( 'ImageUpload', config( 'app.aliases', [] ) ) ) {
            $this->app->make( 'config' )->set( 'app.aliases.ImageUpload', \Nijwel\ImageUpload\Facades\ImageUploadFacade::class );
        }
    }

    public function register() {
        $this->app->singleton( 'image-upload', function ( $app ) {
            return new \Nijwel\ImageUpload\Helpers\Helper(); // Ensure this is the correct class
        } );

        $this->mergeConfigFrom( __DIR__ . '/../config/imageupload.php', 'imageupload' );

        $this->loadHelpers();
    }

    protected function loadHelpers() {
        $helpers = __DIR__ . '/Helpers/helpers.php';

        if ( file_exists( $helpers ) ) {
            require_once $helpers;
        }
    }
}