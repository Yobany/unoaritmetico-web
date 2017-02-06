<?php

namespace App\Http\Controllers;

use App\Group;
use App\Transformers\PaginatorTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;
use stdClass;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Helpers;

    protected function responseTransformed($entity, $transformer = null, array $meta = null)
    {
        $transformed = null;
        $isValidTransformer = strcasecmp(get_parent_class($transformer), 'App\\Transformers\\MainTransformer') == 0;
        if(strcasecmp(get_parent_class($entity), "Illuminate\\Pagination\\AbstractPaginator") == 0 || $entity instanceof Paginator){
            $paginatorTransformer = new PaginatorTransformer();
            $meta = array_merge(is_null($meta)?[]:$meta, $paginatorTransformer->transform($entity));
            $entity = $entity->items();
        }

        if($isValidTransformer){
            $isCollectionEntity = is_array($entity) || strcasecmp(get_parent_class($entity), "Illuminate\\Support\\Collection") == 0;
            $transformed = ($isCollectionEntity) ? $transformer->transformCollection($entity) : $transformer->transform($entity);
        }else{
            $transformed = $entity;
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
