<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 04/02/2017
 * Time: 03:45 PM
 */

namespace Swagger\Request\Accounts;

/**
 * @SWG\Definition(definition="ResetPasswordRequest")
 */
class ResetPasswordRequest
{
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