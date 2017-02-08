<?php

namespace Swagger\Request\Groups;

/**
 * @SWG\Definition(definition="StoreGroupRequest")
 */
class StoreGroupRequest
{
    /**
     * @var string
     * @SWG\Property( example = "Primary 1st Matutine")
     */
    private $name;
}