<?php namespace App\Repositories;

use App\Models\Department;

class DepartmentRepository extends BaseRepository {

	public function __construct(Department $department)
	{
		$this->model = $department;
	}

	public function index()
	{
		return $this->model
		->get();
	}

	public function listsWithRegion()
	{

		return $this->model->select('code', 'name', 'id_region')->get()->groupBy('id_region')->toArray();
	}
	
	 private function saveDepartment($department, $inputs)
	{	
		$department->code = $inputs['code'];
		$department->name = $inputs['name'];
		$department->slug = $inputs['slug'];
		$department->save();

		return $department;
	}

 	public function store($inputs)
	{
		$department = new $this->model;	

		$department->code = $inputs['code'];
		$department->name = $inputs['name'];
		$department->slug = $inputs['slug'];
		$department->save();
	}

	public function destroy($id)
	{
		$model = $this->getById($id);
		$model->delete();
	}

	public function edit($id)
	{
		$department = $this->model->findOrFail($id);

		return compact('department');
	}
	
	public function update($inputs, $id)
	{
		$department = $this->getById($id);

		$this->saveDepartment($department, $inputs);
	}

	public function getDepartmentById($id)
	{
		return $this->getById($id);
	}

}