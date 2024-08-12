<?php
namespace Database\Seeders;
use App\Dusun;
use Illuminate\Database\Seeder;

class DusunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       Dusun::create(['nama' => '-']); //1
            Dusun::create(['nama' => 'ENTHAK']); //2
            Dusun::create(['nama' => 'KEMRANGGON']); //3
            Dusun::create(['nama' => 'KARANG KEMIRI']); //4
            Dusun::create(['nama' => 'GRUJUGAN']); //5
            
    }
}
