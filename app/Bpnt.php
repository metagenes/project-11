<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bpnt extends Model
{
    protected $table = "bpnt";
    protected $guarded = [];
    
    public function pekerjaan()
    {
        return $this->belongsTo('App\Pekerjaan');
    }
    
    public function detailDusun()
    {
        return $this->belongsTo('App\DetailDusun');
    }
    
    public function dusun()
     {
         return $this->belongsTo('App\Dusun');
     }

     public function rts()
     {
         return $this->belongsTo('App\RTS');
     }

     public function rws()
     {
         return $this->belongsTo('App\RWS');
     }
    
    public function statusHubunganDalamKeluarga()
    {
        return $this->belongsTo('App\StatusHubunganDalamKeluarga');
    }
}
