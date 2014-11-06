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

	public function getFresh($lastItemTime)
	{
		$lastItemTime = (string) ((int)$lastItemTime + 1);
		$dateTime = new \DateTime();
		$dateTime->setTimestamp($lastItemTime);
		echo $dateTime->format('d M Y H:i');
		//dd(\Carbon\Carbon::parse(strtotime($lastItemTime))->toDateString());
		//$test = new \MongoDate(new \DateTime($lastItemTime)->getTimestamp());
		//dd(new \DateTime::createFromFormat(\DateTime::ISO8601, $lastItemTime));
		return $this->status->with('location')->where('created_at', '>', $dateTime)->get();
	}
}