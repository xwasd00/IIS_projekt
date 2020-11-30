<?php

use Illuminate\Database\Seeder;

class InstancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /************** test-present *****************/
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

        /************** test-past *****************/
        DB::table('test_instances')->insert([
            'test_id' => 3,
            'user_id' => 1,
            'approved' => true,
        ]);

        DB::table('student_answers')->insert([
            'question_id'=> 6,
            'test_instance_id' => 2,
            'answer' => "bla bla",
        ]);

        DB::table('student_answers')->insert([
            'question_id'=> 7,
            'test_instance_id' => 2,
            'answer' => "bla",
        ]);

        DB::table('student_answers')->insert([
            'question_id'=> 8,
            'test_instance_id' => 2,
            'answer' => "bla",
        ]);
    }
}
