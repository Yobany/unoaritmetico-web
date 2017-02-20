<?php

namespace Swagger\Response\Games;

/**
 * @SWG\Definition(definition="DetailGameResponse")
 */
class DetailGameResponse
{
    /**
     * @var object
     * @SWG\Property(ref="#/definitions/DefaultMeta")
     */
    private $meta;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/GameDetailItem")
     */
    private $data;
}