<?php

namespace App\Imports;

use App\BpjsMandiri;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BpjsMandiriImport implements ToModel, WithHeadingRow
{
     /**
    * @param array @row
    */
    public function model(array $row)
    {
        return new BpjsMandiri([
            'id_dtks'                               =>$row['id_dtks'      ],
            'alamat'                                =>$row['alamat'       ],
            'dusun_id'                              =>$row['dusun_id'     ],
            'rts_id'                                =>$row['rts_id'       ],
            'rws_id'                                =>$row['rws_id'       ],
            'kk'                                    =>$row['kk'           ],
            'nik'                                   =>$row['nik'          ],
            'nama'                                  =>$row['nama'         ],
            'tanggal_lahir'                         =>$row['tanggal_lahir'],
            'tempat_lahir'                          =>$row['tempat_lahir' ],
            'jenis_kelamin'                         =>$row['jenis_kelamin'],
            'pekerjaan_id'                          =>$row['pekerjaan_id' ],
            'nama_ibu'                              =>$row['nama_ibu'     ],
            'status_hubungan_dalam_keluarga_id'     =>$row['status_hubungan_dalam_keluarga_id'],
            'keterangan_padan'                      =>$row['keterangan_padan'],
        ]);
    }
}
