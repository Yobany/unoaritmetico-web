<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 04/02/2017
 * Time: 05:49 PM
 */

namespace Swagger\Response\Data;

/**
 * @SWG\Definition(definition="UserItem")
 */
class UserItem
{
    /**
     * @var integer
     * @SWG\Property(example = 1)
     */
    private $id;

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
     * @SWG\Property(example = "TEACHER")
     */
    private $role;
}