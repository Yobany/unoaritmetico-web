<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 19/02/2017
 * Time: 11:56 AM
 */

namespace App\Transformers;
use App\Game;

class GameTransformer extends MainTransformer
{
    /**
     * @param Game $entity
     * @return array
     */
    protected function transform($entity)
    {
        return [
            'id' => $entity->id,
            'name' => $entity->name,
            'duration' => $entity->duration,
            'played_at' => $entity->played_at,
            'movementsNumber' => count($entity->moves),
            'studentsNumber' => count($entity->students),
        ];
    }
}