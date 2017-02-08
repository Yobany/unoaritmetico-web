<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 02/02/2017
 * Time: 11:36 PM
 */

namespace App\Transformers;


use App\User;

class TeacherTransformer extends MainTransformer
{
    public function trasform(User $entity)
    {
        $groupTransformer = new GroupTransformer();
        return [
            'id' => $entity->id,
            'first_name' => $entity->first_name,
            'last_name' => $entity->last_name,
            'role' => $entity->role,
            'email' => $entity->email,
            'groups' => $groupTransformer->transformCollection( $entity->groups )
        ];
    }
}