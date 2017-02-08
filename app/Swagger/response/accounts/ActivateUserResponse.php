<?php

namespace Swagger\Response\Accounts;

/**
 * @SWG\Definition(definition="ActivateUserResponse")
 */
class ActivateUserResponse
{
    /**
     * @var object
     * @SWG\Property(ref="#/definitions/DefaultMeta")
     */
    private $meta;

    /**
     * @var array
     * @SWG\Property(ref="#/definitions/UserItem")

     */
    private $data;
}