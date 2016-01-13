<?php 
namespace App\Repositories;

use App\Models\Company;

class CompanyRepository extends BaseRepository {

	public function __construct(Company $company)
	{
		$this->model = $company;
	}

	public function index()
	{
		return $this->model
		->get();
	}

	public function lists()
	{
		return Company::with('user')
		->get();
	}
	
	private function saveCompany($company, $inputs)
	{	
		$company->siren = $inputs['siren'];
		$company->name = $inputs['name'];
		$company->id_user = $inputs['id_user'];
		$company->save();

		return $company;
	}

 	public function store($inputs, $user_id)
	{
		$company = new $this->model;	

		$company->siren = $inputs['siren'];
		$company->name = $inputs['company_name'];
		$company->id_user = $user_id;
		$company->save();

		return $company->siren;
	}

	public function destroy($id)
	{
		$model = $this->getById($id);
		$model->delete();
	}

	public function edit($id)
	{
		$company = $this->model->findOrFail($id);

		return compact('company');
	}
	
	public function update($inputs, $id)
	{
		$company = $this->getById($id);

		$this->saveUser($company, $inputs);
	}

	public function getUserById($id)
	{
		return $this->getById($id);
	}

}