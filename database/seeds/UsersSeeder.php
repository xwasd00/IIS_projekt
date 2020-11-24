<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'admin' => true,
        ]);

        DB::table('users')->insert([
            'name' => 'profesor',
            'email' => 'profesor@example.com',
            'password' => Hash::make('password'),
            'profesor' => true,
        ]);

        DB::table('users')->insert([
            'name' => 'asistent',
            'email' => 'asistent@example.com',
            'password' => Hash::make('password'),
            'asistent' => true,
        ]);

        DB::table('users')->insert([
            'name' => 'student',
            'email' => 'student@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
