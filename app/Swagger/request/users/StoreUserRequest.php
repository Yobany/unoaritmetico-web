<?php

namespace Swagger\Request\Students;

/**
 * @SWG\Definition(definition="StoreUserRequest")
 */
class StoreUserRequest
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

}