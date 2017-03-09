<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/03/2017
 * Time: 03:41 PM
 */

namespace App\Transformers;

class GameFileTransformer extends MainTransformer
{

    /**
     * @param $base64
     * @return array
     */
    protected function transform($base64)
    {
        return [
            'base64' => $base64
        ];
    }
}