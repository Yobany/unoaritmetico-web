<?php

namespace App\Transformers;

use Illuminate\Database\Eloquent\Model;

abstract class MainTransformer
{
    public function transformCollection($items)
    {
        $collection = array();
        foreach ($items as $item){
            $collection[] = $this->transformEntity( $item );
        }
        return $collection;
    }

    public function transformEntity($entity)
    {
        if(is_null($entity)) return null;
        return $this->transform($entity);
    }

    /**
     * @param Model $entity
     * @return array
     */
    protected abstract function transform($entity);
}