<?php

namespace Swagger\Response\Groups;

/**
 * @SWG\Definition(definition="StoreGroupResponse")
 */
class StoreGroupResponse
{
    /**
     * @var object
     * @SWG\Property(ref="#/definitions/DefaultMeta")
     */
    private $meta;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/GroupItem")
     */
    private $data;
}