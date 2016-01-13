<?php namespace App\Repositories;


use DB;
use App\Models\Category;

class CategoryRepository extends BaseRepository {

	public function __construct(Category $category)
	{
		$this->model = $category;
	}

	public function index()
	{
		return $this->model
		->get();
	}

	public function lists()
	{
		return  $this->model
		->select(array('c1.name as parent_name ', 'c2.name', 'c2.id'))
		->from('categories AS c1')
		->join('categories AS c2', 'c1.id', '=', 'c2.id_category')
		->get();
	}

	private function saveCategory($category, $inputs)
	{	
		$category->name = $inputs['name'];
		$category->save();

		return $category;
	}

 	public function store($inputs)
	{
		$category = new $this->model;	

		$category->name = $inputs['name'];
		$category->save();
	}

	public function destroy($id)
	{
		$model = $this->getById($id);
		$model->delete();
	}

	public function edit($id)
	{
		$category = $this->model->findOrFail($id);

		return compact('category');
	}
	
	public function update($inputs, $id)
	{
		$category = $this->getById($id);

		$this->saveCategory($category, $inputs);
	}

	public function getCategoryById($id)
	{
		return $this->getById($id);
	}

}