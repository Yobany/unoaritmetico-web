<?php

namespace App\Http\Controllers;

use App\Transformers\PaginatorTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use stdClass;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Helpers;

    protected function responseTransformed($entity, $transformer = null, array $meta = null)
    {
        $transformed = $entity;
        if(strcasecmp(get_parent_class($transformer), 'App\Utils\Transformer\MainTransformer') == 0){
            if(strcasecmp(get_parent_class($entity), "Illuminate\Pagination\AbstractPaginator") == 0 || $entity instanceof Paginator){
                $paginatorTransformer = new PaginatorTransformer();
                $meta = array_merge(is_null($meta)?[]:$meta, $paginatorTransformer->transform($entity));
                $entity = $entity->items();
                $transformed = $transformer->transformCollection($entity);
            }else{
                $transformed = $transformer->transform($entity);
            }
        }
        if(is_null($meta)){
            $meta = new stdClass();
        }
        $response = [
            'meta' => $meta,
            'data' => $transformed
        ];

        return $this->response->array($response);
    }
}
