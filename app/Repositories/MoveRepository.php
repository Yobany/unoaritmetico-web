<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/05/2017
 * Time: 12:29 AM
 */

namespace App\Repositories;


use App\Card;
use App\Game;
use App\Move;
use Bosnadev\Repositories\Eloquent\Repository;
use Illuminate\Container\Container as App;

class MoveRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Move::class;
    }

    public function saveRawWithGameAndCards($moveData, Game $game, Card $cardPlayed, Card $cardOnDeck)
    {
        $move = new Move();
        $move->turn = $moveData['turn'];
        $move->duration = $moveData['duration'];
        $move->student_id = isset($moveData['student']) ? $moveData['student'] : null;
        $move->by_color = $moveData['matchByColor'];
        $move->cardPlayed()->associate($cardPlayed);
        $move->cardOnDeck()->associate($cardOnDeck);
        $move->game()->associate($game);
        $move->save();
        return $move;
    }
}