<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/05/2017
 * Time: 03:34 PM
 */

namespace Swagger\Response\Data;

/**
 * @SWG\Definition(definition="StadisticItem")
 */
class StadisticItem
{
    /**
     * @var object
     * @SWG\Property(ref="#/definitions/MoveStadisticItem")
     */
    private $move;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/GameStadisticItem")
     */
    private $game;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/OperationStadisticItem")
     */
    private $operation;
}