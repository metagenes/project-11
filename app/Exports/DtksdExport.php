<?php

namespace App\Exports;
use App\DTKSd;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DtksdExport implements FromQuery, WithHeadings, WithMapping
{
    protected $list_id = [];
    function __construct($list_id=[]) {
        $this->list_id = $list_id;
    }

    public function query()
    {
        $data = DTKSd::query();
        if(count($this->list_id)>0) $data = $data->whereIn('id',$this->list_id);
        return $data;
    }

    public function headings(): array
    {
        return [
            'periode'      ,
            'id_dtks'      ,
            'kk'           ,
            'nik'          ,
            'nama'         ,
            'jenis_kelamin',
            'alamat'       ,
            'dusun_id'     ,
            'rts_id'       ,
            'rws_id'       ,
            'nama_ibu'     ,
            'nama_ayah'    ,
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function map($dtksd): array
    {
        return [
            $dtksd->periode      ,
            $dtksd->id_dtks      ,
            $dtksd->kk           ,
            $dtksd->nik          ,
            $dtksd->nama         ,
            $dtksd->jenis_kelamin,
            $dtksd->alamat       ,
            $dtksd->dusun_id     ,
            $dtksd->rts_id       ,
            $dtksd->rws_id       ,
            $dtksd->nama_ibu     ,
            $dtksd->nama_ayah    ,
        ];
    }
}
