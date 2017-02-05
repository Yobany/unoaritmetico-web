<?php

namespace App\Transformers;


class MainTransformer
{
    public function transformCollection($items)
    {
        $collection = array();
        foreach ($items as $item){
            $collection[] = $this->transform( $item );
        }
        return $collection;
    }
}