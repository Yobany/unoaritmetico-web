<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/05/2017
 * Time: 12:23 AM
 */

namespace App\Services;

use App\Game;
use App\Repositories\CardRepository;
use App\Repositories\Criterias\GroupOwnershipCriteria;
use App\Repositories\Criterias\SortCriteria;
use App\Repositories\Criterias\UserOwnershipThroughGroupCriteria;
use App\Repositories\GameRepository;
use App\Repositories\MoveRepository;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameService
{
    private $games;
    private $moves;
    private $cards;

    function __construct(GameRepository $gameRepository, MoveRepository $moveRepository, CardRepository $cardRepository)
    {
        $this->games = $gameRepository;
        $this->moves = $moveRepository;
        $this->cards = $cardRepository;
    }

    public function get(Request $request)
    {
        $this->games->pushCriteria(new UserOwnershipThroughGroupCriteria($request->user()->id));

        $this->games->pushCriteria(new SortCriteria('id'));

        if($request->has('group')){
            $this->games->pushCriteria(new GroupOwnershipCriteria($request->get('group')));
        }
        if($request->has('size')){
            return $this->games->paginate($request->get('size'));
        }
        if($request->has('page')){
            return $this->games->paginate();
        }
        return $this->games->all();
    }

    /**
     * @param Request $request
     * @return Game
     */
    public function save(Request $request)
    {
        DB::beginTransaction();
        $game = new Game([
            'played_at' => Carbon::parse($request->get('playedAt')),
            'name' => $request->get('name'),
            'group_id' => $request->get('group'),
            'student_winner_id' => $request->has('winner') ? $request->get('winner') : null,
            'duration' => 0
        ]);
        $game->save();
        $students = [];
        $duration = 0;
        foreach ($request->get('moves') as $current){
            $cardPlayed = $this->cards->saveRaw($current['cardPlayed']);
            $cardOnDeck = $this->cards->saveRaw($current['cardOnDeck']);
            $this->moves->saveRawWithGameAndCards($current, $game, $cardPlayed, $cardOnDeck);
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
        return $game;
    }

    /**
     * @param Game $game
     * @return mixed
     */
    public function export(Game $game)
    {
        $pdf = PDF::loadView('report.game', ['game' => $game]);
        return $pdf->download('Game_' . $game->id . '.pdf');
    }
}