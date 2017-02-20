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
     * @var integer
     * @SWG\Property(ref="#/definitions/StudentMovementItem")
     */
    private $student;

    /**
     * @var boolean
     * @SWG\Property( example = false)
     */
    private $by_color;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/OperationCardItem")
     */
    private $card_on_deck;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/PowerCardItem")
     */
    private $card_played;
}