<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DTKSd extends Model
{
    protected $table = "dtksd";
    protected $fillable =   ['periode', 'id_dtks', 'kk', 'nik', 'nama', 
                            'jenis_kelamin', 'alamat', 'dusun_id', 'rts_id', 
                            'rws_id', 'nama_ibu', 'nama_ayah'];

    public function detailDusun()
    {
        return $this->belongsTo('App\DetailDusun');
    }
    
    public function dusun()
     {
         return $this->belongsTo('App\Dusun');
     }

     public function bulan()
     {
         return $this->belongsTo('App\Bulan');
     }

     public function rts()
     {
         return $this->belongsTo('App\RTS');
     }

     public function rws()
     {
         return $this->belongsTo('App\RWS');
     }
    
}
