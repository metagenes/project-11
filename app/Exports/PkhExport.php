<?php

namespace App\Exports;
use App\Pkh;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PkhExport implements FromQuery, WithHeadings, WithMapping
{
    protected $list_id = [];
    function __construct($list_id=[]) {
        $this->list_id = $list_id;
    }

    public function query()
    {
        $data = Pkh::query();
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
    public function map($pkh): array
    {
        return [
            $pkh->id_dtks,      
            $pkh->alamat,       
            $pkh->dusun_id,     
            $pkh->rts_id,       
            $pkh->rws_id,       
            $pkh->kk,           
            $pkh->nik,          
            $pkh->nama,         
            $pkh->tanggal_lahir,
            $pkh->tempat_lahir, 
            $pkh->jenis_kelamin,
            $pkh->pekerjaan_id, 
            $pkh->nama_ibu,     
            $pkh->status_hubungan_dalam_keluarga_id,
            $pkh->keterangan_padan,
        ];
    }
}

