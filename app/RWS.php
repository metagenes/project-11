<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RWS extends Model
{
    protected $table = "rws";
    protected $guarded = [];

    public function bpnt()
    {
        return $this->hasMany('App\Bpnt');
    }

    public function kisehat()
    {
        return $this->hasMany('App\Kisehat');
    }

    public function pkh()
    {
        return $this->hasMany('App\Pkh');
    }

    public function bpjsMandiri()
    {
        return $this->hasMany('App\BpjsMandiri');
    }

    public function dtksd()
    {
        return $this->hasMany('App\DTKSd');
    }
}
