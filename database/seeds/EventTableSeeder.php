<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event')->insert([
            ['name' => 'Raymonds secret bunda bunda feestje', 'description' => 'Pretty self explanatory|Alleen vrouwen|All of the secrets', 'place' => 'bunda town', 'address' => 'bunda town', 'max_participant' => 60, 'participant_amount' => 0, 'begin_time' => '2018-11-05 23:00', 'end_time' => '2018-11-06 23:00', 'user_id' => 5, 'signup_time' => '2018-11-05 23:00' ],
            ['name' => 'Hockey toernooi HCB', 'description' => '16 teams die in een tournooi spelen', 'place' => 'Barendrecht', 'address' => '101, AZ, Zuider Carnisseweg', 'max_participant' => 50, 'participant_amount' => 0, 'begin_time' => '2018-12-05 23:00', 'end_time' =>'2018-12-06 23:00', 'user_id' => 2, 'signup_time' => '2018-12-05 23:00'],
            ['name' => 'Volleybal toernooi', 'description' => '10 teams die in een tournooi spelen', 'place' => 'Barendrecht', 'address' => 'Hertenburg 32', 'max_participant' => 40, 'participant_amount' => 0, 'begin_time' => '2018-12-07 13:00', 'end_time' => '2018-12-08 13:00', 'user_id' => 7, 'signup_time' => '2018-12-07 13:00'],
        ]);
    }
}
