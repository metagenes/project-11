<?php
namespace Database\Seeders;
use App\RWS;
use Illuminate\Database\Seeder;

class RWSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RWS::create(['nomor' => '1']);
        RWS::create(['nomor' => '2']);
        RWS::create(['nomor' => '-']); //3
    }
}
