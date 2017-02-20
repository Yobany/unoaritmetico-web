<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 20/02/2017
 * Time: 12:08 AM
 */

namespace Swagger\Response\Data;


/**
 * @SWG\Definition(definition="OperatorItem")
 */
class OperatorItem
{
    /**
     * @var string
     * @SWG\Property( example = "addition")
     */
    private $name;

    /**
     * @var string
     * @SWG\Property( example = "+")
     */
    private $symbol;
}