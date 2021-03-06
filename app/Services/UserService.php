<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 08/05/2017
 * Time: 11:57 PM
 */

namespace App\Services;

use App\Repositories\Criterias\FullNameCriteria;
use App\Repositories\Criterias\SortCriteria;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;

class UserService
{
    private $users;

    function __construct(UserRepository $userRepository)
    {
        $this->users = $userRepository;
    }

    public function get(Request $request)
    {
        $this->users->pushCriteria(new SortCriteria('id'));

        if($request->has('name')){
            $this->users->pushCriteria(new FullNameCriteria($request->get('name')));
        }
        if($request->has('size')){
            return $this->users->paginate($request->get('size'));
        }
        if($request->has('page')){
            return $this->users->paginate();
        }
        return $this->users->all();
    }

    public function save(Request $request)
    {
        $user = new User([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            'password' => $request->get('password')
        ]);
        $user->save();
        return $user;
    }

    public function update(Request $request, User $user)
    {
        $user->fill([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            'password' => $request->get('password')
        ]);
        $user->save();
        return $user;
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}