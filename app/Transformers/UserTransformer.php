<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 02/02/2017
 * Time: 11:20 PM
 */

namespace App\Transformers;

use App\User;

class UserTransformer extends MainTransformer
{

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
}