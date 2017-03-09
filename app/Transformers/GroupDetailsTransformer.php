<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/03/2017
 * Time: 02:07 PM
 */

namespace App\Transformers;


use App\Group;
use Illuminate\Database\Eloquent\Model;

class GroupDetailsTransformer extends MainTransformer
{

    /**
     * @param Group $entity
     * @return array
     */
    protected function transform($entity)
    {
        $studentTransformer = new StudentTransformer();
        $gameTransformer = new GameTransformer();
        return [
            'id' => $entity->id,
            'name' => $entity->name,
            'students' => $studentTransformer->transformCollection($entity->students),
            'games' => $gameTransformer->transformCollection($entity->getGames())
        ];
    }
}