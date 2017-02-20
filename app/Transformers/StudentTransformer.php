<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 02/02/2017
 * Time: 11:39 PM
 */

namespace App\Transformers;


use App\Repositories\StudentRepository;
use App\Student;

class StudentTransformer extends MainTransformer
{

    /**
     * @param Student $entity
     * @return array
     */
    protected function transform($entity)
    {

        $groupTransformer = new GroupTransformer();
        $gameTransformer = new GameTransformer();
        return [
            'id' => $entity->id,
            'name' => $entity->name,
            'age' => $entity->age,
            'group' => $groupTransformer->transformEntity($entity->group),
            'winned' => count($gameTransformer->transformCollection($entity->gamesWinned())),
            'played' => $gameTransformer->transformCollection($entity->games)
        ];
    }
}