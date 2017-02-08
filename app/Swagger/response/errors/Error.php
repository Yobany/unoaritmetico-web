<?php

namespace Swagger\Response\Error;

/**
 * @SWG\Definition(definition="Error")
 */
class Error
{
    /**
     * @var string
     * @SWG\Property( example = "Bad Request")
     */
    private $message;

    /**
     * @var integer
     * @SWG\Property(format="int64", example=400)
     */
    private $status_code;
}