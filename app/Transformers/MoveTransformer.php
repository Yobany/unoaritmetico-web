<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 19/02/2017
 * Time: 12:00 PM
 */

namespace App\Transformers;
use App\Move;
use League\Fractal\TransformerAbstract;

class MoveTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['cardOnDeck', 'cardPlayed', 'student'];

    /**
     * @param Move $entity
     * @return array
     */
    public function transform(Move $entity)
    {
        return [
            'turn' => $entity->turn,
            'duration' => $entity->duration,
            'matchByColor' => $entity->by_color
        ];
    }

    /**
     * @param Move $move
     * @return \League\Fractal\Resource\Item
     */
    public function includeCardPlayed(Move $move)
    {
        return $this->item($move->cardPlayed, new CardTransformer());
    }

    /**
     * @param Move $move
     * @return \League\Fractal\Resource\Item
     */
    public function includeCardOnDeck(Move $move)
    {
        return $this->item($move->cardOnDeck, new CardTransformer());
    }

    /**
     * @param Move $move
     * @return array|\League\Fractal\Resource\Item
     */
    public function includeStudent(Move $move)
    {
        if(is_null($move->student)){
            return [];
        }
        return $this->item($move->student, new StudentTransformer());
    }
}