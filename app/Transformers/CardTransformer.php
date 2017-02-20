<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 19/02/2017
 * Time: 12:02 PM
 */

namespace App\Transformers;

use App\Card;

class CardTransformer extends MainTransformer
{
    /**
     * @param Card $entity
     * @return array
     */
    protected function transform($entity)
    {
        $operationTransformer = new OperationTransformer();
        $cardPowerTransformer = new CardPowerTransformer();
        return [
            'id' => $entity->id,
            'operation' => $entity->operation,
            'result' => $entity->result,
            'operator' => $operationTransformer->transformEntity($entity->operation),
            'power' => $cardPowerTransformer->transformEntity($entity->power)
        ];
    }
}