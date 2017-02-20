<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 20/02/2017
 * Time: 12:10 AM
 */

namespace Swagger\Response\Data;

/**
 * @SWG\Definition(definition="PowerItem")
 */
class PowerItem
{
    /**
     * @var string
     * @SWG\Property( example = "Más 2")
     */
    private $name;

    /**
     * @var integer
     * @SWG\Property( example = "Agrega dos cartas a tu oponente")
     */
    private $description;
}