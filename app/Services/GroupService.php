<?php

namespace App\Services;

use App\Group;
use App\Repositories\Criterias\NameCriteria;
use App\Repositories\Criterias\UserOwnershipCriteria;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;

class GroupService
{
    private $groups;

    function __construct(GroupRepository $groupRepository)
    {
        $this->groups = $groupRepository;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function get(Request $request)
    {
        $this->groups->pushCriteria(new UserOwnershipCriteria($request->user()->id));

        if($request->has('name')){
            $this->groups->pushCriteria(new NameCriteria($request->get('name'), 'groups'));
        }
        if($request->has('size')){
            return $this->groups->paginate($request->get('size'));
        }
        if($request->has('page')){
            return $this->groups->paginate();
        }
        return $this->groups->all();
    }

    /**
     * @param Request $request
     * @return Group
     */
    public function save(Request $request)
    {
        $group = new Group($request->only('name'));
        $request->user()->groups()->save($group);
        return $group;
    }


    public function update(Request $request, Group $group)
    {
        $group->fill($request->only(['name']));
        $group->save();
        return $group;
    }

    public function delete(Group $group)
    {
        $group->delete();
    }
}