<?php

namespace Swagger\Request\Games;
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 18/02/2017
 * Time: 09:29 PM
 */

/**
 * @SWG\Definition(definition="StoreGameRequest")
 */
class StoreGameRequest
{
    /**
     * @var string
     * @SWG\Property( example = "2017-02-18 21:30:19")
     */
    private $playedAt;

    /**
     * @var string
     * @SWG\Property( example = "Ven y juega conmigo")
     */
    private $name;

    /**
     * @var integer
     * @SWG\Property( example = 1)
     */
    private $winner;

    /**
     * @var integer
     * @SWG\Property( example = 1)
     */
    private $group;

    /**
     * @var array
     * @SWG\Property(
     *     @SWG\Items(ref="#/definitions/MoveRequestItem")
     * )
     */
    private $moves;
}