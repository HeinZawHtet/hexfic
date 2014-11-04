<?php namespace App;

use Jenssegers\Mongodb\Model as Mongodb;

class Status extends Mongodb {
	protected $collection = 'status';

	public function location()
	{
		return $this->belongsTo('App\Location');
	}
}