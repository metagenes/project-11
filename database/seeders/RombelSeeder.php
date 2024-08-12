<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Rombel;
class RombelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rombel::create(['nama' => 'Kelas 1',]);
        Rombel::create(['nama' => 'Kelas 2',]);
        Rombel::create(['nama' => 'Kelas 3',]);
        Rombel::create(['nama' => 'Kelas 4',]);
        Rombel::create(['nama' => 'Kelas 5',]);
        Rombel::create(['nama' => 'Kelas 6',]);
        Rombel::create(['nama' => 'Kelas 7',]);
        Rombel::create(['nama' => 'Kelas 8',]);
        Rombel::create(['nama' => 'Kelas 9',]);
        Rombel::create(['nama' => 'Kelas 10',]);
        Rombel::create(['nama' => 'Kelas 11',]);
        Rombel::create(['nama' => 'Kelas 12',]);
        Rombel::create(['nama' => 'Kuliah']);
    }
}
