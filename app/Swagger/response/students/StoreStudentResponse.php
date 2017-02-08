<?php

namespace Swagger\Response\Groups;

/**
 * @SWG\Definition(definition="StoreStudentResponse")
 */
class StoreStudentResponse
{
    /**
     * @var object
     * @SWG\Property(ref="#/definitions/DefaultMeta")
     */
    private $meta;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/StudentItem")
     */
    private $data;
}