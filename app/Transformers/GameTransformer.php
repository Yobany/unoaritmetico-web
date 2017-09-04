<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 19/02/2017
 * Time: 11:56 AM
 */

namespace App\Transformers;
use App\Game;
use League\Fractal\TransformerAbstract;

class GameTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['group'];

    /**
     * @param Game $entity
     * @return array
     */
    public function transform(Game $entity)
    {
        return [
            'id' => $entity->id,
            'name' => $entity->name,
            'duration' => $entity->duration,
            'playedAt' => $entity->played_at,
            'movesCount' => count($entity->moves),
            'studentsCount' => count($entity->students),
        ];
    }

    /**
     * @param Game $game
     * @return \League\Fractal\Resource\Item
     */
    public function includeGroup(Game $game)
    {
        return $this->item($game->group, new GroupTransformer());
    }
}