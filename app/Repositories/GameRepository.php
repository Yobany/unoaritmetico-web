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
        return Game::class;
    }
}