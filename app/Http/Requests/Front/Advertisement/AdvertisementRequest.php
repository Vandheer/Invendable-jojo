<?php namespace App\Http\Requests\Front\Advertisement;

use App\Http\Requests\Request;

class AdvertisementRequest extends Request {

	public function authorize()
	{

		return true;
	}

	public function rules()
	{
		return [
			'user_type' => 'required|numeric|in:0,1',
			'phone' => 'required|phone_number',
			'region' => 'required|numeric|exists:regions,id',
			'department' => 'required|numeric|exists:departments,code',
			'postal_code' => 'required|postal_code',
			'city' => 'alpha|max:45',
			'id_city' => 'required|numeric|exists:cities,id',
			'last_name' => 'required|alpha_sp|max:45',
			'first_name' => 'required|alpha_sp|max:45',
			'pseudo' => 'required|alpha_num_sp|max:45',
			'email' => 'required|email|max:255',

			'ads_type' => 'required|numeric|in:1,2',
			'category' => 'required|numeric|exists:categories,id',
			'title' => 'required|alpha_num_sp|max:45',
			'description' => 'required|max:2000',
			'price' => 'required|numeric',
			'phone_mask' => 'numeric|in:1',
			'images'	=> 'array',
			
		];

		if($this->user_type){
			$rules['siren']	= 'required|numeric|siren';
			$rules['company_name'] = 'required|alpha_num_sp|max:45';
		}
	}
}