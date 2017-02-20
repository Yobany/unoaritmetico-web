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
    private $played_at;

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
     * @var array
     * @SWG\Property(
     *     @SWG\Items(ref="#/definitions/MoveItem")
     * )
     */
    private $moves;
}