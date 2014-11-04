<?php namespace App\Transformers;

class LocationTransformer extends Transformer {

	public function transform($status)
	{
		return [
			'id'		=> $status['_id'],
			'name'	=> $status['status'],
			'longitude'	=> $status['longitude'],
			'latitude'	=> $status['latitude']
		];
	}
}