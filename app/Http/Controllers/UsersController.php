<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Transformers\UserTransformer;
use App\User;

class UsersController extends Controller
{
    private $userRepository;

    function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
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
     *         name="per_page",
     *         in="query",
     *         type="integer",
     *         description="Items per page, default is 10",
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
     */
    public function index(ConsultRequest $request)
    {
        $perPage = $request->has('per_page') ? $request->input('per_page') : 10;
        $users = $this->userRepository->paginate($perPage);
        return $this->responseTransformed($users, new UserTransformer());
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
    public function store(CreateUserRequest $request)
    {
        $user = new User($request->only(['first_name', 'last_name', 'email', 'role', 'password']));
        $user->active = true;
        $user->save();
        return $this->responseTransformed($user, new UserTransformer());
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
    public function show($userId)
    {
        return $this->responseTransformed($this->userRepository->find($userId), new UserTransformer());
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
    public function update(UpdateUserRequest $request, $userId)
    {
        $user = $this->userRepository->find($userId);
        $user->fill($request->only(['first_name', 'last_name', 'email', 'role', 'active']));
        $user->save();
        return $this->responseTransformed($user, new UserTransformer());
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
     */
    public function destroy($userId)
    {
        $this->userRepository->delete($userId);
        return $this->response->noContent();
    }
}
