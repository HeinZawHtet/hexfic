<?php
 
namespace App\Providers;
 
use Illuminate\Support\ServiceProvider;
use App\Services\PhoneValidation;

class ValidationServiceProvider extends ServiceProvider {

    public function register() {

	}
 
    public function boot() {

		$this->app->validator->resolver(function($translator, $data, $rules, $messages)
		{
		 return new PhoneValidation($translator, $data, $rules, $messages);
		});
    }
 
}