<?php

/**
 * @SWG\Definition(definition="WrappedStudentList")
 */
class WrappedStudentList
{
    /**
     * @var array
     * @SWG\Property(
     *     @SWG\Items(ref="#/definitions/StudentItem")
     * )
     */
    private $data;
}