<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 19/02/2017
 * Time: 12:07 PM
 */

namespace App\Transformers;


use App\Operation;

class OperationTransformer extends MainTransformer
{
    /**
     * @param Operation $entity
     * @return array
     */
    protected function transform($entity)
    {
        return [
            'name' => $entity->name,
            'symbol'=> $entity->symbol
        ];
    }
}