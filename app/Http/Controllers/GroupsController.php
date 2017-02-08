<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\ConsultRequest;
use App\Http\Requests\CreateGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Repositories\Criterias\FromUser;
use App\Repositories\GroupRepository;
use App\Transformers\GroupTransformer;

class GroupsController extends Controller
{
    private $groupRepository;

    function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
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
     */
    public function index(ConsultRequest $request)
    {
        $this->groupRepository->pushCriteria(new FromUser($request->user()->id));
        $perPage = $request->has('per_page') ? $request->input('per_page') : 10;
        $groups = $this->groupRepository->paginate($perPage);
        return $this->responseTransformed($groups, new GroupTransformer());
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
        $group = new Group($request->only(['name']));
        $request->user()->groups()->save($group);
        return $this->responseTransformed($group, new GroupTransformer());
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
     */
    public function show($groupId)
    {
        return $this->responseTransformed($this->groupRepository->find($groupId), new GroupTransformer());
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
    public function update(UpdateGroupRequest $request, $groupId)
    {
        $group = $this->groupRepository->find($groupId);
        $group->fill($request->only(['name']));
        $group->save();
        return $this->responseTransformed($group, new GroupTransformer());
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
    public function destroy($groupId)
    {
        $this->groupRepository->delete($groupId);
        return $this->response->noContent();
    }
}
