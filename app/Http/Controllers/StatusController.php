<?php namespace App\Http\Controllers;

use App\Status;
use App\Transformers\StatusTransformer;
use App\Repositories\StatusRepository;
use App\Http\Requests\StatusRequest;

/**
 * @Resource("/api/v1/status")
 */
class StatusController extends ApiController {

	protected $statusTransformer;

	function __construct(
		StatusTransformer $statusTransformer,
		StatusRepository $status
		)
	{
		$this->statusTransformer = $statusTransformer;
		$this->status = $status;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$status = $this->status->getUpdates()->toArray();

		return $this->respond(
			$this->statusTransformer->transformCollection($status)
		);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(StatusRequest $request)
	{
		dd($request->input('comment'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$status = Status::find($id);

		if (!$status) {
			return $this->responseNotFound("Status doesn't exist");
		}

		return $this->respond([
			'data' => $this->statusTransformer->transform($status)
		]);
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
