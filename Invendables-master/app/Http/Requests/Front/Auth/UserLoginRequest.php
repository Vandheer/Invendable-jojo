<?php namespace App\Http\Requests\Front\Auth;

use App\Http\Requests\Request;

class UserLoginRequest extends Request {

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
		return [
            'email' => 'required|email|max:255|exists:users,email',
            'password' => 'required|min:6|max:45',
		];
	}

	public function messages()
	{
	    return [
	        'email.exists' => trans('form.login_no_email'),
	    ];
	}

}
