<?php
namespace Database\Seeders;
use App\Bulan;
use Illuminate\Database\Seeder;

class BulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bulan::create(['nama' => 'JANUARI']);
            Bulan::create(['nama' => 'FEBRUARI']);
            Bulan::create(['nama' => 'MARET']);
            Bulan::create(['nama' => 'APRIL']);
            Bulan::create(['nama' => 'MEI']);
            Bulan::create(['nama' => 'JUNI']);
            Bulan::create(['nama' => 'JULI']);
            Bulan::create(['nama' => 'AGUSTUS']);
            Bulan::create(['nama' => 'SEPTEMBER']);
            Bulan::create(['nama' => 'OKTOBER']);
            Bulan::create(['nama' => 'NOVEMBER']);
            Bulan::create(['nama' => 'DESEMBER']);

    }
}
