<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 02/02/2017
 * Time: 11:39 PM
 */

namespace App\Transformers;

use App\Group;

class GroupTransformer extends MainTransformer
{

    public function transform(Group $entity)
    {
        return [
            'id' => $entity->id,
            'name' => $entity->name,
            'studentsNumber' => count($entity->students)
        ];
    }
}