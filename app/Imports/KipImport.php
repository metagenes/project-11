<?php

namespace App\Imports;

use App\Kip;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KipImport implements ToModel, WithHeadingRow
{
    /**
    * @param array @row
    */
    public function model(array $row)
    {
        return new Kip([
            'peserta_didik_id'    =>$row['peserta_didik_id'],
            'sekolah_id'          =>$row['sekolah_id'],
            'npsn'                =>$row['npsn'],
            'nomenklatur'         =>$row['nomenklatur'],
            'rombel_id'           =>$row['rombel_id'],
            'nama_pd'             =>$row['nama_pd'],
            'nama_ibu'            =>$row['nama_ibu'],
            'nama_ayah'           =>$row['nama_ayah'],
            'tanggal_lahir'       =>$row['tanggal_lahir'],
            'tempat_lahir'        =>$row['tempat_lahir'],
            'nisn'                =>$row['nisn'],
            'jenis_kelamin'       =>$row['jenis_kelamin'],
            'nominal'             =>$row['nominal'],
            'no_rekening'         =>$row['no_rekening'],
            'tahap_id'            =>$row['tahap_id'],
            'nomor_sk'            =>$row['nomor_sk'],
            'tanggal_sk'          =>$row['tanggal_sk'],
            'nama_rekening'       =>$row['nama_rekening'],
            'tanggal_cair'        =>$row['tanggal_cair'],
            'status_cair'         =>$row['status_cair'],
            'no_kip'              =>$row['no_kip'],
            'no_kks'              =>$row['no_kks'],
            'no_kps'              =>$row['no_kps'],
            'virtual_acc'         =>$row['virtual_acc'],
            'nama_kartu'          =>$row['nama_kartu'],
            'semester_id'         =>$row['semester_id'],
            'layak_pip'           =>$row['layak_pip'],
            'keterangan_pencairan'=>$row['keterangan_pencairan'],
            'confirmation_text'   =>$row['confirmation_text'],
            'tahap_keterangan'    =>$row['tahap_keterangan'],
        ]);
    }
}
