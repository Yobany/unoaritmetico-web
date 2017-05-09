<?php

namespace Swagger\Response\Data;

/**
 * @SWG\Definition(definition="GroupItem")
 */
class GroupItem
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
     * @var integer
     * @SWG\Property( example = 1)
     */
    private $studentsCount;
}