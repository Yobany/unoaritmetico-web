<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 20/02/2017
 * Time: 12:20 AM
 */

namespace Swagger\Response\Data;


/**
 * @SWG\Definition(definition="StudentMovementItem")
 */
class StudentMovementItem
{
    /**
     * @var integer
     * @SWG\Property( example = 1)
     */
    private $id;

    /**
     * @var string
     * @SWG\Property( example = "Rick Grimes")
     */
    private $name;
}