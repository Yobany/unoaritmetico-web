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
    private $playedAt;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/WrappedGroupItem")
     */
    private $group;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/WrappedStudentItem")
     */
    private $winner;

    /**
     * @var array
     * @SWG\Property(ref="#/definitions/WrappedMoveList")
     */
    private $moves;

    /**
     * @var array
     * @SWG\Property(ref="#/definitions/WrappedStudentList")
     */
    private $students;
}