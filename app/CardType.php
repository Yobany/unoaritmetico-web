<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardType extends Model
{
    protected $fillable = ['name', 'description'];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
