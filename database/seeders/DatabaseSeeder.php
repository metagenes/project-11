<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(DesaSeeder::class);
        $this->call(PekerjaanSeeder::class);
        $this->call(StatusHubunganDalamKeluargaSeeder::class);
        $this->call(RombelSeeder::class);
        $this->call(DusunSeeder::class);
        $this->call(RTSSeeder::class);
        $this->call(RWSSeeder::class);
        $this->call(BulanSeeder::class);
    }
}
