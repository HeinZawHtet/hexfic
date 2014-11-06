<?php namespace App\Services;

use \Illuminate\Validation\Validator;

class PhoneValidation extends Validator {
	public function validatePhone($attribute, $value = 'phone', $parameters)
	{
		return preg_match("/^([0-9\s\-\+\(\)]*)$/", $value);
	}
}