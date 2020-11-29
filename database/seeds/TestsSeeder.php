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
        DB::table('tests')->insert([
            'name' => 'test1',
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

        DB::table('tests')->insert([
            'name' => 'test-old',
            'configuration' => '',
            'start' => date_create(date("Y-m-d H:i:s", mktime(12, 0, 0, 11, 29, 2020))),
            'end' => date_create(date("Y-m-d H:i:s")),
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

        DB::table('tests')->insert([
            'name' => 'test3',
            'configuration' => '',
            'start' => date_create(date("Y-m-d H:i:s")),
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

        DB::table('test_instances')->insert([
            'test_id' => 2,
            'user_id' => 1,
            'approved' => true,
        ]);

        DB::table('student_answers')->insert([
            'question_id'=> 3,
            'test_instance_id' => 1,
            'answer' => "bla",
        ]);

        DB::table('student_answers')->insert([
            'question_id'=> 4,
            'test_instance_id' => 1,
            'answer' => "bla",
        ]);

        DB::table('student_answers')->insert([
            'question_id'=> 5,
            'test_instance_id' => 1,
            'answer' => "bla",
        ]);
    }
}
