<?php namespace App\Repositories;

use App\Status;

class StatusRepository extends AbstractRepository {

	protected $model;

	function __construct(Status $status) {
		$this->model = $status;
	}

	public function getUpdates()
	{
		// return $this->model->where('created_at', '>', \Carbon\Carbon::now()->subHour())->with('location')->orderBy('created_at', 'desc')->get();
		return $this->model->with('location')->orderBy('created_at', 'desc')->get();
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
		return $this->model->with('location')->where('created_at', '>', $dateTime)->get();
	}
}