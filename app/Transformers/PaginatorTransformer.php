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
use League\Fractal\Pagination\PaginatorInterface;
use League\Fractal\TransformerAbstract;

class PaginatorTransformer extends TransformerAbstract
{
    /**
     * @param PaginatorInterface $entity
     * @return array
     */
    public function transform(PaginatorInterface $entity)
    {
        return [
            'count' => intval($entity->getTotal()),
            'size' => intval($entity->getPerPage()),
            'page' => intval($entity->getCurrentPage())
        ];
    }
}