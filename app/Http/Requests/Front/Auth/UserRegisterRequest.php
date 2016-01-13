<?php namespace App\Http\Requests\Front\Auth;

use App\Http\Requests\Request;

class UserRegisterRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'user_type' => 'required|numeric|in:0,1',
			'phone' => 'required|phone_number',
			'region' => 'required|numeric|exists:regions,id',
			'department' => 'required|numeric|exists:departments,code',
			'postal_code' => 'required|postal_code',
			'city' => 'alpha|max:45',
			'id_city' => 'required|numeric|exists:cities,id',
			'last_name' => 'required|alpha_sp|max:45',
			'first_name' => 'required|alpha_sp|max:45',
			'pseudo' => 'required|alpha_num_sp|max:45|unique:users',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6|max:45',
		];

		if($this->user_type){
			$rules['siren']	= 'required|numeric|siren|unique:companies';
			$rules['company_name'] = 'required|alpha_num_sp|max:45';
		}

		return $rules;
	}
}
