<?php namespace App\Repositories;

use App\User;

class UserRepository extends AbstractRepository {

	protected $model;

	function __construct(User $user) {
		$this->model = $user;
	}
}