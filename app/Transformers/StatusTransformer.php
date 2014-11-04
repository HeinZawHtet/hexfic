<?php namespace App\Transformers;

class StatusTransformer extends Transformer {

	public function transform($status)
	{
		return [
			'id'			=> $status['_id'],
			'status'		=> $status['status'],
			'comment'		=> $status['comment'],
			'location'		=> [
				'id' 		=> $status['location']['_id'],
				'name' 		=> $status['location']['name'],
				'longitude'	=> $status['location']['loc']['lon'],
				'latitude'  => $status['location']['loc']['lat']
			],
			'created_at'	=> $status['created_at']
		];
	}
}