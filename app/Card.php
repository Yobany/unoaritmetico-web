<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function type()
    {
        return $this->belongsTo(CardType::class);
    }

    public function power()
    {
        return $this->belongsTo(CardPower::class);
    }

    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
