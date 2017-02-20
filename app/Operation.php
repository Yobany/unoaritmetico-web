<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = ['name', 'symbol', 'description'];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
