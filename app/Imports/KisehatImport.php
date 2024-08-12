<?php

namespace App\Imports;

use App\Kisehat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KisehatImport implements ToModel, WithHeadingRow
{
     /**
    * @param array @row
    */
    public function model(array $row)
    {
        return new Kisehat([
            'id_dtks'                           =>$row['id_dtks'],
            'alamat'                            =>$row['alamat'],
            'noka_bpjs'                         =>$row['noka_bpjs'],
            'psnoka_bpjs'                       =>$row['psnoka_bpjs'],
            'kk'                                =>$row['kk'],
            'nik'                               =>$row['nik'],
            'nama'                              =>$row['nama'],
            'jenis_kelamin'                     =>$row['jenis_kelamin'],
            'tempat_lahir'                      =>$row['tempat_lahir'],
            'tanggal_lahir'                     =>$row['tanggal_lahir'],
            'status_hubungan_dalam_keluarga_id' =>$row['status_hubungan_dalam_keluarga_id'],
            'dusun_id'                          =>$row['dusun_id'],
            'rts_id'                            =>$row['rts_id'],
            'rws_id'                            =>$row['rws_id'],
            'nama_ibu'                          =>$row['nama_ibu'],
            'status'                            =>$row['status'],
        ]);
    }
}
