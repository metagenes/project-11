<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $table = "rombel";
    protected $guarded = [];

    public function kip()
    {
        return $this->hasMany('App\Kip');
    }
}
