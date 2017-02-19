<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 17/02/2017
 * Time: 02:41 PM
 */

namespace App\Repositories;


use App\Card;
use App\Game;
use App\Move;
use Bosnadev\Repositories\Eloquent\Repository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GameRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Game';
    }

    public function saveFromRequest(array $request){
        DB::beginTransaction();
        $game = new Game();
        $game->played_at = Carbon::parse($request['played_at']);
        $game->save();
        $students = [];
        $turn = 1;
        foreach ($request['moves'] as $current){
            $move = new Move();
            $move->turn = $turn;
            $move->duration = $current['duration'];
            $move->student_id = $current['student'];
            $move->cardOnDeck()->associate($this->makeCard($current['card_on_deck']));
            $move->cardPlayed()->associate($this->makeCard($current['card_played']));
            $move->game()->associate($game);
            $move->save();
            if(!in_array(intval($current['student']), $students)){
                $students[] = intval($current['student']);
            }
            $turn++;
        }

        foreach($students as $current){
            $game->students()->attach($current);
        }
        DB::commit();
    }

    private function makeCard($cardInfo){
        $card = new Card();
        if(isset($cardInfo['operation']) && isset($cardInfo['result'])){
            $operationCode = $this->getOperationCode($cardInfo['operation']);
            $card->operation_id = $operationCode;
            $card->operation = $cardInfo['operation'];
            $card->result = $cardInfo['result'];
        }

        if(isset($cardInfo['power_up'])){
            $card->card_power_id = $cardInfo['power_up'];
        }

        if(isset($cardInfo['color'])){
            $card->color_id = $cardInfo['color'];
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