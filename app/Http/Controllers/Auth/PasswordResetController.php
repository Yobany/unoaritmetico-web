<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RecoverPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class PasswordResetController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @SWG\Post(
     *     path="/auth/password/recover",
     *     summary="Sends the recover password link",
     *     tags={"Accounts"},
     *     description="Sends the recover password link",
     *     operationId="recoverAccount",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Account to register",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/RecoverPasswordRequest")
     *     ),
     *     @SWG\Response(
     *         response=201,
     *         description="Password recover link was sent"
     *     ),
     *     @SWG\Response(
     *         response=405,
     *         description="Invalid Method",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Invalid Fields",
     *          @SWG\Schema(ref="#/definitions/Validation"),
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal Error",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     * )
     */
    public function recover(RecoverPasswordRequest $request)
    {
        $this->userRepository->sendResetPasswordLink($request->input('email'));
        return $this->response->noContent();
    }

    /**
     * @SWG\Post(
     *     path="/auth/password/reset",
     *     summary="Updates the user password",
     *     tags={"Accounts"},
     *     description="Updates the user password",
     *     operationId="recoverAccount",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="token",
     *         in="query",
     *         type="string",
     *         description="Token given by the mail",
     *         required=true
     *     ),
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Account to register",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/ResetPasswordRequest")
     *     ),
     *     @SWG\Response(
     *         response=201,
     *         description="Password recover link was sent"
     *     ),
     *     @SWG\Response(
     *         response=405,
     *         description="Invalid Method",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Invalid Fields",
     *          @SWG\Schema(ref="#/definitions/Validation"),
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal Error",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     * )
     */
    public function reset(ResetPasswordRequest $request)
    {
        $this->userRepository->resetPassword($request->input('token'), $request->input('password'));
        return $this->response->noContent();
    }
}
