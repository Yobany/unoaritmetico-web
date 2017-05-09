<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/05/2017
 * Time: 02:54 PM
 */

namespace Swagger\Response\Games;

/**
 * @SWG\Definition(definition="GetGamesResponse")
 */
class GetGamesResponse
{
    /**
     * @var object
     * @SWG\Property(ref="#/definitions/PaginationMeta")
     */
    private $meta;

    /**
     * @var array
     * @SWG\Property(
     *     @SWG\Items(ref="#/definitions/GameItem")
     * )
     */
    private $data;
}