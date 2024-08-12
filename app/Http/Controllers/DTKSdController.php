<?php

namespace App\Http\Controllers;

use App\DTKSd;
use App\Http\Requests\DTKSdRequest;
use App\Dusun;
use App\Exports\DtksdExport;
use App\Imports\DtksdImport;
use Maatwebsite\Excel\Facades\Excel;
use App\RTS;
use App\RWS;
use Illuminate\Http\Request;
class DTKSdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\DTKSd
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dtksd = DTKSd::latest()->paginate(10);
        $totalDtksd = DTKSd::select('nik')->distinct()->get();
        $totalKK = DTKSd::select('kk')->distinct()->get();

        $data['q'] = $request->query('q');
        $data['start'] = $request->query('start');
        $data['end'] = $request->query('end');
        $query = DTKSd::select('dtksd.*')
            ->where(function ($query) use ($data) {
                $query->Where('nama', 'like', '%' . $data['q'] . '%');
                $query->orWhere('id_dtks', 'like', '%' . $data['q'] . '%');
                $query->orWhere('nik', 'like', '%' . $data['q'] . '%');
            });
        
        if ($data['start'])
            $query->whereDate('periode', '>=', $data['start']);
        if ($data['end'])
            $query->whereDate('periode', '<=', $data['end']);

        $data['dtksd'] = $query->latest()->paginate(15)->withQueryString();
        return view('dtksd.index', $data, compact('dtksd','totalDtksd', 'totalKK'));
    }

    public function dtksdexport()
    {
        return Excel::Download(new DtksdExport, 'DTKS.xlsx');
    }

    public function dtksdimport(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move("DataDTKS", $namaFile);

        Excel::import(new DtksdImport, public_path('/DataDTKS/'.$namaFile));
        return redirect('dtksd');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dtksd.create', [
            'dusun'                          => Dusun::all(),
            'rts'                            => RTS::all(),
            'rws'                            => RWS::all(),
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'periode'           => ['required','date'],
            'id_dtks'           => ['required'],
            'kk'                => ['required','digits:16'],
            'nik'               => ['required','digits:16'],
            'nama'              => ['required','string','max:64'],
            'jenis_kelamin'     => ['required','numeric'],
            'alamat'            => ['nullable','string','max:191'],
            'dusun_id'          => ['nullable','numeric'],
            'rts_id'            => ['nullable','numeric'],
            'rws_id'            => ['nullable','numeric'],
            'nama_ibu'          => ['nullable','string','max:64'],
            'nama_ayah'         => ['nullable','string','max:64'],
        ]);

        DTKSd::create($data);
        return redirect()->route('dtksd.index')->with('success','DTKS berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DTKSd  $dtksd
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DTKSd  $dtksd
     * @return \Illuminate\Http\Response
     */
    public function edit(DTKSd $dtksd)
    {
        return view('dtksd.edit', [
            'dusun'                         => Dusun::all(),
            'rts'                            => RTS::all(),
            'rws'                            => RWS::all(),
            'dtksd'                          => $dtksd,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DTKSd  $dtksd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DTKSd $dtksd)
    {
        $data = $request->validate([
            'periode'           => ['required','date'],
            'id_dtks'           => ['required'],
            'kk'                => ['required','digits:16'],
            'nik'               => ['required','digits:16'],
            'nama'              => ['required','string','max:64'],
            'jenis_kelamin'     => ['required','numeric'],
            'alamat'            => ['nullable','string','max:191'],
            'dusun_id'          => ['nullable','numeric'],
            'rts_id'            => ['nullable','numeric'],
            'rws_id'            => ['nullable','numeric'],
            'nama_ibu'          => ['nullable','string','max:64'],
            'nama_ayah'         => ['nullable','string','max:64'],
        ]);
        $dtksd->update($data);
        return redirect()->back()->with('success', 'DTKS berhasil diperbaharui');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DTKSd  $dtksd
     * @return \Illuminate\Http\Response
     */
    public function destroy(DTKSd $dtksd)
    {
        $dtksd->delete();
        return redirect()->back()->with('success', 'DTKS berhasil diperbarui');     
    }
    

}

