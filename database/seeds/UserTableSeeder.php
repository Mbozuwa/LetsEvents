<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *Puts already made data in the db
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Alex','email' => 'alexkalis@live.nl', 'password' =>  Hash::make('12345678'), 'address' => 'Standerdmolen 26', 'telephone' => '061-2345-678', 'role_id' => '1'],
            ['name' => 'Jasper','email' => 'jasper@live.nl', 'password' => Hash::make('12345678'), 'address' => 'snoepstraat 26', 'telephone' => '061-2345-678', 'role_id' => '1'],
            ['name' => 'Michael','email' => 'Michael@live.nl', 'password' =>  Hash::make('12345678'), 'address' => 'teststraat 26', 'telephone' => '061-2345-678', 'role_id' => '1'],
            ['name' => 'Raymond','email' => 'raymond@live.nl', 'password' =>  Hash::make('12345678'), 'address' => 'bundatown 26', 'telephone' => '061-2345-678', 'role_id' => '1'],
            ['name' => 'Laurens','email' => 'laurens@live.nl', 'password' =>  Hash::make('12345678'), 'address' => 'telaatstraat 26', 'telephone' => '061-2345-678', 'role_id' => '1'],
            ['name' => 'Admin','email' => 'admin@live.nl', 'password' =>  Hash::make('12345678'), 'address' => 'Adminstraat 26', 'telephone' => '061-2345-678', 'role_id' => '2'],
        ]);
    }
}
