<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/03/2017
 * Time: 02:55 PM
 */

namespace Swagger\Request\Students;

/**
 * @SWG\Definition(definition="UpdateUserRequest")
 */
class UpdateUserRequest
{
    /**
     * @var string
     * @SWG\Property( example = "Mariana")
     */
    private $firstName;

    /**
     * @var string
     * @SWG\Property( example = "López")
     */
    private $lastName;

    /**
     * @var string
     * @SWG\Property( example = "mariana@gmail.com")
     */
    private $email;

    /**
     * @var string
     * @SWG\Property( example = "ADMIN")
     */
    private $role;

    /**
     * @var string
     * @SWG\Property( example = "kittens")
     */
    private $password;

    /**
     * @var boolean
     * @SWG\Property( example = 1)
     */
    private $active;
}