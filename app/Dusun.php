<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    protected $table = "dusun";
    protected $guarded = [];

    public function detailDusun()
    {
        return $this->hasMany('App\DetailDusun');
    }

    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }

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
