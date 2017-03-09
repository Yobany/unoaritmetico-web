<?php

namespace Swagger\Response\Users;

/**
 * @SWG\Definition(definition="DetailUserResponse")
 */
class DetailUserResponse
{
    /**
     * @var object
     * @SWG\Property(ref="#/definitions/DefaultMeta")
     */
    private $meta;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/UserItem")
     */
    private $data;
}