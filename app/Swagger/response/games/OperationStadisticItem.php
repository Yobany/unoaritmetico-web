<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/05/2017
 * Time: 03:32 PM
 */

namespace Swagger\Response\Games;

/**
 * @SWG\Definition(definition="OperationStadisticItem")
 */
class OperationStadisticItem
{
    /**
     * @var integer
     * @SWG\Property(format="int64", example=90)
     */
    private $additionCount;

    /**
     * @var integer
     * @SWG\Property(format="int64", example=12)
     */
    private $substractionCount;

    /**
     * @var integer
     * @SWG\Property(format="int64", example=24)
     */
    private $multiplicationCount;

    /**
     * @var integer
     * @SWG\Property(format="int64", example=56)
     */
    private $divisionCount;
}