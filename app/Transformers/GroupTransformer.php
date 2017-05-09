<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 02/02/2017
 * Time: 11:39 PM
 */

namespace App\Transformers;

use App\Group;
use League\Fractal\TransformerAbstract;

class GroupTransformer extends TransformerAbstract
{
    /**
     * @param Group $entity
     * @return array
     */
    public function transform(Group $entity)
    {
        return [
            'id' => $entity->id,
            'name' => $entity->name,
            'studentsCount' => count($entity->students)
        ];
    }
}