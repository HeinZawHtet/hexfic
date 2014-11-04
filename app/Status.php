<?php namespace App;

use Carbon\Carbon as Carbon;
use Jenssegers\Mongodb\Model as Mongodb;

class Status extends Mongodb {
	protected $collection = 'status';

	public function location()
	{
		return $this->belongsTo('App\Location');
	}
   	public function getCreatedAtAttribute($attr) {        
        return Carbon::parse($attr)->format('Y-m-d\TH:i:sO');
    }
}