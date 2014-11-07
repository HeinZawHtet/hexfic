<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ConfirmationRequest;
use App\Repositories\UserRepository;

/**
 * @Middleware("guest", except={"logout"})
 */
class AuthController extends ApiController {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	protected $user;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth, UserRepository $user)
	{
		$this->auth = $auth;
		$this->user = $user;
	}

	/**
	 * Show the application registration form.
	 *
	 * @Get("auth/register")
	 *
	 * @return Response
	 */
	public function showRegistrationForm()
	{
		// return view('auth.register');
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @Post("auth/register")
	 *
	 * @param  RegisterRequest  $request
	 * @return Response
	 */
	public function register(RegisterRequest $request)
	{
		$data = [
			'username'			=> $request->get('username'),
			'phone' 			=> $request->get('phone'),
			'confirmation_code' => mt_rand(1000, 9999),
			'activated' 		=> 0
		];

		$user = $this->user->create($data);

		if (!$user) {
			return $this->errorUnauthorized("Something wrong");
		}

		return $this->respond([
			'message' 			=> 'Confirmation code sent',
			'confirmation_code' => $user->confirmation_code
		]);
	}

	/**
	 * handle confirmation code
	 *
	 * @Post("auth/confirm")
	 *
	 * @param  RegisterRequest  $request
	 * @return Response
	 */
	public function confirm(ConfirmationRequest $request)
	{
		$userId = $request->get('user_id');
		$user = $this->user->findById($userId);

		$confirmCode = $user->confirmation_code;
		
		if ($confirmCode == $request->get('confirmation_code')) {
			$user = $this->user->update(['activated' => 1], $userId);
			
			return $this->respond([
				'message' 	=> 'Registration complete'
			]);
		}

		return $this->errorUnauthorized("Wrong Code");
	}

	/**
	 * Show the application login form.
	 *
	 * @Get("auth/login")
	 *
	 * @return Response
	 */
	public function showLoginForm()
	{
		$data = [
			'phone' => '095940058627',
			'username'		=> 'ssss'
		];

		return $this->auth->login($data);
		// return view('auth.login');
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @Post("auth/login")
	 *
	 * @param  LoginRequest  $request
	 * @return Response
	 */
	public function login(LoginRequest $request)
	{
		if ($this->auth->attempt($request->only('email', 'password')))
		{
			return redirect('/');
		}

		return redirect('/auth/login')->withErrors([
			'email' => 'These credentials do not match our records.',
		]);
	}

	/**
	 * Log the user out of the application.
	 *
	 * @Get("auth/logout")
	 *
	 * @return Response
	 */
	public function logout()
	{
		$this->auth->logout();

		return redirect('/');
	}

}
