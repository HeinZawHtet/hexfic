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
				'name' 		=> $status['location']['name']
			],
			'created_at'	=> $status['created_at']
		];
	}
}