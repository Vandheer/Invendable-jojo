<?php 
namespace App\Libraries\Extensions\ImageManagement;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

class ImageManagementFacade extends IlluminateFacade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'imagemanagement'; }

}