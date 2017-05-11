<?php

namespace App\Serializers;

use App\Transformers\PaginatorTransformer;
use League\Fractal\Pagination\PaginatorInterface;
use League\Fractal\Serializer\DataArraySerializer;

class CustomSerializer extends DataArraySerializer
{
    public function paginator(PaginatorInterface $paginator)
    {
        $transformer = new PaginatorTransformer();
        return
            [
                'pagination' => $transformer->transform($paginator)
            ];
    }
}