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


    public function index(ConsultRequest $request)
    {
        $this->groupRepository->pushCriteria(new FromUser($request->user()->id));
        $perPage = $request->has('per_page') ? $request->input('per_page') : 10;
        $groups = $this->groupRepository->paginate($perPage);
        return $this->responseTransformed($groups, new GroupTransformer());
    }

    public function store(CreateGroupRequest $request)
    {
        $group = new Group($request->only(['name']));
        $request->user()->groups()->save($group);
        return $this->responseTransformed($group, new GroupTransformer());
    }

    public function show($groupId)
    {
        return $this->responseTransformed($this->groupRepository->find($groupId), new GroupTransformer());
    }

    public function update(UpdateGroupRequest $request, $groupId)
    {
        $group = $this->groupRepository->find($groupId);
        $group->fill($request->only(['name']));
        $group->save();
        return $this->responseTransformed($group, new GroupTransformer());
    }


    public function destroy($groupId)
    {
        $this->groupRepository->delete($groupId);
        return $this->response->noContent();
    }
}
