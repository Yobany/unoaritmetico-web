<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 20/02/2017
 * Time: 12:33 AM
 */

namespace Swagger\Response\Data;

/**
 * @SWG\Definition(definition="OperationCardRequestItem")
 */
class OperationCardRequestItem
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
     * @SWG\Property(example = 1)
     */
    private $color;
}