<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 04/02/2017
 * Time: 02:27 PM
 */

namespace Swagger\Request\Accounts;

/**
 * @SWG\Definition(definition="RecoverPasswordRequest")
 */
class RecoverPasswordRequest
{
    /**
     * @var string
     * @SWG\Property(example = "unoaritmeticoapi@gmail.com", format="email")
     */
    private $email;
}