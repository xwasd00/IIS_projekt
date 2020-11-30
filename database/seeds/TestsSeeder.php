<?php

use Illuminate\Database\Seeder;

class TestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*********          test-future              *******************/
        DB::table('tests')->insert([
            'name' => 'test-future',
            'creator_id' => 2,
            'configuration' => '',
            'start' => date_create(date("Y-m-d H:i:s", mktime(12, 0, 0, 6, 12, 2021))),
            'end' => date_create(date("Y-m-d H:i:s", mktime(13, 0, 0, 6, 12, 2021))),
        ]);

        DB::table('questions')->insert([
            'test_id' => 1,
            'name' => 'otazka 1',
            'task' => 'bla bla bla',
            'scoreMax' => 5,
        ]);

        DB::table('questions')->insert([
            'test_id' => 1,
            'name' => 'otazka 2',
            'task' => 'bla bla bla bla',
            'scoreMax' => 4,
        ]);

        DB::table('answers')->insert([
            'question_id' => 2,
            'answer' => 'true',
        ]);

        DB::table('answers')->insert([
            'question_id' => 2,
            'answer' => 'false',
        ]);

        /**************       test-present ***************************/
        DB::table('tests')->insert([
            'name' => 'test-present',
            'creator_id' => 1,
            'configuration' => '',
            'start' => date_create(date("Y-m-d H:i:s", mktime(12, 0, 0, 11, 29, 2020))),
            'end' => date_create(date("Y-m-d H:i:s", mktime(12, 0, 0, 01, 29, 2021))),
        ]);

        DB::table('questions')->insert([
            'test_id' => 2,
            'name' => 'otazka 1',
            'task' => 'bla bla bla',
            'scoreMax' => 5,
        ]);

        DB::table('questions')->insert([
            'test_id' => 2,
            'name' => 'otazka 2',
            'task' => 'bla bla bla bla',
            'scoreMax' => 4,
        ]);

        DB::table('questions')->insert([
            'test_id' => 2,
            'name' => 'otazka 3',
            'task' => 'bla bla bla bla bla',
            'scoreMax' => 6,
        ]);

        /********************  test-past       ************************************/

        DB::table('tests')->insert([
            'name' => 'test-past',
            'creator_id' => 1,
            'configuration' => '',
            'start' => date_create(date("Y-m-d H:i:s", mktime(12, 0, 0, 11, 29, 2020))),
            'end' => date_create(date("Y-m-d H:i:s", mktime(20, 0, 0, 11, 29, 2020))),
        ]);

        DB::table('questions')->insert([
            'test_id' => 3,
            'name' => 'otazka 1',
            'task' => 'bla bla bla',
            'scoreMax' => 5,
        ]);

        DB::table('questions')->insert([
            'test_id' => 3,
            'name' => 'otazka 2',
            'task' => 'bla bla bla bla',
            'scoreMax' => 4,
        ]);

        DB::table('questions')->insert([
            'test_id' => 3,
            'name' => 'otazka 3',
            'task' => 'bla bla bla bla bla',
            'scoreMax' => 6,
        ]);


    }
}
