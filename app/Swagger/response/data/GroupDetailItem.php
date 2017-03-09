<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/03/2017
 * Time: 02:10 PM
 */

namespace Swagger\Response\Data;

/**
 * @SWG\Definition(definition="GroupDetailItem")
 */
class GroupDetailItem
{
    /**
     * @var integer
     * @SWG\Property( example = 1)
     */
    private $id;

    /**
     * @var string
     * @SWG\Property( example = "Primary 1st Matutine")
     */
    private $name;

    /**
     * @var array
     * @SWG\Property(
     *     @SWG\Items(ref="#/definitions/StudentItem")
     * )
     */
    private $students;

    /**
     * @var array
     * @SWG\Property(
     *     @SWG\Items(ref="#/definitions/GameItem")
     * )
     */
    private $games;
}