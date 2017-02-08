<?php
/**
 * Created by PhpStorm.
 * User: PIX
 * Date: 11/10/2016
 * Time: 02:15 AM
 */

namespace Swagger\Response\Error;

/**
 * @SWG\Definition(definition="ValidationItem")
 */
class ValidationItem
{
    /**
     * @var array
     * @SWG\Property(
     *     @SWG\Items(type="string")
     * )
     */
    private $field;
}