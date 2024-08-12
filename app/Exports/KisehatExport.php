<?php

namespace App\Exports;
use App\Kisehat;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KisehatExport implements FromQuery, WithHeadings, WithMapping
{
    protected $list_id = [];
    function __construct($list_id=[]) {
        $this->list_id = $list_id;
    }

    public function query()
    {
        $data = Kisehat::query();
        if(count($this->list_id)>0) $data = $data->whereIn('id',$this->list_id);
        return $data;
    }

    public function headings(): array
    {
        return [
            'id_dtks'      ,
            'dusun_id'     ,
            'rts_id'       ,
            'rws_id'       ,
            'alamat'       ,
            'noka_bpjs'    ,
            'psnoka_bpjs'  ,
            'nama'         ,
            'tanggal_lahir',
            'tempat_lahir' ,
            'jenis_kelamin',
            'nik'          ,
            'kk'           ,
            'status_hubungan_dalam_keluarga_id',
            'nama_ibu'     ,
            'status',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function map($kisehat): array
    {
        return [
            $kisehat->id_dtks,      
            $kisehat->dusun_id,     
            $kisehat->rts_id,       
            $kisehat->rws_id,       
            $kisehat->alamat,       
            $kisehat->noka_bpjs,    
            $kisehat->psnoka_bpjs,  
            $kisehat->nama,         
            $kisehat->tanggal_lahir,
            $kisehat->tempat_lahir, 
            $kisehat->jenis_kelamin,
            $kisehat->nik,          
            $kisehat->kk,           
            $kisehat->status_hubungan_dalam_keluarga_id,
            $kisehat->nama_ibu,     
            $kisehat->status,
        ];
    }
}

