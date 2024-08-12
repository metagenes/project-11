<?php

namespace App\Exports;
use App\BpjsMandiri;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BpjsMandiriExport implements FromQuery, WithHeadings, WithMapping
{
    protected $list_id = [];
    function __construct($list_id=[]) {
        $this->list_id = $list_id;
    }

    public function query()
    {
        $data = BpjsMandiri::query();
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
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function map($bpjs_mandiri): array
    {
        return [
            $bpjs_mandiri->id_dtks,
            $bpjs_mandiri->alamat,
            $bpjs_mandiri->dusun_id,
            $bpjs_mandiri->rts_id,
            $bpjs_mandiri->rws_id,
            $bpjs_mandiri->kk,
            $bpjs_mandiri->nik,
            $bpjs_mandiri->nama,
            $bpjs_mandiri->tanggal_lahir,
            $bpjs_mandiri->tempat_lahir,
            $bpjs_mandiri->jenis_kelamin,
            $bpjs_mandiri->pekerjaan_id,
            $bpjs_mandiri->nama_ibu,
            $bpjs_mandiri->status_hubungan_dalam_keluarga_id,
            $bpjs_mandiri->keterangan_padan,
        ];
    }
}
