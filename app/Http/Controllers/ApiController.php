<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class ApiController extends Controller {

	protected $statusCode = 200;

	public function getStatusCode()
	{
		return $this->statusCode;
	}

	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;
		return $this;
	}

	public function responseNotFound($message = 'Result not found')
	{
		return $this->setStatusCode(404)->respondWithError($message);
	}

	public function errorForbidden($message = 'Forbidden')
	{
		return $this->setStatusCode(403)->respondWithError($message);
	}

	public function errorInternalError($message = 'Internal Error')
	{
		return $this->setStatusCode(500)->respondWithError($message);
	}

	public function errorNotFound($message = 'Resource Not Found')
	{
		return $this->setStatusCode(404)->respondWithError($message);
	}

	public function errorUnauthorized($message = 'Unauthorized')
	{
		return $this->setStatusCode(401)->respondWithError($message);
	}

	public function errorWrongArgs($message = 'Wrong Arguments')
	{
		return $this->setStatusCode(400)->respondWithError($message);
	}

	public function respond($data, $headers = [])
	{
		return \Response::json($data, $this->getStatusCode(), $headers);
	}

	public function respondWithError($message)
	{
		return $this->respond([
			'error' => [
				'message' => $message,
				'status_code' => $this->getStatusCode()
			]
		]);
	}
}