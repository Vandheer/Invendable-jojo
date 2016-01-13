<?php

namespace App\Http\Controllers\City;

use Validator;
use App\Jobs\ChangeLocale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CityRepository;
use App\Http\Requests\Front\Advertisement\UserAdvertisementRequest;

class CityController extends Controller
{
	/**
	 * The AdvertisementRepository instance.
	 *
	 * @var App\Repositories\AdvertisementRepository
	 */
	protected $city_gestion;

	/**
	 * The pagination number.
	 *
	 * @var int
	 */
	protected $nbrPages;

	/**
	 * Create a new BlogController instance.
	 *
	 * @param  App\Repositories\CityRepository $city_gestion
	 * @return void
	*/
	public function __construct(
		CityRepository $city_gestion)
	{
		$this->city_gestion = $city_gestion;
	}	


	public function getAjaxCity(Request $request){
		$validator = Validator::make($request->all(), [
            'name' => 'required|numeric|min:4'
        ]);

        if ($validator->fails()) {
           exit(json_encode('failed'));
        }
        
        $suggestions['suggestions'] = $this->city_gestion->searchCityByPostalCode($request->name);
		exit(json_encode($suggestions));

	}
}
