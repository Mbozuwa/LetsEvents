<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *Puts already made data in the db
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            ['role' => 'user'],
            ['role' => 'admin']
        ]);
    }
}
