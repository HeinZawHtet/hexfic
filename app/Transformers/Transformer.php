<?php namespace App\Transformers;

abstract class Transformer {
	// public function transformCollection(array $items)
	// {
	// 	return array_map([$this, 'transform'], $items);
	// }

	public function transformByLocation(array $items)
	{
		$result = [];
		foreach ($items as $item) {
			$result[$item['location']['name']][] = $item;
		}

		return $result;
	}

	public function transformByGroup(array $items) {
		$result = [
			'15 min ago' => [],
			'30 min ago' => [],
			'45 min ago' => [],
			'60 min ago' => []
		];
		foreach ($items as $item) {
			$min = \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffInMinutes();
			// $result[$item['status']][] = $item;
			if ($min < 15) {
				$result['15 min ago'][] = $item;
			}
			if ($min < 30 && $min > 15) {
				$result['30 min ago'][] = $item;
			}
			if ($min < 45 && $min > 30) {
				$result['45 min ago'][] = $item;
			}
			if ($min < 60 && $min > 45) {
				$result['60 min ago'][] = $item;
			}		
		}
		$array = [];
		foreach ($result as $key => $fuck) {

			if (!empty($fuck)) {
				$array[$key] = array_map(function($status) {
					return [
						'id'			=> $status['_id'],
						'status'		=> $status['status'],
						'message'		=> $status['comment'],
						'location'		=> [
							'id' 			=> $status['location']['_id'],
							'name' 			=> $status['location']['name'],
							'longitude'		=> $status['location']['loc']['lon'],
							'latitude'  	=> $status['location']['loc']['lat']
						],
						'created_at'	=> \Carbon\Carbon::parse($status['created_at'])->timestamp
					];


				}, $fuck);
			} else {
				$array[$key] = [];
			}
		}
		return $array;
	}

	public function transformByTownship(array $items)
	{
		foreach ($items as $item) {
			$min = \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffInMinutes();
			// $result[$item['status']][] = $item;
			if ($min < 15) {
				$result['15 min ago'][] = $item;
			}
			if ($min < 30 && $min > 15) {
				$result['30 min ago'][] = $item;
			}
			if ($min < 45 && $min > 30) {
				$result['45 min ago'][] = $item;
			}
			if ($min < 60 && $min > 45) {
				$result['60 min ago'][] = $item;
			}		
		}
		$array = [];
		foreach ($result as $key => $fuck) {
			if (!empty($fuck)) {
				$array[$fuck[0]['location']['name']] = array_map(function($status) {
					return [
						'id'			=> $status['_id'],
						'status'		=> $status['status'],
						'message'		=> $status['comment'],
						'location'		=> [
							'id' 			=> $status['location']['_id'],
							'name' 			=> $status['location']['name'],
							'longitude'		=> $status['location']['loc']['lon'],
							'latitude'  	=> $status['location']['loc']['lat']
						],
						'created_at'	=> \Carbon\Carbon::parse($status['created_at'])->timestamp
					];


				}, $fuck);
			} else {
				$array[$key] = [];
			}
		}
		return $array;
	}

	public abstract function transform($status);
}