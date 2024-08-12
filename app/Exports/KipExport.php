<?php

namespace App\Exports;
use App\Kip;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KipExport implements FromQuery, WithHeadings, WithMapping
{
    protected $list_id = [];
    function __construct($list_id=[]) {
        $this->list_id = $list_id;
    }

    public function query()
    {
        $data = Kip::query();
        if(count($this->list_id)>0) $data = $data->whereIn('id',$this->list_id);
        return $data;
    }

    public function headings(): array
    {
        return [
            'peserta_didik_id',
            'sekolah_id',
            'npsn',
            'nomenklatur',
            'rombel_id',
            'nama_pd',
            'nama_ibu',
            'nama_ayah'         ,
            'tanggal_lahir',
            'tempat_lahir' ,
            'nisn',
            'jenis_kelamin',
            'nominal',
            'no_rekening',
            'tahap_id',
            'nomor_sk',
            'tanggal_sk',
            'nama_rekening',
            'tanggal_cair',
            'status_cair',
            'no_kip',
            'no_kks',
            'no_kps',
            'virtual_acc',
            'nama_kartu',
            'semester_id',
            'layak_pip',
            'keterangan_pencairan',
            'confirmation_text',
            'tahap_keterangan',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function map($kip): array
    {
        return [
            $kip->peserta_didik_id,
            $kip->sekolah_id,
            $kip->npsn,
            $kip->nomenklatur,
            $kip->rombel_id,
            $kip->nama_pd,
            $kip->nama_ibu,
            $kip->nama_ayah        ,
            $kip->tanggal_lahir,
            $kip->tempat_lahir,
            $kip->nisn,
            $kip->jenis_kelamin,
            $kip->nominal,
            $kip->no_rekening,
            $kip->tahap_id,
            $kip->nomor_sk,
            $kip->tanggal_sk,
            $kip->nama_rekening,
            $kip->tanggal_cair,
            $kip->status_cair,
            $kip->no_kip,
            $kip->no_kks,
            $kip->no_kps,
            $kip->virtual_acc,
            $kip->nama_kartu,
            $kip->semester_id,
            $kip->layak_pip,
            $kip->keterangan_pencairan,
            $kip->confirmation_text,
            $kip->tahap_keterangan,
        ];
    }
}

