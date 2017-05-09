<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/03/2017
 * Time: 03:41 PM
 */

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class GameFileTransformer extends TransformerAbstract
{

    /**
     * @param $base64
     * @return array
     */
    public function transform($base64)
    {
        return [
            'base64' => $base64
        ];
    }
}