<?php 
namespace App\Repositories;

use App\Models\City;

class CityRepository extends BaseRepository {

	public function __construct(City $city)
	{
		$this->model = $city;
	}

	public function index()
	{
		return $this->model
		->get();
	}

	private function saveCity($city, $inputs)
	{	
		$city->slug = $inputs['slug'];
		$city->name = $inputs['name'];
		$city->real_name = $inputs['real_name'];
		$city->postal_code = $inputs['postal_code'];
		$city->save();

		return $city;
	}

 	public function store($inputs)
	{
		$city = new $this->model;	

		$city->slug = $inputs['slug'];
		$city->name = $inputs['name'];
		$city->real_name = $inputs['real_name'];
		$city->postal_code = $inputs['postal_code'];
		$city->save();
	}

	public function destroy($id)
	{
		$model = $this->getById($id);
		$model->delete();
	}

	public function edit($id)
	{
		$city = $this->model->findOrFail($id);

		return compact('city');
	}
	
	public function update($inputs, $id)
	{
		$city = $this->getById($id);

		$this->saveCity($city, $inputs);
	}

	public function getCityById($id)
	{
		return $this->getById($id);
	}

	public function searchCityByPostalCode($postal_code){
		return $this->model->select('real_name', 'id')->where('postal_code', 'like', $postal_code.'%')->get()->toArray();
	}
}