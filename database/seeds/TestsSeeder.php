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
            'start' => date_create("2013-03-15 12:00:00"),
            'end' => date_create("2013-03-15 13:00:00"),
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
    }
}
