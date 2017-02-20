<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 19/02/2017
 * Time: 12:05 PM
 */

namespace App\Transformers;


use App\CardPower;

class CardPowerTransformer extends MainTransformer
{
    /**
     * @param CardPower $entity
     * @return array
     */
    protected function transform($entity)
    {
        return [
            'name' => $entity->name,
            'description' => $entity->description
        ];
    }
}