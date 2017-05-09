<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 20/02/2017
 * Time: 12:32 AM
 */

namespace Swagger\Response\Data;

/**
 * @SWG\Definition(definition="MoveRequestItem")
 */
class MoveRequestItem
{
    /**
     * @var integer
     * @SWG\Property( example = 1)
     */
    private $turn;

    /**
     * @var integer
     * @SWG\Property( example = 122)
     */
    private $duration;

    /**
     * @var integer
     * @SWG\Property(example = 1)
     */
    private $student;

    /**
     * @var boolean
     * @SWG\Property( example = false)
     */
    private $matchByColor;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/OperationCardRequestItem")
     */
    private $cardOnDeck;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/PowerCardRequestItem")
     */
    private $cardPlayed;
}