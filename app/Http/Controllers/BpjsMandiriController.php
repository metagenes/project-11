<?php

namespace App\Http\Controllers;

use App\BpjsMandiri;
use App\Http\Requests\BpjsMandiriRequest;
use Illuminate\Http\Request;
use App\Dusun;
use App\RTS;
use App\RWS;
use App\Pekerjaan;
use App\StatusHubunganDalamKeluarga;
use App\Exports\BpjsMandiriExport;
use App\Imports\BpjsMandiriImport;
use Maatwebsite\Excel\Facades\Excel;
class BpjsMandiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param \Illuminate\Http\Request
     *@param \App\BpjsMandiri
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bpjs_mandiri = BpjsMandiri::latest()->paginate(10);
        $totalBpjsMandiri = BpjsMandiri::all();

        if ($request->cari) {
            if ($request->cari == "Laki-laki") {
                $bpjs_mandiri = BpjsMandiri::where('jenis_kelamin',1)->latest()->paginate(10);
            } elseif ($request->cari == "Perempuan") {
                $bpjs_mandiri = BpjsMandiri::where('jenis_kelamin',2)->latest()->paginate(10);
            } else {
                $bpjs_mandiri = BpjsMandiri::where(function ($bpjs_mandiri) use ($request) {
                    $bpjs_mandiri->where('id_dtks', 'like', "%$request->cari%");
                    $bpjs_mandiri->orWhere('alamat', 'like', "%$request->cari%");
                    $bpjs_mandiri->orWhere('kk', 'like', "%$request->cari%");
                    $bpjs_mandiri->orwhere('nik', 'like', "%$request->cari%");
                    $bpjs_mandiri->orWhere('nama', 'like', "%$request->cari%");
                    
                })->latest()->paginate(10);
            }
        }
        $bpjs_mandiri->appends(request()->input())->links();
        return view('bpjs-mandiri.index', compact('bpjs_mandiri','totalBpjsMandiri'));
    }

    public function bpjsmandiriexport()
    {
        return Excel::Download(new BpjsMandiriExport, 'BpjsMandiri.xlsx');
    }

    public function bpjsmandiriimport(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move("DataBpjsMandiri", $namaFile);

        Excel::import(new BpjsMandiriImport, public_path('/DataBpjsMandiri/'.$namaFile));
        return redirect('BpjsMandiri');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bpjs-mandiri.create', [
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
    public function store(BpjsMandiriRequest $request)
    {
        $data = $request->validated();
        BpjsMandiri::create($data);
        return redirect()->route('bpjs-mandiri.index')->with('success','Bpjs Mandiri berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BpjsMandiri  $bpjs_mandiri
     * @return \Illuminate\Http\Response
     */
    public function show(BpjsMandiri $bpjs_mandiri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BpjsMandiri  $bpjs_mandiri
     * @return \Illuminate\Http\Response
     */
    public function edit(BpjsMandiri $bpjs_mandiri)
    {
        return view('bpjs-mandiri.edit', [
            'dusun'                         => Dusun::all(),
            'rts'                           => RTS::all(),
            'rws'                           => RWS::all(),
            'pekerjaan'                     => Pekerjaan::all(),
            'status_hubungan_dalam_keluarga'=> StatusHubunganDalamKeluarga::all(),
            'bpjs_mandiri'                   => $bpjs_mandiri,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BpjsMandiri  $bpjs_mandiri
     * @return \Illuminate\Http\Response
     */
    public function update(BpjsMandiriRequest $request, BpjsMandiri $bpjs_mandiri)
    {
        $data = $request->validated();
        $bpjs_mandiri->update($data);
        return redirect()->back()->with('success', 'Bpjs Mandiri berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BpjsMandiri  $bpjs_mandiri
     * @return \Illuminate\Http\Response
     */
    public function destroy(BpjsMandiri $bpjs_mandiri)
    {
        $bpjs_mandiri->delete();
        return redirect()->back()->with('success', 'Pkh berhasil diperbarui');
    }
}
