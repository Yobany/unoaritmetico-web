<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/03/2017
 * Time: 03:37 PM
 */

namespace Swagger\Response\Games;

/**
 * @SWG\Definition(definition="ExportGameResponse")
 */
class ExportGameResponse
{
    /**
     * @var object
     * @SWG\Property(ref="#/definitions/DefaultMeta")
     */
    private $meta;

    /**
     * @var string
     * @SWG\Property(ref="#/definitions/GameDetailItem")
     */
    private $data;
}