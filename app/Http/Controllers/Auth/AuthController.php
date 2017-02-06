<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\ActivateAccountRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Repositories\UserRepository;
use App\Transformers\UserTransformer;
use App\Http\Controllers\Controller;
use Dingo\Api\Exception\InternalHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(LoginRequest $request)
    {
        $token = $this->issueJWT($request->only(['email','password']));
        //$user = $this->userRepository->findBy('email', $request->input('email'));
        return $this->responseTransformed(['token' => $token]);
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

    private function issueJWT($credentials)
    {
        $token = null;

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                $this->response->errorUnauthorized("Correo o contraseña inválidos");
            }
        } catch (JWTException $e) {
            $this->response->errorInternal("Hubo un error inesperado");
        }

        return $token;
    }
}
