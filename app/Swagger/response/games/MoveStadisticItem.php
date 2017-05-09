<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/05/2017
 * Time: 03:31 PM
 */

namespace Swagger\Response\Games;

/**
 * @SWG\Definition(definition="MoveStadisticItem")
 */
class MoveStadisticItem
{
    /**
     * @var integer
     * @SWG\Property(format="int64", example=78)
     */
    private $matchByColorCount;
}