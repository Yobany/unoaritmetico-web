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
    private $firstName;

    /**
     * @var string
     * @SWG\Property(example = "Papa")
     */
    private $lastName;

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
    private $passwordConfirmation;

}