<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 18/02/2017
 * Time: 09:35 PM
 */

namespace Swagger\Response\Data;

/**
 * @SWG\Definition(definition="PowerCardItem")
 */
class PowerCardItem
{
    /**
     * @var string
     * @SWG\Property( example = "2+2")
     */
    private $operation;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/OperatorItem")
     */
    private $operator;

    /**
     * @var double
     * @SWG\Property( example = 4)
     */
    private $result;

    /**
     * @var integer
     * @SWG\Property(ref="#/definitions/PowerItem")
     */
    private $power;

    /**
     * @var integer
     * @SWG\Property(ref="#/definitions/ColorItem")
     */
    private $color;
}