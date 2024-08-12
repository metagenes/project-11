<?php

namespace App\Imports;
use App\Bpnt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BpntImport implements ToModel, WithHeadingRow
{
     /**
    * @param array @row
    */
    public function model(array $row)
    {
        return new Bpnt([
            'id_dtks'                           =>$row['id_dtks'],
            'alamat'                            =>$row['alamat'],
            'kk'                                =>$row['kk'],
            'nik'                               =>$row['nik'],
            'nama'                              =>$row['nama'],
            'jenis_kelamin'                     =>$row['jenis_kelamin'],
            'tempat_lahir'                      =>$row['tempat_lahir'],
            'tanggal_lahir'                     =>$row['tanggal_lahir'],
            'pekerjaan_id'                      =>$row['pekerjaan_id'],
            'dusun_id'                          =>$row['dusun_id'],
            'rts_id'                            =>$row['rts_id'],
            'rws_id'                            =>$row['rws_id'],
            'status_hubungan_dalam_keluarga_id' =>$row['status_hubungan_dalam_keluarga_id'],
            'nama_ibu'                          =>$row['nama_ibu'],
            'keterangan_padan'                  =>$row['keterangan_padan'],
            'bansos_bpnt'                       =>$row['bansos_bpnt'],
            'bansos_bpnt_ppkm'                  =>$row['bansos_bpnt_ppkm'],                                                     
        ]);
    }
}
