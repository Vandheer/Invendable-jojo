<?php namespace App\Repositories;

use App\Models\Picture;

class PictureRepository extends BaseRepository {

	public function __construct(Picture $picture)
	{
		$this->model = $picture;
	}

	public function index()
	{
		return $this->model
		->get();
	}

	public function create($url){
		$picture = new $this->model;	

		$picture->url = $url;
		
		return $picture;
	}

 	public function store($url)
	{
		$picture = $this->create($url);
		$picture->save(); 

		return $picture;
	}

	public function destroy($id)
	{
		$model = $this->getById($id);
		$model->delete();
	}

	public function edit($id)
	{
		$photo = $this->model->findOrFail($id);

		return compact('photo');
	}
	
	public function update($inputs, $id)
	{
		$photo = $this->getById($id);

		$this->savePhoto($photo, $inputs);
	}

	public function getPictureById($id)
	{
		return $this->getById($id);
	}

}