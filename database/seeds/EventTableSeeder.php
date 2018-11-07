<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *Puts already made data in the db
     * @return void
     */
    public function run()
    {
        DB::table('event')->insert([
            ['name' => 'Raymonds secret bunda bunda feestje', 'description' => 'Pretty self explanatory|Alleen vrouwen|All of the secrets', 'place' => 'bunda town', 'address' => 'bunda town', 'max_participant' => 60, 'participant_amount' => 0, 'begin_time' => '2018-11-05 23:00', 'end_time' => '2018-11-06 23:00', 'user_id' => 5, 'signup_time' => '2018-11-05 23:00' ],
            ['name' => 'Hockey toernooi HCB', 'description' => '16 teams die in een tournooi spelen.', 'place' => 'Barendrecht', 'address' => '101, AZ, Zuider Carnisseweg', 'max_participant' => 50, 'participant_amount' => 0, 'begin_time' => '2018-12-05 23:00', 'end_time' =>'2018-12-06 23:00', 'user_id' => 2, 'signup_time' => '2018-12-05 23:00'],
            ['name' => 'Volleybal toernooi', 'description' => '10 teams die in een tournooi spelen.', 'place' => 'Barendrecht', 'address' => 'Hertenburg 32', 'max_participant' => 40, 'participant_amount' => 0, 'begin_time' => '2018-12-07 13:00', 'end_time' => '2018-12-08 13:00', 'user_id' => 4, 'signup_time' => '2018-12-07 13:00'],
            ['name' => 'Voetbal toernooi', 'description' => 'Een gezellig voetbal toernooi.', 'place' => 'Barendrecht', 'address' => 'Dierensteinweg 6', 'max_participant' => 200, 'participant_amount' => 0, 'begin_time' => '2019-1-11 17:00', 'end_time' => '2019-1-13 20:00', 'user_id' => 5, 'signup_time' => '2019-1-10 13:00'],
            ['name' => 'School sport dag', 'description' => 'Een sport dag voor Calvijn Groene Hart bij de Bongerd.', 'place' => 'Barendrecht', 'address' => 'Dierensteinweg 6', 'max_participant' => 400, 'participant_amount' => 0, 'begin_time' => '2019-1-11 09:00', 'end_time' => '2019-1-11 16:00', 'user_id' => 1, 'signup_time' => '2019-1-10 15:00'],
            ['name' => 'Buggy test weken', 'description' => 'Een periode van 2 weken waarin alle projectgroepen bugs gaan testen en gaan doorgeven aan het development team.', 'place' => 'Dordrecht', 'address' => 'Leerpark 11', 'max_participant' => 60, 'participant_amount' => 0, 'begin_time' => '2018-11-7 09:00', 'end_time' => '2018-11-14 16:00', 'user_id' => 6, 'signup_time' => '2018-11-6 15:00'],
            ['name' => 'Dans feestje', 'description' => 'Dans feest in Alcazar', 'place' => 'Puttershoek', 'address' => 'Groeneweg 16', 'max_participant' => 60, 'participant_amount' => 0, 'begin_time' => '2018-12-07 20:00', 'end_time' => '2018-12-08 03:00', 'user_id' => 5, 'signup_time' => '2018-12-05 23:00' ],
            ['name' => 'Marathon Rotterdam', 'description' => '42 km lang hardlopen.', 'place' => 'Rotterdam', 'address' => 'Coolsingel', 'max_participant' => 2000, 'participant_amount' => 0, 'begin_time' => '2019-4-07 06:00', 'end_time' =>'2019-4-07 23:00', 'user_id' => 2, 'signup_time' => '2018-12-05 23:00'],
            ['name' => 'Roparun Rotterdam-Parijs', 'description' => 'Van Rotterdam naar Parijs| 500 km lang hardlopen.|Team en sponsor vereist', 'place' => 'Rotterdam', 'address' => 'Coolsingel', 'max_participant' => 2000, 'participant_amount' => 0, 'begin_time' => '2019-6-08 06:00', 'end_time' =>'2019-6-10 23:00', 'user_id' => 4, 'signup_time' => '2018-12-05 23:00'],
            ['name' => 'Roparun Hamburg-Parijs', 'description' => 'Van Hamburg naar Parijs| 500 km lang hardlopen en fietsen|Afwisselen tussen fietsen en hardlopen|Team en sponsor vereist', 'place' => 'Hamburg', 'address' => 'Immenbusch', 'max_participant' => 2000, 'participant_amount' => 0, 'begin_time' => '2019-6-08 06:00', 'end_time' =>'2019-6-10 23:00', 'user_id' => 4, 'signup_time' => '2018-12-05 23:00'],
            ['name' => 'Marathon New York', 'description' => '42 km lang hardlopen.', 'place' => 'New York', 'address' => 'Wallstreet', 'max_participant' => 2000, 'participant_amount' => 0, 'begin_time' => '2019-4-07 06:00', 'end_time' =>'2019-4-07 23:00', 'user_id' => 2, 'signup_time' => '2018-12-05 23:00'],
            ['name' => 'Marathon Athene', 'description' => '42 km lang hardlopen.', 'place' => 'Athena', 'address' => 'GriekenLand', 'max_participant' => 2000, 'participant_amount' => 0, 'begin_time' => '2019-4-07 06:00', 'end_time' =>'2019-4-07 23:00', 'user_id' => 2, 'signup_time' => '2018-12-05 23:00'],
            ['name' => 'Marathon Honolulu', 'description' => '42 km lang hardlopen.', 'place' => 'Hawaii', 'address' => 'Honolulu', 'max_participant' => 2000, 'participant_amount' => 0, 'begin_time' => '2019-4-07 06:00', 'end_time' =>'2019-4-07 23:00', 'user_id' => 2, 'signup_time' => '2018-12-05 23:00'],
        ]);
    }
}
