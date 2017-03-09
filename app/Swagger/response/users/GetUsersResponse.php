<?php

namespace Swagger\Response\Users;

/**
 * @SWG\Definition(definition="GetUsersResponse")
 */
class GetUsersResponse
{
    /**
     * @var object
     * @SWG\Property(ref="#/definitions/PaginationMeta")
     */
    private $meta;

    /**
     * @var array
     * @SWG\Property(
     *     @SWG\Items(ref="#/definitions/UserItem")
     * )
     */
    private $data;
}