<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 18/02/2017
 * Time: 09:32 PM
 */

namespace Swagger\Response\Data;

/**
 * @SWG\Definition(definition="MoveItem")
 */
class MoveItem
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
     * @var object
     * @SWG\Property(ref="#/definitions/WrappedStudentItem")
     */
    private $student;

    /**
     * @var boolean
     * @SWG\Property( example = false)
     */
    private $matchByColor;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/WrappedOperationCardItem")
     */
    private $cardOnDeck;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/WrappedPowerCardItem")
     */
    private $cardPlayed;
}