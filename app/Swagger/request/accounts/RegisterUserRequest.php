<?php

namespace Swagger\Request\Accounts;

/**
 * @SWG\Definition(definition="RegisterUserRequest")
 */
class RegisterUserRequest
{

    /**
     * @var string
     * @SWG\Property(example = "John")
     */
    private $first_name;

    /**
     * @var string
     * @SWG\Property(example = "Papa")
     */
    private $last_name;

    /**
     * @var string
     * @SWG\Property(example = "unoaritmeticoapi@gmail.com", format="email")
     */
    private $email;

    /**
     * @var string
     * @SWG\Property(example = "kittens", format="password")
     */
    private $password;

    /**
     * @var string
     * @SWG\Property(example = "kittens", format="password")
     */
    private $password_confirmation;

}