<?php namespace App\Repositories;

use App\Models\Country;

class CountryRepository extends BaseRepository {

	public function __construct(Country $country)
	{
		$this->model = $country;
	}

	public function index()
	{
		return $this->model
		->get();
	}

	 private function saveCountry($country, $inputs)
	{	
		$country->code = $inputs['code'];
		$country->alpha = $inputs['alpha'];
		$country->name = $inputs['name'];
		$country->save();

		return $country;
	}

 	public function store($inputs)
	{
		$country = new $this->model;	

		$country->code = $inputs['code'];
		$country->alpha = $inputs['alpha'];
		$country->name = $inputs['name'];
		$country->save();
	}

	public function destroy($id)
	{
		$model = $this->getById($id);
		$model->delete();
	}

	public function edit($id)
	{
		$country = $this->model->findOrFail($id);

		return compact('country');
	}
	
	public function update($inputs, $id)
	{
		$country = $this->getById($id);

		$this->saveCountry($country, $inputs);
	}

	public function getCountryById($id)
	{
		return $this->getById($id);
	}

}