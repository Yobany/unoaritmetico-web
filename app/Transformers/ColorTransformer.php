<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 19/02/2017
 * Time: 12:12 PM
 */

namespace App\Transformers;


use App\Color;
use Illuminate\Database\Eloquent\Model;

class ColorTransformer extends MainTransformer
{
    /**
     * @param Color $entity
     * @return array
     */
    protected function transform($entity)
    {
        return [
            'name' => $entity->name
        ];
    }
}