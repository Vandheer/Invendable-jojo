<?php

namespace App\Http\Controllers;
use Session;
use App\Jobs\ChangeLocale;
use App\Repositories\AdvertisementRepository as Advertisement;
use App\Repositories\RegionRepository as Region;

class HomeController extends Controller
{

	/**
	 * The AdvertisementRepository instance.
	 *
	 * @var App\Repositories\AdvertisementRepository
	 */
	protected $advertisement;

	/**
	 * The pagination number.
	 *
	 * @var int
	 */
	protected $nbrPages;

	/**
	 * Create a new BlogController instance.
	 *
	 * @param  App\Repositories\AdvertisementRepository $advertisement_gestion
	 * @return void
	*/
	public function __construct(
		Advertisement $advertisement)
	{
		$this->advertisement = $advertisement;
		$this->nbrPages = 3;
	}	

	/**
	 * Display the home page.
	 *
	 * @var App\Repositories\RegionRepository
	 * @return Response
	 */
	public function index(Region $region)
	{
		$regions = $region->index();
		return view('front.home', compact('regions'));
	}

	/**
	 * Display the deposer annonce page.
	 *
	 * @return Response
	 */
	public function advertisement()
	{
		return view('partials.advertisement');
	}

	/**
	 * Change language.
	 *
	 * @param  App\Jobs\ChangeLocaleCommand $changeLocaleCommand
	 * @return Response
	 */
	public function language(
		ChangeLocale $changeLocale)
	{
		$this->dispatch($changeLocale);
		return redirect()->back();
	}

}
