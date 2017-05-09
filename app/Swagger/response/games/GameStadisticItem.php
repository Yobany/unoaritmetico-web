<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/05/2017
 * Time: 03:29 PM
 */

namespace Swagger\Response\Games;

/**
 * @SWG\Definition(definition="GameStadisticItem")
 */
class GameStadisticItem
{
    /**
     * @var integer
     * @SWG\Property(format="int64", example=12)
     */
    private $playedCount;

    /**
     * @var integer
     * @SWG\Property(format="int64", example=2)
     */
    private $winnedCount;

    /**
     * @var integer
     * @SWG\Property(format="int64", example=10)
     */
    private $lostCount;
}