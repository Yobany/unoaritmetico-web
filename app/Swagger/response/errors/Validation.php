<?php
/**
 * Created by PhpStorm.
 * User: PIX
 * Date: 11/10/2016
 * Time: 02:14 AM
 */

namespace Swagger\Response\Error;

/**
 * @SWG\Definition(definition="Validation")
 */
class Validation
{
    /**
     * @var array
     * @SWG\Property(ref="#/definitions/ValidationItem")
     */
    private $error;
}