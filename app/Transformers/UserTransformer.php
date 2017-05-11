<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 02/02/2017
 * Time: 11:20 PM
 */

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * @param User $entity
     * @return array
     */
    public function transform(User $entity)
    {
        return [
            'id' => $entity->id,
            'firstName' => $entity->first_name,
            'lastName' => $entity->last_name,
            'role' => $entity->role,
            'email' => $entity->email,
            'active' => $entity->active
        ];
    }
}