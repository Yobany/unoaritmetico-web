<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 19/02/2017
 * Time: 11:59 AM
 */

namespace App\Transformers;


use App\Game;

class GameDetailsTransformer extends MainTransformer
{
    /**
     * @param Game $entity
     * @return array
     */
    protected function transform($entity)
    {
        $movementTransformer = new MovementTransformer();
        $studentTransformer = new StudentTransformer();
       return [
           'id' => $entity->id,
           'name' => $entity->name,
           'duration' => $entity->duration,
           'played_at' => $entity->played_at,
           'winner' => $studentTransformer->transformEntity($entity->winner),
           'movements' => $movementTransformer->transformCollection($entity->moves),
           'students' => $studentTransformer->transformCollection($entity->students),
       ];
    }
}