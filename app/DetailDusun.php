<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailDusun extends Model
{
    protected $table = "detail_dusun";
    protected $guarded = [];

    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }

    public function dusun()
    {
        return $this->belongsTo('App\Dusun');
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

    
}
