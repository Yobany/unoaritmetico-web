<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 04/02/2017
 * Time: 01:38 PM
 */

namespace App\Transformers;


use Illuminate\Pagination\AbstractPaginator;

class PaginatorTransformer extends MainTransformer
{

    public function transform($data)
    {
        return [
            'total' => intval($data->count()),
            'per_page' => intval($data->perPage()),
            'current_page' => intval($data->currentPage())
        ];
    }

}