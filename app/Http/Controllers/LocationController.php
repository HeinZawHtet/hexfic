<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\LocationRepository;
use App\Transformers\LocationTransformer;

/**
 * @Resource("/api/v1/location")
 */
class LocationController extends ApiController {

	protected $request;
	protected $locationTransformer;
	protected $location;

	function __construct(
		Request $request,
		LocationTransformer $locationTransformer,
		LocationRepository  $location
		)
	{
		$this->request = $request;
		$this->locationTransformer = $locationTransformer;
		$this->location = $location;
	}

	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index()
	{
		$coor = explode(',', $this->request->input('ll'));
		return $this->location->findNear($coor);
	}

	/**
	 * Show the form for creating a new resource.
	 * @Get("/admin/location/create")
	 * @return Response
	 */
	public function create()
	{
		return view('location.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = [
			'name' => $this->request->get('name'),
			'loc' => [
				'lat' => (float) $this->request->get('lat'),
				'lon' => (float) $this->request->get('lon')
			],
			'township' => $this->request->get('township'),

		];
		dd($this->location->create($data));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
