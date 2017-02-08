<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 02/02/2017
 * Time: 11:39 PM
 */

namespace App\Transformers;


use App\Student;

class StudentTransformer extends MainTransformer
{
    public function transform(Student $entity)
    {
        return [
            'id' => $entity->id,
            'name' => $entity->name,
            'age' => $entity->age,
            'group_id' => $entity->group_id
        ];
    }
}