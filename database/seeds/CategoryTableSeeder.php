<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
        	['name' => 'Eten'],
        	['name' => 'Festival'],
        	['name' => 'Gamen'],
        	['name' => 'Muziek'],
        	['name' => 'Sport'],
        	['name' => 'Toernooi'],
        	['name' => 'Workshop']
        ]);
    }
}
