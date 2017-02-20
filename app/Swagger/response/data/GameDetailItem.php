<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 19/02/2017
 * Time: 03:42 PM
 */

namespace Swagger\Response\Data;


/**
 * @SWG\Definition(definition="GameDetailItem")
 */
class GameDetailItem
{
    /**
     * @var integer
     * @SWG\Property( example = 1)
     */
    private $id;

    /**
     * @var integer
     * @SWG\Property( example = "Ven y juega con jaimito")
     */
    private $name;

    /**
     * @var integer
     * @SWG\Property( example = 1201)
     */
    private $duration;

    /**
     * @var integer
     * @SWG\Property( example = "2017-02-18 21:30:19")
     */
    private $played_at;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/StudentItem")
     */
    private $winner;

    /**
     * @var array
     * @SWG\Property(
     *     @SWG\Items(ref="#/definitions/MoveItem")
     * )
     */
    private $movements;

    /**
     * @var array
     * @SWG\Property(
     *     @SWG\Items(ref="#/definitions/StudentItem")
     * )
     */
    private $students;
}