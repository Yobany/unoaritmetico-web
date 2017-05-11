<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 11/05/2017
 * Time: 12:46 AM
 */

namespace Swagger\Response\Meta;

/**
 * @SWG\Definition(definition="ItemPaginationMeta")
 */
class ItemPaginationMeta
{
    /**
     * @var integer
     * @SWG\Property( example = 100)
     */
    private $count;

    /**
     * @var integer
     * @SWG\Property( example = 10)
     */
    private $size;

    /**
     * @var integer
     * @SWG\Property( example = 1)
     */
    private $page;
}