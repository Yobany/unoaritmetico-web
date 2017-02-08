<?php

namespace Swagger\Response\Groups;

/**
 * @SWG\Definition(definition="GetGroupsResponse")
 */
class GetGroupsResponse
{
    /**
     * @var object
     * @SWG\Property(ref="#/definitions/PaginationMeta")
     */
    private $meta;

    /**
     * @var array
     * @SWG\Property(
     *     @SWG\Items(ref="#/definitions/GroupItem")
     * )
     */
    private $data;
}