<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\ActivateAccountRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Repositories\UserRepository;
use App\Transformers\UserTransformer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
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

    /**
     * @SWG\Post(
     *     path="/auth/login",
     *     summary="Login in the api",
     *     tags={"Accounts"},
     *     description="Login",
     *     operationId="loginAccount",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Account to register",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/LoginRequest")
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Token was given",
     *         @SWG\Schema(ref="#/definitions/LoginResponse")
     *     ),
     *     @SWG\Response(
     *         response=405,
     *         description="Invalid Method",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Request format isn't valid",
     *         @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal Error",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     * )
     */
    public function login(LoginRequest $request)
    {
        $user = $this->userRepository->findBy('email', $request->input('email'));
        if($user->active != 1){
            throw new UnauthorizedHttpException('', "Tu cuenta no esta activada");
        }
        $token = $this->issueJWT($request->only(['email','password']));
        return fractal($user, new UserTransformer())
            ->respond(Response::HTTP_OK, ['token', $token]);
    }

    /**
     * @SWG\Post(
     *     path="/auth/register",
     *     summary="Register a account",
     *     tags={"Accounts"},
     *     description="Register a account",
     *     operationId="registerAccount",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Account to register",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/RegisterUserRequest")
     *     ),
     *     @SWG\Response(
     *         response=201,
     *         description="Account was registered"
     *     ),
     *     @SWG\Response(
     *         response=405,
     *         description="Invalid Method",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Request format isn't valid",
     *         @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal Error",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     * )
     */
    public function register(RegisterUserRequest $request)
    {

        $this->userRepository->registerAccount([
            'first_name' => $request->get('firstName'),
            'last_name' => $request->get('lastName'),
            'email' => $request->get('email'),
            'password' => $request->get('password')]);
        return response('', Response::HTTP_NO_CONTENT);
    }

    /**
     * @SWG\Get(
     *     path="/auth/activate",
     *     summary="Activate account",
     *     tags={"Accounts"},
     *     description="Activates a account",
     *     operationId="activateUser",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="token",
     *         in="query",
     *         type="string",
     *         description="Token given by the mail",
     *         required=true
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Deliverys",
     *          @SWG\Schema(ref="#/definitions/ActivateUserResponse"),
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Request format isn't valid",
     *         @SWG\Schema(ref="#/definitions/Error")
     *     ),
     *     @SWG\Response(
     *         response=405,
     *         description="Invalid Method",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal Error",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     * )
     */
    public function activate(ActivateAccountRequest $request)
    {
        $user = $this->userRepository->findBy('activation_token', $request->input('token'));
        $this->userRepository->activateAccount($request->input('token'));
        return fractal($this->userRepository->find($user->id), new UserTransformer())->respond();
    }

    private function issueJWT($credentials)
    {
        $token = null;

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                throw new UnauthorizedHttpException('', "Correo o contraseña inválidos");
            }
        } catch (JWTException $e) {
            throw new InternalErrorException("Hubo un error inesperado");
        }

        return $token;
    }
}
