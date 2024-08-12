<?php

namespace App\Exports;
use App\Bpnt;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BpntExport implements FromQuery, WithHeadings, WithMapping
{
    protected $list_id = [];
    function __construct($list_id=[]) {
        $this->list_id = $list_id;
    }

    public function query()
    {
        $data = Bpnt::query();
        if(count($this->list_id)>0) $data = $data->whereIn('id',$this->list_id);
        return $data;
    }

    public function headings(): array
    {
        return [
            'id_dtks'      ,
            'alamat'       ,
            'dusun_id'     ,
            'rts_id'       ,
            'rws_id'       ,
            'kk'           ,
            'nik'          ,
            'nama'         ,
            'tanggal_lahir',
            'tempat_lahir' ,
            'jenis_kelamin',
            'pekerjaan_id' ,
            'nama_ibu'     ,
            'status_hubungan_dalam_keluarga_id',
            'keterangan_padan',
            'bansos_bpnt',
            'bansos_bpnt_ppkm',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function map($bpnt): array
    {
        return [
            $bpnt->id_dtks,
            $bpnt->alamat,
            $bpnt->dusun_id,
            $bpnt->rts_id,
            $bpnt->rws_id,
            $bpnt->kk,
            $bpnt->nik,
            $bpnt->nama,
            $bpnt->tanggal_lahir,
            $bpnt->tempat_lahir,
            $bpnt->jenis_kelamin,
            $bpnt->pekerjaan_id,
            $bpnt->nama_ibu,
            $bpnt->status_hubungan_dalam_keluarga_id,
            $bpnt->keterangan_padan,
            $bpnt->bansos_bpnt,
            $bpnt->bansos_bpnt_ppkm,
        ];
    }
}

