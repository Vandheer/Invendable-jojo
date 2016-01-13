<?php 

namespace App\Libraries\Extensions\ImageManagement;

use Illuminate\Support\ServiceProvider as  IlluminateServiceProvider;
use App\Libraries\Extensions\ImageManagement\ImageManagement;

class ImageManagementServiceProvider extends IlluminateServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('imagemanagement', function($app)
        {
            return new ImageManagement();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('imagemanagement');
    }
}