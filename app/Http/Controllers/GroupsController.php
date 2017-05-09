<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\ConsultRequest;
use App\Http\Requests\CreateGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Repositories\Criterias\FromUser;
use App\Repositories\Criterias\UserOwnershipCriteria;
use App\Repositories\GroupRepository;
use App\Services\GroupService;
use App\Transformers\GroupDetailsTransformer;
use App\Transformers\GroupTransformer;
use Illuminate\Http\Response;

class GroupsController extends Controller
{
    private $service;

    function __construct(GroupService $groupService)
    {
        $this->service = $groupService;
    }

    /**
     * @SWG\Get(
     *     path="/groups",
     *     summary="Obtains groups",
     *     tags={"Groups"},
     *     description="Obtains groups",
     *     operationId="getGroups",
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
     *         description="Groups created by user",
     *          @SWG\Schema(ref="#/definitions/GetGroupsResponse")
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ConsultRequest $request)
    {
        return fractal($this->service->get($request), new GroupTransformer())->respond();
    }

    /**
     * @SWG\Post(
     *     path="/groups",
     *     summary="Create a group",
     *     tags={"Groups"},
     *     description="Create a group",
     *     operationId="storeGroup",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Account to register",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/StoreGroupRequest")
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Account was registered",
     *         @SWG\Schema(ref="#/definitions/StoreGroupResponse")
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
    public function store(CreateGroupRequest $request)
    {
        return fractal($this->service->save($request), new GroupTransformer())->respond();
    }

    /**
     * @SWG\Get(
     *     path="/groups/{groupId}",
     *     summary="Display a single group",
     *     tags={"Groups"},
     *     description="Display a single group",
     *     operationId="getGroups",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="groupId",
     *         in="path",
     *         description="Id of group to retrieve",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Groups created by user",
     *          @SWG\Schema(ref="#/definitions/DetailGroupResponse")
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
     * @param Group $group
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Group $group)
    {
        return fractal($group, new GroupTransformer())->respond();
    }

    /**
     * @SWG\Put(
     *     path="/groups/{groupId}",
     *     summary="Update a group",
     *     tags={"Groups"},
     *     description="Update a group",
     *     operationId="updateGroup",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Group to update",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/UpdateGroupRequest")
     *     ),
     *     @SWG\Parameter(
     *         name="groupId",
     *         in="path",
     *         description="Id of group to retrieve",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Group was updated",
     *         @SWG\Schema(ref="#/definitions/UpdateGroupResponse")
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
    public function update(UpdateGroupRequest $request, Group $group)
    {
        return fractal($this->service->update($request, $group))->respond();
    }

    /**
     * @SWG\Delete(
     *     path="/groups/{groupId}",
     *     summary="Delete a group",
     *     tags={"Groups"},
     *     description="Delete a group",
     *     operationId="deleteGroup",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="groupId",
     *         in="path",
     *         description="Id of group to delete",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=204,
     *         description="Group was deleted"
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
    public function destroy(Group $group)
    {
        $this->service->delete($group);
        return response('' , Response::HTTP_NO_CONTENT);
    }
}
