<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BpjsMandiri extends Model
{
     protected $table = "bpjs_mandiri";
     protected $guarded = [];
     
     public function pekerjaan()
     {
        return $this->belongsTo('App\Pekerjaan');
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
