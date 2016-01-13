<?php namespace App\Repositories;

use App\Models\Type;

class TypeRepository extends BaseRepository {

	public function __construct(Type $type)
	{
		$this->model = $type;
	}

	public function index()
	{
		return $this->model
		->get();
	}

	private function saveType($type, $inputs)
	{	
		$type->name = $inputs['name'];
		$type->save();

		return $type;
	}

 	public function store($inputs)
	{
		$type = new $this->model;	

		$type->name = $inputs['name'];
		$type->save();
	}

	public function destroy($id)
	{
		$model = $this->getById($id);
		$model->delete();
	}

	public function edit($id)
	{
		$type = $this->model->findOrFail($id);

		return compact('type');
	}
	
	public function update($inputs, $id)
	{
		$type = $this->getById($id);

		$this->saveType($type, $inputs);
	}

	public function getTypeById($id)
	{
		return $this->getById($id);
	}

}