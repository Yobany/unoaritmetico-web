<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 02/02/2017
 * Time: 04:08 PM
 */

namespace App\Repositories;


use App\Game;
use Bosnadev\Repositories\Eloquent\Repository;

class StudentRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Student';
    }

    public function gamesWinned($studentId)
    {
        return Game::where('student_winner_id', $studentId)->get();
    }
}