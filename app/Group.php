<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function games()
    {
        return $this->hasManyThrough(Game::class, Student::class);
    }

    public function getGames()
    {
        $students = $this->students;
        $totalGames = collect([]);
        foreach($students as $student){
            $games = $student->games;
            foreach ($games as $game){
                $totalGames->push($game);
            }
        }
        return $totalGames->unique('id')->values()->all();
    }
}