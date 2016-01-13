<?php 

namespace App\Repositories;

use Hash;
use App\Models\City;
use App\Models\User;

class UserRepository extends BaseRepository {

	public function __construct(User $user)
	{
		$this->model = $user;
	}

	public function index()
	{
		return $this->model
		->get();
	}

	public function findOrCreate($input){
		$user = $this->model->whereEmail($input['email'])->first();
		return is_null($user) ? $this->create($input) : $user ;
	}
	public function create($input){
		$user = new $this->model;

		$user->first_name = $input['first_name'];
		$user->user_type = $input['user_type'];
		$user->last_name = $input['last_name'];
		$user->pseudo = $input['pseudo'];
		$user->phone = $input['phone'];
		$user->email = $input['email'];
		$user->valid = '0';
		$user->temp = '0';
		$user->city()->associate(City::find($input['id_city']));
		$user->password = Hash::make($input['password']);
		
		return $user;
	}

 	public function store($input)
	{
		$user = $this->create($input);
		$user->save(); 

		return $user;
	}

	public function lists()
	{
		return $this->model
		->lists('name', 'id');
	}

	public function destroy($id)
	{
		$model = $this->getById($id);
		$model->delete();
	}

	public function edit($id)
	{
		$user = $this->model->findOrFail($id);

		return compact('user');
	}
	
	public function update($inputs, $id)
	{
		$user = $this->getById($id);

		$this->saveUser($user, $inputs);
	}

	public function getUserById($id)
	{
		return $this->getById($id);
	}

}