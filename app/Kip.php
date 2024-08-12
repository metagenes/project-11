<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kip extends Model
{
    protected $table = "kip";
    protected $guarded =  [];
    
    
    public function rombel()
    {
        return $this->belongsTo('App\Rombel');
    }
}
