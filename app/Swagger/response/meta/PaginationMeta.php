<?php

namespace Swagger\Response\Meta;

/**
 * @SWG\Definition(definition="PaginationMeta")
 */
class PaginationMeta
{
    /**
     * @var object
     * @SWG\Property(ref="#/definitions/ItemPaginationMeta")
     */
    private $pagination;
}