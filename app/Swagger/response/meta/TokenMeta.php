<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 08/02/2017
 * Time: 02:33 AM
 */

namespace Swagger\Response\Meta;

/**
 * @SWG\Definition(definition="TokenMeta")
 */
class TokenMeta
{
    /**
     * @var string
     * @SWG\Property(example = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjI3MzgzZTUwZDBiMGZmMWZlNGFkMDg3YzRmNDY4ZTIw")
     */
    private $token;
}