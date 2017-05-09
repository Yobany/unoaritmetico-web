<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use App\Transformers\UserTransformer;
use App\User;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    private $service;

    function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    /**
     * @SWG\Get(
     *     path="/users",
     *     summary="Obtains users",
     *     tags={"Users"},
     *     description="Obtains users",
     *     operationId="getUsers",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="page",
     *         in="query",
     *         type="integer",
     *         description="Page requested, default is 1",
     *         required=false
     *     ),
     *     @SWG\Parameter(
     *         name="size",
     *         in="query",
     *         type="integer",
     *         description="Items per page, default is 10",
     *         required=false
     *     ),
     *     @SWG\Parameter(
     *         name="name",
     *         in="query",
     *         type="string",
     *         description="Search by name",
     *         required=false
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Users created by user",
     *          @SWG\Schema(ref="#/definitions/GetUsersResponse")
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Request format isn't valid",
     *         @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *    @SWG\Response(
     *         response=401,
     *         description="Token is invalid",
     *         @SWG\Schema(ref="#/definitions/Error"),
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
     * @param ConsultRequest $request
     * @return \Spatie\Fractal\Fractal
     */
    public function index(ConsultRequest $request)
    {
        return fractal($this->service->get($request), new UserTransformer())->respond();
    }

    /**
     * @SWG\Post(
     *     path="/users",
     *     summary="Create a user",
     *     tags={"Users"},
     *     description="Create a user",
     *     operationId="storeUser",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Account to register",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/StoreUserRequest")
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Account was registered",
     *         @SWG\Schema(ref="#/definitions/StoreUserResponse")
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Request format isn't valid",
     *         @SWG\Schema(ref="#/definitions/Error"),
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
    public function store(CreateUserRequest $request)
    {
        return fractal($this->service->save($request), new UserTransformer())->respond();
    }

    /**
     * @SWG\Get(
     *     path="/users/{userId}",
     *     summary="Display a single user",
     *     tags={"Users"},
     *     description="Display a single user",
     *     operationId="getUsers",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="userId",
     *         in="path",
     *         description="Id of user to retrieve",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Users created by user",
     *          @SWG\Schema(ref="#/definitions/DetailUserResponse")
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Request format isn't valid",
     *         @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *    @SWG\Response(
     *         response=401,
     *         description="Token is invalid",
     *         @SWG\Schema(ref="#/definitions/Error"),
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
    public function show(User $user)
    {
        return fractal($user, new UserTransformer())->respond();
    }

    /**
     * @SWG\Put(
     *     path="/users/{userId}",
     *     summary="Update a user",
     *     tags={"Users"},
     *     description="Update a user",
     *     operationId="updateUser",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="User to update",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/UpdateUserRequest")
     *     ),
     *     @SWG\Parameter(
     *         name="userId",
     *         in="path",
     *         description="Id of user to retrieve",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="User was updated",
     *         @SWG\Schema(ref="#/definitions/UpdateUserResponse")
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
     * @param UpdateUserRequest $request
     * @param User $user
     * @return \Spatie\Fractal\Fractal
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        return fractal($this->service->update($request, $user), new UserTransformer())->respond();
    }

    /**
     * @SWG\Delete(
     *     path="/users/{userId}",
     *     summary="Delete a user",
     *     tags={"Users"},
     *     description="Delete a user",
     *     operationId="deleteUser",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="userId",
     *         in="path",
     *         description="Id of user to delete",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=204,
     *         description="User was deleted"
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
     * @param User $user
     * @return \Spatie\Fractal\Fractal
     */
    public function destroy(User $user)
    {
        $this->service->delete($user);
        return fractal('', Response::HTTP_NO_CONTENT);
    }
}
