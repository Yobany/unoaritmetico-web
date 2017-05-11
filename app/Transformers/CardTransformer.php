<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 19/02/2017
 * Time: 12:02 PM
 */

namespace App\Transformers;

use App\Card;
use League\Fractal\TransformerAbstract;

class CardTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['operator', 'power', 'color'];

    /**
     * @param Card $entity
     * @return array
     */
    public function transform(Card $entity)
    {
        return [
            'id' => $entity->id,
            'operation' => $entity->operation,
            'result' => $entity->result
        ];
    }

    /**
     * @param Card $card
     * @return \League\Fractal\Resource\Item
     */
    public function includeOperator(Card $card)
    {
        if(!is_null($card->operator))
            return $this->item($card->operator, new OperationTransformer());
    }

    /**
     * @param Card $card
     * @return \League\Fractal\Resource\Item
     */
    public function includePower(Card $card)
    {
        if(!is_null($card->power))
            return $this->item($card->power, new CardPowerTransformer());
    }

    /**
     * @param Card $card
     * @return \League\Fractal\Resource\Item
     */
    public function includeColor(Card $card)
    {
        if(!is_null($card->color))
            return $this->item($card->color, new ColorTransformer());
    }


}