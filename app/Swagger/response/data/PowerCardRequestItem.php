<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 20/02/2017
 * Time: 12:34 AM
 */

namespace Swagger\Response\Data;

/**
 * @SWG\Definition(definition="PowerCardRequestItem")
 */
class PowerCardRequestItem
{
    /**
     * @var integer
     * @SWG\Property(example = 1)
     */
    private $power;

    /**
     * @var integer
     * @SWG\Property(example = 1)
     */
    private $color;
}