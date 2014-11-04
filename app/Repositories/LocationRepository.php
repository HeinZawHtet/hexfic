<?php namespace App\Repositories;

use App\Location;

class LocationRepository {
	function __construct(Location $location) {
		$this->location = $location;
	}

	public function findAll()
	{
		return $this->location->all();
	}

	public function create($data)
	{
		return $this->location->create($data);
	}

	public function findNear(array $coor, $maxDistance = 8046.72)
	{
		$lat = (float) $coor[0];
		$lon = (float) $coor[1];

		return $this->location->whereRaw([
				'loc' => [
					'$nearSphere' => [ $lon, $lat ],
					'$maxDistance' => $maxDistance
				]
			])->get();
	}
}