<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 19/02/2017
 * Time: 12:07 PM
 */

namespace App\Transformers;


use App\Operation;
use League\Fractal\TransformerAbstract;

class OperationTransformer extends TransformerAbstract
{
    /**
     * @param Operation $entity
     * @return array
     */
    public function transform(Operation $entity)
    {
        return [
            'name' => $entity->name,
            'symbol'=> $entity->symbol
        ];
    }
}