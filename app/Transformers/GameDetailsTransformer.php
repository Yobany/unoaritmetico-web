<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 19/02/2017
 * Time: 11:59 AM
 */

namespace App\Transformers;

use App\Game;
use League\Fractal\TransformerAbstract;

class GameDetailsTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['winner', 'moves', 'students'];

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
            'playedAt' => $entity->played_at
        ];
    }

    /**
     * @param Game $game
     * @return array|\League\Fractal\Resource\Item
     */
    public function includeWinner(Game $game)
    {
        if(!is_null($game->winner)){
            return $this->item($game->winner, new StudentTransformer());
        }
    }

    /**
     * @param Game $game
     * @return \League\Fractal\Resource\Collection
     */
    public function includeMoves(Game $game)
    {
        return $this->collection($game->moves, new MoveTransformer());
    }

    /**
     * @param Game $game
     * @return \League\Fractal\Resource\Collection
     */
    public function includeStudents(Game $game)
    {
        return $this->collection($game->students, new StudentTransformer());
    }
}