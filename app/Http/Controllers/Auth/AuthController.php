<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\ActivateAccountRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Repositories\UserRepository;
use App\Transformers\UserTransformer;
use Auth;
use JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->error('Invalid credentials', 401);
            }
        } catch (\JWTException $e) {
            return response()->error('Could not create token', 500);
        }

        $user = Auth::user();

        return response()->success(compact('user', 'token'));
    }

    public function register(RegisterUserRequest $request)
    {
        $this->userRepository->registerAccount($request->only(['first_name', 'last_name', 'email', 'password']));
        return $this->response->noContent();
    }

    public function activate(ActivateAccountRequest $request)
    {
        $user = $this->userRepository->findBy('activation_token', $request->input('token'));
        $this->userRepository->activateAccount($request->input('token'));
        return $this->responseTransformed($user, new UserTransformer());
    }
}
