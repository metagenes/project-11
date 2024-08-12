<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kisehat extends Model
{
    protected $table = "kisehat";
    protected $guarded =  [];
    
    
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
