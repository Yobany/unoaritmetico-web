<?php

/**
 * @SWG\Definition(definition="WrappedStudentItem")
 */
class WrappedStudentItem
{
    /**
     * @var object
     * @SWG\Property(ref="#/definitions/StudentItem")
     */
    private $data;
}