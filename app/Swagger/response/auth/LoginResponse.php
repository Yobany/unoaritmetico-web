<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 03/02/2017
 * Time: 05:45 PM
 */

namespace Swagger\Response\Auth;

/**
 * @SWG\Definition(definition="LoginResponse")
 */
class LoginResponse
{
    /**
     * @var object
     * @SWG\Property(ref="#/definitions/TokenMeta")
     */
    private $meta;

    /**
     * @var object
     * @SWG\Property(ref="#/definitions/UserItem")
     */
    private $data;
}