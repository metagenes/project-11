<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = "pekerjaan";
    protected $guarded = [];

    public function penduduk()
    {
        return $this->hasMany('App\Penduduk');
    }
    public function bpnt()
    {
        return $this->hasMany('App\Bpnt');
    }
    public function pkh()
    {
        return $this->hasMany('App\Pkh');
    }
    public function bpjsmandiri()
    {
        return $this->hasMany('App\BpjsMandiri');
    }
}

