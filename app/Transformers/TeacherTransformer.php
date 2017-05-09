<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 02/02/2017
 * Time: 11:36 PM
 */

namespace App\Transformers;


use App\User;
use League\Fractal\TransformerAbstract;

class TeacherTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['groups'];

    /**
     * @param User $entity
     * @return array
     */
    public function transform(User $entity)
    {
        return [
            'id' => $entity->id,
            'first_name' => $entity->first_name,
            'last_name' => $entity->last_name,
            'role' => $entity->role,
            'email' => $entity->email
        ];
    }

    /**
     * @param User $user
     * @return \League\Fractal\Resource\Collection
     */
    public function includeGroups(User $user)
    {
        return $this->collection($user->groups, new GroupTransformer());
    }
}