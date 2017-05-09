<?php

/**
 * @SWG\Definition(definition="WrappedMoveList")
 */
class WrappedMoveList
{
    /**
     * @var array
     * @SWG\Property(
     *     @SWG\Items(ref="#/definitions/MoveItem")
     * )
     */
    private $data;
}