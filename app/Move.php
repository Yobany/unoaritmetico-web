<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    protected $fillable = ['turn', 'duration', 'student_id', 'card_on_deck_id', 'card_played_id'];

    public $timestamps = false;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function cardOnDeck()
    {
        return $this->belongsTo(Card::class, 'card_on_deck_id');
    }

    public function cardPlayed()
    {
        return $this->belongsTo(Card::class, 'card_played_id');
    }

    public function game()
    {
        return $this->belongsTo(Student::class);
    }
}
