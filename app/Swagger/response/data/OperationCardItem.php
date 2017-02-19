<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 18/02/2017
 * Time: 09:35 PM
 */

namespace Swagger\Response\Data;

/**
 * @SWG\Definition(definition="OperationCardItem")
 */
class OperationCardItem
{
    /**
     * @var string
     * @SWG\Property( example = "2+2")
     */
    private $operation;

    /**
     * @var double
     * @SWG\Property( example = 4)
     */
    private $result;

    /**
     * @var integer
     * @SWG\Property( example = 1)
     */
    private $color;
}