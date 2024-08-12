<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Bpnt;
use App\Kisehat;
use App\Kip;
use App\Pkh;
use App\BpjsMandiri;
use App\DTKSd;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $desa = Desa::find(1);


        return view('index', compact('desa'));
    }

    public function dashboard()
    {
        $totalBpnt = new Bpnt();
        $totalKisehat = new Kisehat();
        $totalKip = new Kip();
        $totalPkh = new Pkh();
        $totalBpjsMandiri = new BpjsMandiri();
        $totalDtksd = DTKSd::select('nik')->distinct()->get();

        return view('dashboard', compact('totalBpnt', 
                    'totalKisehat', 'totalKip', 'totalPkh', 'totalBpjsMandiri', 'totalDtksd'));
    }

}
     