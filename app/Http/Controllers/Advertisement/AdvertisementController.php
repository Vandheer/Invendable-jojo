<?php

namespace App\Http\Controllers\Advertisement;

use Session;
use Config;
use Redirect;
use Validator;
use ImageManagement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository as User;
use App\Repositories\RegionRepository as Region;
use App\Repositories\PictureRepository as Picture;
use App\Repositories\CompanyRepository as Company;
use App\Repositories\CategoryRepository as Category;
use App\Http\Requests\Front\Auth\UserRegisterRequest;
use App\Repositories\DepartmentRepository as Department;
use App\Repositories\AdvertisementRepository as Advertisement;
use App\Http\Requests\Front\Advertisement\AdvertisementRequest;
use App\Http\Requests\Front\Advertisement\AdvertisementPasswordRequest;
class AdvertisementController extends Controller
{

	/**
	 * Number max of image by advertisement
	 *
	 * @var int
	 */
	private $number_advertisement = 6;

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
		$this->input_image = Config::get('constants.number_advertisement');
	}

	/**
	 * Display the deposer annonce page.
	 *
	 * @return Response
	 */
	public function index(
		Category $category,
		Department $department,
		Region $region)
	{
		$regions = $region->lists();
		$departments = $department->listsWithRegion();
		$categories = $category->lists();

		return view('front.advertisement.add', compact('categories', 'departments', 'regions'));
	}

	public function getFormInvite(){

	}

	public function getFormUser(){

	}

	public function addAdvertisementInvite(AdvertisementRequest $request, User $user, Company $company, Advertisement $advertisement, Picture $picture)
	{
		$this->valid_image($request->images);
		$images = ImageManagement::upload_image($request->file('images'));

		$newUser = $user->findOrCreate($request);
	
		if($request->user_type){
            $newCompany = $company->create($request, $newUser->id);
            $newUser = $newCompany->company()->associate($newUser);
        }

        $newAdvertisement = $advertisement->create($request);

        $newAdvertisement->user()->associate($newUser);
        $newAdvertisement = $advertisement->associateIdType($request['ads_type'], $newAdvertisement);
        $newAdvertisement = $advertisement->associateIdCategory($request['category'], $newAdvertisement);
        $newAdvertisement = $advertisement->associateIdCity($request['id_city'], $newAdvertisement);

        foreach ($images as $value) {
			$newAdvertisement->picture[] = $picture->create($value);
		}

		Session::put('advertisement', $newAdvertisement);
		return Redirect::route('advertisement.invite.validation');
	}

	public function validationAdvertisementInvite(){

        if(Session::has('advertisement')){
        	$advertisement = Session::get('advertisement');
            return view('front.advertisement.validation', compact('advertisement'));
        }
        return response()->view('errors.404', [], 404);
	}

	public function PostAdvertisementInvite(AdvertisementPasswordRequest $request){
        if(Session::has('advertisement')){
        	$advertisement = Session::get('advertisement');

        	$advertisement->user->password = $request->password;

        	foreach ($advertisement->picture as $picture) {
				$picture->save();
			}

			$advertisement->user->save();
        	$advertisement->id_user = $advertisement->user->id;
        	$advertisement->save();

        	foreach ($advertisement->picture as $picture) {
				$advertisement->picture()->attach($picture->id);

			}

        	return Redirect::route('advertisement.invite.success');
        }
        return response()->view('errors.404', [], 404);
	}

    public function getInviteSuccess(){
        if(Session::has('advertisement')){
        	Session::forget('advertisement');
            return view('front.advertisement.success');
        }
        return response()->view('errors.404', [], 404);
    }


	public function store(UserAdvertisementRequest $request)
	{

	}

	private function valid_image(Array $images){
		$imageRules = ['image' => 'image|mimes:jpeg,bmp,png|max:10000'];

		foreach($images as $image)
		{
		    $image = array('image' => $image);
		    $imageValidator = Validator::make($image, $imageRules);

		    if ($imageValidator->fails()) {
		        $messages = $imageValidator->messages();
		        return Redirect::back()->withErrors($messages);
		    }
		}

	}

	public function listerOffres($slug, Region $region){
		$tab_region = \DB::table('regions')->where('slug','=',$slug)->get();
		$id_region=$tab_region[0]->id;

		$offers = \DB::table('advertisements_invalid')->join('cities','id_city','=','cities.id')->join('departments','code_department','=','departments.code')->where('departments.id_region','=',$id_region)->limit(15)->get();
		die(var_dump($offers));
		foreach ($offers as $offer) {
			
		}
	}

}
