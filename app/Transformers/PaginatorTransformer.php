<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 04/02/2017
 * Time: 01:38 PM
 */

namespace App\Transformers;


use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\Paginator;
use League\Fractal\TransformerAbstract;

class PaginatorTransformer extends TransformerAbstract
{
    /**
     * @param Paginator $entity
     * @return array
     */
    protected function transform($entity)
    {
        return [
            'total' => intval($entity->count()),
            'per_page' => intval($entity->perPage()),
            'current_page' => intval($entity->currentPage())
        ];
    }
}