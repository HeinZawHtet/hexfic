<?php namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'phone' => 'required|regex:/[0-9]{10,11}/|unique:users',
			'username' => 'required|min:3',
			'username' => 'required|min:3',
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed|min:8'
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}
