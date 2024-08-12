<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusHubunganDalamKeluarga extends Model
{
    protected $table = "status_hubungan_dalam_keluarga";
    protected $guarded = [];

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

}
