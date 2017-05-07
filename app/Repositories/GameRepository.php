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

    public function saveFromRequest(array $gameData){
        DB::beginTransaction();
        $game = new Game();
        $game->played_at = Carbon::parse($gameData['played_at']);
        $game->name = $gameData['name'];
        $game->student_winner_id = isset($gameData['winner']) ? $gameData['winner'] : null;
        $game->duration = 0;
        $game->save();
        $students = [];
        $duration = 0;
        foreach ($gameData['moves'] as $current){
            $move = new Move();
            $move->turn = $current['turn'];
            $move->duration = $current['duration'];
            $move->student_id = isset($current['student']) ? $current['student'] : null;
            $move->by_color = $current['by_color'];
            $move->cardOnDeck()->associate($this->makeCard($current['card_on_deck']));
            $move->cardPlayed()->associate($this->makeCard($current['card_played']));
            $move->game()->associate($game);
            $move->save();
            if(isset($current['student']) && !in_array(intval($current['student']), $students)){
                $students[] = intval($current['student']);
            }
            $duration += $current['duration'];
        }

        foreach($students as $current){
            $game->students()->attach($current);
        }
        $game->duration = $duration;
        $game->save();
        DB::commit();
    }

    private function makeCard($cardInfo){
        $card = new Card();
        if(isset($cardInfo['operation']) && isset($cardInfo['result'])){
            $card->operation_id = $this->getOperationCode($cardInfo['operation']);
            $card->operation = $cardInfo['operation'];
            $card->result = $cardInfo['result'];
        }

        if(isset($cardInfo['power'])){
            $card->card_power_id = $cardInfo['power'];
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