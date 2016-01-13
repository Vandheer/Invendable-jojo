<?php namespace App\Http\Requests\Front\Advertisement;

use App\Http\Requests\Request;

class AdvertisementPasswordRequest extends Request {

	public function authorize()
	{

		return true;
	}

	public function rules()
	{
		return [
			'password' => 'required|min:6|max:45',
		];
	}
}