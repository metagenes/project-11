<?php

namespace App\Http\Controllers;

use App\Bpnt;
use App\Http\Requests\BpntRequest;
use App\Dusun;
use App\RTS;
use App\RWS;
use App\Pekerjaan;
use App\StatusHubunganDalamKeluarga;
use App\Exports\BpntExport;
use App\Imports\BpntImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
class BpntController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\Bpnt
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bpnt = Bpnt::latest()->paginate(10);
        $totalBpnt = Bpnt::all();
        $totalKK = Bpnt::select('kk')->distinct()->get();

        if ($request->cari) {
            if ($request->cari == "Laki-laki") {
                $bpnt = Bpnt::where('jenis_kelamin',1)->latest()->paginate(10);
            } elseif ($request->cari == "Perempuan") {
                $bpnt = Bpnt::where('jenis_kelamin',2)->latest()->paginate(10);
            } else {
                $bpnt = Bpnt::where(function ($bpnt) use ($request) {
                    $bpnt->where('id_dtks', 'like', "%$request->cari%");
                    $bpnt->orWhere('alamat', 'like', "%$request->cari%");
                    $bpnt->orWhere('kk', 'like', "%$request->cari%");
                    $bpnt->orwhere('nik', 'like', "%$request->cari%");
                    $bpnt->orWhere('nama', 'like', "%$request->cari%");
                    
                })->latest()->paginate(10);
            }
        }
        $bpnt->appends(request()->input())->links();
        return view('bpnt.index', compact('bpnt','totalBpnt', 'totalKK'));
    }

    public function bpntexport()
    {
        return Excel::Download(new BpntExport, 'BPNT.xlsx');
    }

    public function bpntimport(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move("DataBPNT", $namaFile);

        Excel::import(new BpntImport, public_path('/DataBPNT/'.$namaFile));
        return redirect('bpnt');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bpnt.create', [
            'dusun'                         => Dusun::all(),
            'rts'                            => RTS::all(),
            'rws'                            => RWS::all(),
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
    public function store(BpntRequest $request)
    {
        
        $data = $request->validated();
        Bpnt::create($data);
        return redirect()->route('bpnt.index')->with('success','Bpnt berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bpnt  $bpnt
     * @return \Illuminate\Http\Response
     */
    public function show(Bpnt $bpnt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bpnt  $bpnt
     * @return \Illuminate\Http\Response
     */
    public function edit(Bpnt $bpnt)
    {
        return view('bpnt.edit', [
            'dusun'                         => Dusun::all(),
            'rts'                            => RTS::all(),
            'rws'                            => RWS::all(),
            'pekerjaan'                     => Pekerjaan::all(),
            'status_hubungan_dalam_keluarga'=> StatusHubunganDalamKeluarga::all(),
            'bpnt'                          => $bpnt,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bpnt  $bpnt
     * @return \Illuminate\Http\Response
     */
    public function update(BpntRequest $request, Bpnt $bpnt)
    {
        $data = $request->validated();
        $bpnt->update($data);
        return redirect()->back()->with('success', 'Bpnt berhasil diperbaharui');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bpnt  $bpnt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bpnt $bpnt)
    {
        $bpnt->delete();
        return redirect()->back()->with('success', 'Bpnt berhasil diperbarui');     
    }
    

}

