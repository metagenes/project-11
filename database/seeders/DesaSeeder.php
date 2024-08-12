<?php
namespace Database\Seeders;
use App\Desa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desa::create([
            'nama_desa'         => 'Grujugan',
            'nama_kecamatan'    => 'Petanahan',
            'nama_kabupaten'    => 'Kebumen',
            'alamat'            => 'Jl. Dewi Renges No. 01 Petanahan Kebumen 54382',
            'nama_kepala_desa'  => "Sumaji",
            'alamat_kepala_desa'=> "Dusun Enthak Desa Grujugan  Kec.  Petanahan Kab. Kebumen",
            'logo'              => "logo.png",
        ]);
    }
}
