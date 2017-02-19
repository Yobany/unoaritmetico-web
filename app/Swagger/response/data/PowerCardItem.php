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
     * @var integer
     * @SWG\Property( example = 1)
     */
    private $power_up;

    /**
     * @var integer
     * @SWG\Property( example = 1)
     */
    private $color;
}