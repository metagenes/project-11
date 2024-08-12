<?php
namespace Database\Seeders;
use App\RTS;
use Illuminate\Database\Seeder;

class RTSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RTS::create(['nomor' => '1']);
        RTS::create(['nomor' => '2']);
        RTS::create(['nomor' => '3']);
        RTS::create(['nomor' => '4']);
        RTS::create(['nomor' => '5']);
        RTS::create(['nomor' => '6']);
        RTS::create(['nomor' => '7']);
        RTS::create(['nomor' => '8']);
        RTS::create(['nomor' => '9']);
        RTS::create(['nomor' => '-']); //10
    }
}
