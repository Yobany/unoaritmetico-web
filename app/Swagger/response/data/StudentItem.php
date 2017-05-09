<?php

namespace Swagger\Response\Data;

/**
 * @SWG\Definition(definition="StudentItem")
 */
class StudentItem
{
    /**
     * @var integer
     * @SWG\Property( example = 1)
     */
    private $id;

    /**
     * @var string
     * @SWG\Property( example = "Mariana")
     */
    private $name;

    /**
     * @var integer
     * @SWG\Property( example = 16)
     */
    private $age;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/WrappedGroupItem")
     */
    private $group;

    /**
     * @var array
     * @SWG\Property(ref="#/definitions/WrappedGameList")
     */
    private $winned;

    /**
     * @var array
     * @SWG\Property(ref="#/definitions/WrappedGameList")
     */
    private $played;
}