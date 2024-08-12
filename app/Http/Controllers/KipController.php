<?php

namespace App\Http\Controllers;

use App\Kip;
use App\Http\Requests\KipRequest;
use Illuminate\Http\Request;
use App\Rombel;
use App\Exports\KipExport;
use App\Imports\KipImport;
use Maatwebsite\Excel\Facades\Excel;
class KipController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param \Illuminate\Http\Request
     *@return \Illuminate\Http\Response
     *@return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kip = Kip::latest()->paginate(10);
        $totalKip = Kip::all();

        if ($request->cari) {
            if ($request->cari == "Laki-laki") {
                $kip = Kip::where('jenis_kelamin',1)->latest()->paginate(10);
            } elseif ($request->cari == "Perempuan") {
                $kip = Kip::where('jenis_kelamin',2)->latest()->paginate(10);
            } else {
                $kip = Kip::where(function ($kip) use ($request) {
                    $kip->where('peserta_didik_id', 'like', "%$request->cari%");
                    $kip->orWhere('sekolah_id', 'like', "%$request->cari%");
                    $kip->orWhere('npsn', 'like', "%$request->cari%");
                    $kip->orWhere('nomenklatur', 'like', "%$request->cari%");
                    $kip->orWhere('rombel_id', 'like', "%$request->cari%");
                    $kip->orWhere('nama_pd', 'like', "%$request->cari%");
                    $kip->orWhere('nama_ibu', 'like', "%$request->cari%");
                    $kip->orWhere('nama_ayah', 'like', "%$request->cari%");
                    $kip->orWhere('tanggal_lahir', 'like', "%$request->cari%");
                    $kip->orWhere('tempat_lahir', 'like', "%$request->cari%");
                    $kip->orWhere('nisn', 'like', "%$request->cari%");
                    $kip->orWhere('nominal', 'like', "%$request->cari%");
                    $kip->orWhere('no_rekening', 'like', "%$request->cari%");
                    $kip->orWhere('tahap_id', 'like', "%$request->cari%");
                    $kip->orWhere('nomor_sk', 'like', "%$request->cari%");
                    $kip->orWhere('tanggal_sk', 'like', "%$request->cari%");
                    $kip->orWhere('status_cair', 'like', "%$request->cari%");
                    $kip->orWhere('no_kip', 'like', "%$request->cari%");
                    $kip->orWhere('no_kks', 'like', "%$request->cari%");
                    $kip->orWhere('no_kps', 'like', "%$request->cari%");
                    $kip->orWhere('virtual_acc', 'like', "%$request->cari%");
                    $kip->orWhere('nama_kartu', 'like', "%$request->cari%");
                    $kip->orWhere('semester_id', 'like', "%$request->cari%");
                    $kip->orWhere('layak_pip', 'like', "%$request->cari%");
       
                })->latest()->paginate(10);
            }
        }
        $kip->appends(request()->input())->links();
        return view('kip.index', compact('kip','totalKip'));
    }


    public function kipexport()
    {
        return Excel::Download(new KipExport, 'KIP.xlsx');
    }

    public function kipimport(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move("DataKIP", $namaFile);

        Excel::import(new KipImport, public_path('/DataKIP/'.$namaFile));
        return redirect('kip');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kip.create', [
            'rombel'            => Rombel::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KipRequest $request)
    {
        $data = $request->validated();
        kip::create($data);
        return Redirect()->route('kip.index')->with('success', 'Kip berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kip  $kip
     * @return \Illuminate\Http\Response
     */
    public function show(Kip $kip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kip  $kip
     * @return \Illuminate\Http\Response
     */
    public function edit(Kip $kip)
    {
        return view('kip.edit', [
            'rombel'                        => Rombel::all(),
            'kip'                           => $kip,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kip  $kip
     * @return \Illuminate\Http\Response
     */
    public function update(KipRequest $request, Kip $kip)
    {
        $data = $request->validated();
        $kip->update($data);
        return redirect()->back()->with('success', 'Kip berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kip  $kip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kip $kip)
    {
        $kip->delete();
        return redirect()->back()->with('success', 'Kip berhasil diperbaharui');
    }
}
