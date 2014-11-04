<?php namespace App;

use Jenssegers\Mongodb\Model as Mongodb;

class Location extends Mongodb {
	protected $collection = 'locations';
	protected $fillable = [];
	protected $guarded = [];

	public function status()
	{
		return $this->belongsToMany('App\Status', 'location_status');
	}
}