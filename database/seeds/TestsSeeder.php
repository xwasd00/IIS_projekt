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
            'configuration' => 1,
            'start' => date_create(date("Y-m-d H:i:s", mktime(12, 0, 0, 6, 12, 2021))),
            'end' => date_create(date("Y-m-d H:i:s", mktime(13, 0, 0, 6, 12, 2021))),
        ]);

        DB::table('questions')->insert([
            'test_id' => 1,
            'name' => 'otazka 1',
            'task' => 'task 1',
            'scoreMax' => 5,
        ]);

        DB::table('questions')->insert([
            'test_id' => 1,
            'name' => 'otazka 2',
            'task' => 'task 2',
            'scoreMax' => 4,
        ]);

        DB::table('answers')->insert([
            'question_id' => 1,
            'answer' => 'true',
            'true' => true,
        ]);

        DB::table('answers')->insert([
            'question_id' => 2,
            'answer' => 'false',
            'true' => true,
        ]);


        /**************       test-present ***************************/
        DB::table('tests')->insert([
            'name' => 'test-present',
            'creator_id' => 1,
            'configuration' => 2,
            'start' => date_create(date("Y-m-d H:i:s", mktime(12, 0, 0, 11, 29, 2020))),
            'end' => date_create(date("Y-m-d H:i:s", mktime(12, 0, 0, 01, 29, 2021))),
        ]);

        DB::table('questions')->insert([
            'test_id' => 2,
            'name' => 'otazka 1',
            'task' => 'task 1',
            'scoreMax' => 5,
        ]);

        DB::table('questions')->insert([
            'test_id' => 2,
            'name' => 'otazka 2',
            'task' => 'task 2',
            'scoreMax' => 4,
        ]);

        DB::table('questions')->insert([
            'test_id' => 2,
            'name' => 'otazka 3',
            'task' => 'task 3',
            'scoreMax' => 6,
        ]);

        DB::table('answers')->insert([
            'question_id' => 3,
            'answer' => 'true',
            'true' => true,
        ]);

        DB::table('answers')->insert([
            'question_id' => 4,
            'answer' => 'true',
            'true' => true,
        ]);

        DB::table('answers')->insert([
            'question_id' => 5,
            'answer' => 'true',
            'true' => true,
        ]);

        DB::table('answers')->insert([
            'question_id' => 3,
            'answer' => 'false',
        ]);

        DB::table('answers')->insert([
            'question_id' => 4,
            'answer' => 'false',
        ]);

        DB::table('answers')->insert([
            'question_id' => 5,
            'answer' => 'false',
        ]);

        /********************  test-past       ************************************/

        DB::table('tests')->insert([
            'name' => 'test-past',
            'creator_id' => 1,
            'configuration' => 3,
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

        DB::table('answers')->insert([
            'question_id' => 6,
            'answer' => 'true',
            'true' => true,
        ]);

        DB::table('answers')->insert([
            'question_id' => 7,
            'answer' => 'true',
            'true' => true,
        ]);

        DB::table('answers')->insert([
            'question_id' => 8,
            'answer' => 'true',
            'true' => true,
        ]);

        DB::table('answers')->insert([
            'question_id' => 6,
            'answer' => 'false',
        ]);

        DB::table('answers')->insert([
            'question_id' => 7,
            'answer' => 'true',
            'true' => true,
        ]);

        DB::table('answers')->insert([
            'question_id' => 8,
            'answer' => 'false',
        ]);

        DB::table('answers')->insert([
            'question_id' => 6,
            'answer' => 'false',
        ]);

        DB::table('answers')->insert([
            'question_id' => 7,
            'answer' => 'false',
        ]);

        DB::table('answers')->insert([
            'question_id' => 8,
            'answer' => 'false',
        ]);
    }
}
