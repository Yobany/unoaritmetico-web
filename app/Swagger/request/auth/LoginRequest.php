<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 03/02/2017
 * Time: 05:46 PM
 */

namespace Swagger\Request\Auth;

/**
 * @SWG\Definition(definition="LoginRequest")
 */
class LoginRequest
{
    /**
     * @var string
     * @SWG\Property(example = "unoaritmeticoapi@gmail.com")
     */
    private $email;

    /**
     * @var string
     * @SWG\Property(example = "kittens")
     */
    private $password;
}