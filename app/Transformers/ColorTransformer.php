<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 19/02/2017
 * Time: 12:12 PM
 */

namespace App\Transformers;

use App\Color;
use League\Fractal\TransformerAbstract;

class ColorTransformer extends TransformerAbstract
{
    /**
     * @param Color $entity
     * @return array
     */
    public function transform(Color $entity)
    {
        return [
            'name' => $entity->name
        ];
    }
}