<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = true;

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function moves()
    {
        return $this->belongsToMany(Move::class);
    }
}
