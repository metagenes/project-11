<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulan extends Model
{
    protected $table = "bulan";
    protected $guarded = [];

    public function dtksd()
    {
        return $this->hasMany('App\DTKSd');
    }
}
