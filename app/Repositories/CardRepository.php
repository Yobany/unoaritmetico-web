<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/05/2017
 * Time: 12:33 AM
 */

namespace App\Repositories;


use App\Card;
use Bosnadev\Repositories\Eloquent\Repository;

class CardRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Card::class;
    }

    public function saveRaw($cardData){
        $card = new Card();
        if(isset($cardData['operation']) && isset($cardData['result'])){
            $card->operation_id = $this->getOperationCode($cardData['operation']);
            $card->operation = $cardData['operation'];
            $card->result = $cardData['result'];
        }

        if(isset($cardData['power'])){
            $card->card_power_id = $cardData['power'];
        }

        if(isset($cardData['color'])){
            $card->color_id = $cardData['color'];
        }
        $card->save();
        return $card;
    }

    private function getOperationCode($operation){
        if(str_contains($operation, '+')){
            return ADDITION_OPERATION;
        }

        if(str_contains($operation, '-')){
            return SUBSTRACTION_OPERATION;
        }

        if(str_contains($operation, '*')){
            return MULTIPLICATION_OPERATION;
        }

        if(str_contains($operation, '/')){
            return DIVISION_OPERATION;
        }

        return null;
    }
}