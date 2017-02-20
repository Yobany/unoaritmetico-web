<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 19/02/2017
 * Time: 06:57 PM
 */

namespace Swagger\Response\Data;

/**
 * @SWG\Definition(definition="GameItem")
 */
class GameItem
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
     * @var integer
     * @SWG\Property( example = 23)
     */
    private $movementsNumber;

    /**
     * @var integer
     * @SWG\Property( example = 1)
     */
    private $studentsNumber;
}