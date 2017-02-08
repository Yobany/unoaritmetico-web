<?php

namespace Swagger\Response\Groups;

/**
 * @SWG\Definition(definition="GetStudentsResponse")
 */
class GetStudentsResponse
{
    /**
     * @var object
     * @SWG\Property(ref="#/definitions/PaginationMeta")
     */
    private $meta;

    /**
     * @var array
     * @SWG\Property(
     *     @SWG\Items(ref="#/definitions/StudentItem")
     * )
     */
    private $data;
}