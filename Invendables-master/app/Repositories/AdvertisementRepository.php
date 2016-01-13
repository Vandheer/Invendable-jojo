<?php namespace App\Repositories;

use Formatage;
use App\Models\City;
use App\Models\Type;
use App\Models\Category;
use App\Models\Advertisement;

class AdvertisementRepository extends BaseRepository {

	public function __construct(Advertisement $advertisement)
	{
		$this->model = $advertisement;
	}

	public function index()
	{
		return $this->model
		->get();
	}

	public function create($input){
		$advertisement = new $this->model;	

		$advertisement->title = $input['title'];
		$advertisement->description = $input['description'];
		$advertisement->phone_mask = is_null($input['phone_mask']) ? 0 : $input['phone_mask'];
		$advertisement->slug = Formatage::create_slug($input['title']).'_'.uniqid();	

		return $advertisement;
	}

 	public function store($input)
	{
		$advertisement = $this->create($input);
		$advertisement->save(); 

		return $advertisement;
	}

	public function destroy($id)
	{
		$model = $this->getById($id);
		$model->delete();
	}

	public function edit($id)
	{
		$advertisement = $this->model->findOrFail($id);

		return compact('advertisement');
	}
	
	public function update($inputs, $id)
	{
		$advertisement = $this->getById($id);

		$this->saveAdvertisement($advertisement, $inputs);
	}

	public function getAdvertisementById($id)
	{
		return $this->getById($id);
	}

	public function associateUser($user, $advertisement){
		return $advertisement->user()->associate($user);
	}

	public function associateIdType($type, $advertisement){
		return $advertisement->type()->associate(Type::findOrFail($type));
	}

	public function associateIdCategory($category, $advertisement){
		return $advertisement->category()->associate(Category::findOrFail($category));
	}

	public function associateIdCity($city, $advertisement){
		return $advertisement->city()->associate(City::findOrFail($city));
	}
}