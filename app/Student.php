<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'age', 'group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
