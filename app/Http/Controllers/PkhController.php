<?php

namespace App\Http\Controllers;

use App\Pkh;
use App\Http\Requests\PkhRequest;
use App\Dusun;
use App\RTS;
use App\RWS;
use App\Pekerjaan;
use App\StatusHubunganDalamKeluarga;
use App\Exports\PkhExport;
use App\Imports\PkhImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class PkhController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Requests request
     * @param \App\Pkh
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pkh = Pkh::latest()->paginate(10);
        $totalPkh = Pkh::all();

        $totalKK = Pkh::select('kk')->distinct()->get();

        if ($request->cari) {
            if ($request->cari == "Laki-laki") {
                $pkh = Pkh::where('jenis_kelamin',1)->latest()->paginate(10);
            } elseif ($request->cari == "Perempuan") {
                $pkh = Pkh::where('jenis_kelamin',2)->latest()->paginate(10);
            } else {
                $pkh = Pkh::where(function ($pkh) use ($request) {
                    $pkh->where('id_dtks', 'like', "%$request->cari%");
                    $pkh->orWhere('alamat', 'like', "%$request->cari%");
                    $pkh->orWhere('kk', 'like', "%$request->cari%");
                    $pkh->orwhere('nik', 'like', "%$request->cari%");
                    $pkh->orWhere('nama', 'like', "%$request->cari%");
                    $pkh->orWhere('tanggal_lahir', 'like', "%$request->cari%");
                    $pkh->orWhere('tempat_lahir', 'like', "%$request->cari%");
                    $pkh->orWhere('nama_ibu', 'like', "%$request->cari%");
                    
                })->latest()->paginate(10);
            }
        }
        $pkh->appends(request()->input())->links();
        return view('pkh.index', compact('pkh','totalPkh', 'totalKK'));
    }

    public function pkhexport()
    {
        return Excel::Download(new PkhExport, 'PKH.xlsx');
    }

    public function pkhimport(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move("DataPKH", $namaFile);

        Excel::import(new PkhImport, public_path('/DataPKH/'.$namaFile));
        return redirect('pkh');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pkh.create', [
            'dusun'                         => Dusun::all(),
            'rts'                           => RTS::all(),
            'rws'                           => RWS::all(),
            'pekerjaan'                     => Pekerjaan::all(),
            'status_hubungan_dalam_keluarga'=> StatusHubunganDalamKeluarga::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PkhRequest $request)
    {
        $data = $request->validated();
        Pkh::create($data);
        return redirect()->route('pkh.index')->with('success','Pkh berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pkh  $pkh
     * @return \Illuminate\Http\Response
     */
    public function show(Pkh $pkh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pkh  $pkh
     * @return \Illuminate\Http\Response
     */
    public function edit(Pkh $pkh)
    {
        return view('pkh.edit', [
            'dusun'                         => Dusun::all(),
            'rts'                           => RTS::all(),
            'rws'                           => RWS::all(),
            'pekerjaan'                     => Pekerjaan::all(),
            'status_hubungan_dalam_keluarga'=> StatusHubunganDalamKeluarga::all(),
            'pkh'                          => $pkh,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pkh  $pkh
     * @return \Illuminate\Http\Response
     */
    
    public function update(PkhRequest $request, Pkh $pkh)
    {
        $data = $request->validated();
        $pkh->update($data);
        return redirect()->back()->with('success', 'Pkh berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pkh  $pkh
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pkh $pkh)
    {
        $pkh->delete();
        return redirect()->back()->with('success', 'Pkh berhasil diperbarui');
    }
}
