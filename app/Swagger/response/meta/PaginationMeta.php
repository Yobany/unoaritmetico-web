<?php

namespace Swagger\Response\Meta;

/**
 * @SWG\Definition(definition="PaginationMeta")
 */
class PaginationMeta
{
    /**
     * @var integer
     * @SWG\Property( example = 100)
     */
    private $total;

    /**
     * @var integer
     * @SWG\Property( example = 10)
     */
    private $per_page;

    /**
     * @var integer
     * @SWG\Property( example = 1)
     */
    private $current_page;
}