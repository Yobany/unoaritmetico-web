<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{

    protected $fillable = ['operation_id', 'operation', 'result', 'color_id', 'card_power_id'];

    public $timestamps = false;

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
