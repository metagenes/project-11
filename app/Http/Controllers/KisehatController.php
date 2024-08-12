<?php

namespace App\Http\Controllers;

use App\Kisehat;
use App\Http\Requests\KisehatRequest;
use App\Dusun;
use App\RTS;
use App\RWS;
use App\StatusHubunganDalamKeluarga;
use App\Exports\KisehatExport;
use App\Imports\KisehatImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
class KisehatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\Kisehat
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kisehat = Kisehat::latest()->paginate(10);
        $totalKisehat = Kisehat::all();

        if ($request->cari) {
            if ($request->cari == "Laki-laki") {
                $kisehat = Kisehat::where('jenis_kelamin',1)->latest()->paginate(10);
            } elseif ($request->cari == "Perempuan") {
                $kisehat = Kisehat::where('jenis_kelamin',2)->latest()->paginate(10);
            } else {
                $kisehat = Kisehat::where(function ($kisehat) use ($request) {
                    $kisehat->where('id_dtks', 'like', "%$request->cari%");
                    $kisehat->orWhere('alamat', 'like', "%$request->cari%");
                    $kisehat->orWhere('kk', 'like', "%$request->cari%");
                    $kisehat->orwhere('nik', 'like', "%$request->cari%");
                    $kisehat->orWhere('nama', 'like', "%$request->cari%");
                    $kisehat->orWhere('tanggal_lahir', 'like', "%$request->cari%");
                    $kisehat->orWhere('tempat_lahir', 'like', "%$request->cari%");
                    $kisehat->orWhere('nama_ibu', 'like', "%$request->cari%");
                    $kisehat->orWhere('status', 'like', "%$request->cari%");
                    
                })->latest()->paginate(10);
            }
        }
        $kisehat->appends(request()->input())->links();
        return view('kisehat.index', compact('kisehat','totalKisehat'));
    }

    public function kisehatexport()
    {
        return Excel::Download(new KisehatExport, 'KIS.xlsx');
    }

    public function kisehatimport(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move("DataKIS", $namaFile);

        Excel::import(new KisehatImport, public_path('/DataKIS/'.$namaFile));
        return redirect('kisehat');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kisehat.create', [
            'dusun'                         => Dusun::all(),
            'rts'                            => RTS::all(),
            'rws'                            => RWS::all(),
            'status_hubungan_dalam_keluarga'=> StatusHubunganDalamKeluarga::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KisehatRequest $request)
    {
        
        $data = $request->validated();
        Kisehat::create($data);
        return redirect()->route('kisehat.index')->with('success','Kisehat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kisehat  $kisehat
     * @return \Illuminate\Http\Response
     */
    public function show(Kisehat $kisehat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kisehat  $kisehat
     * @return \Illuminate\Http\Response
     */
    public function edit(Kisehat $kisehat)
    {
        return view('kisehat.edit', [
            'dusun'                         => Dusun::all(),
            'rts'                           => RTS::all(),
            'rws'                           => RWS::all(),
            'status_hubungan_dalam_keluarga'=> StatusHubunganDalamKeluarga::all(),
            'kisehat'                       => $kisehat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kisehat  $kisehat
     * @return \Illuminate\Http\Response
     */
    public function update(KisehatRequest $request, Kisehat $kisehat)
    {
        $data = $request->validated();
        $kisehat->update($data);
        return redirect()->back()->with('success', 'Kisehat berhasil diperbaharui');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kisehat  $kisehat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kisehat $kisehat)
    {
        $kisehat->delete();
        return redirect()->back()->with('success', 'Kisehat berhasil diperbarui');     
    }
    

}

