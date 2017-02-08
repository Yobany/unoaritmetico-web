<?php

namespace Swagger\Request\Students;

/**
 * @SWG\Definition(definition="StoreStudentRequest")
 */
class StoreStudentRequest
{
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
     * @var integer
     * @SWG\Property( example = 1)
     */
    private $group_id;
}