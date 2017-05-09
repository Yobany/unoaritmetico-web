<?php

/**
 * @SWG\Definition(definition="WrappedGameList")
 */
class WrappedGameList
{
    /**
     * @var array
     * @SWG\Property(
     *     @SWG\Items(ref="#/definitions/GameItem")
     * )
     */
    private $data;
}