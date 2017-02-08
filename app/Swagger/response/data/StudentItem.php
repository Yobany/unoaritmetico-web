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
     * @SWG\Property(ref="#/definitions/GroupItem")
     */
    private $group;
}