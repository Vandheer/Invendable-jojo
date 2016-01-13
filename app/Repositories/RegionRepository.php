<?php namespace App\Repositories;

use App\Models\Region;

class RegionRepository extends BaseRepository {

	public function __construct(Region $region)
	{
		$this->model = $region;
	}

	public function index()
	{
		return $this->model
		->get();
	}

	public function lists()
	{
		return $this->model
		->lists('name', 'id');
	}
	
	 private function saveRegion($region, $inputs)
	{	
		$region->name = $inputs['name'];
		$region->slug = $inputs['slug'];
		$region->save();

		return $region;
	}

 	public function store($inputs)
	{
		$region = new $this->model;	

		$region->name = $inputs['name'];
		$region->slug = $inputs['slug'];
		$region->save();
	}

	public function destroy($id)
	{
		$model = $this->getById($id);
		$model->delete();
	}

	public function edit($id)
	{
		$region = $this->model->findOrFail($id);

		return compact('region');
	}
	
	public function update($inputs, $id)
	{
		$region = $this->getById($id);

		$this->saveRegion($region, $inputs);
	}

	public function getRegionById($id)
	{
		return $this->getById($id);
	}

}