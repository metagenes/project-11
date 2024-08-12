<?php

namespace App\Imports;
use App\DTKSd;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DtksdImport implements ToModel, WithHeadingRow
{
    /**
    * @param array @row
    */
    public function model(array $row)
    {
        return new DTKSd([
            'periode'           =>$row['periode'],
            'id_dtks'           =>$row['id_dtks'],
            'kk'                =>$row['kk'],
            'nik'               =>$row['nik'],
            'nama'              =>$row['nama'],
            'jenis_kelamin'     =>$row['jenis_kelamin'],
            'alamat'            =>$row['alamat'],
            'dusun_id'          =>$row['dusun_id'],
            'rts_id'            =>$row['rts_id'],                                                                                                                                                               
            'rws_id'            =>$row['rws_id'],
            'nama_ibu'          =>$row['nama_ibu'],
            'nama_ayah'         =>$row['nama_ayah'],
        ]);
    }
}
