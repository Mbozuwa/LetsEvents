<?php

use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            ['name' => 'DaVinci','place' => 'Dordrecht','address' => 'Romboutslaan 34'],
            ['name' => 'Avains','place' => 'Breda','address' => 'Reigerstraat 7'],
            ['name' => 'Hogeschool Rotterdam','place' => 'Rotterdam','address' => 'Zalmhaven 1'],
            ['name' => 'Insula College','place' => 'Dordrecht','address' => 'Romboutslaan 30'],
            ['name' => 'Drechtsteden College','place' => 'Dordrecht','address' => 'Romboutslaan 27'],
            ['name' => 'Dalton College','place' => 'Dordrecht','address' => 'Oudedijk 18']
        ]);
    }
}
