<?php namespace App\Repositories;

use App\Status;

class StatusRepository {
	function __construct(Status $status) {
		$this->status = $status;
	}

	public function getUpdates()
	{
		return $this->status->with('location')->get();
	}
}