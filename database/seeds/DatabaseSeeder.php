<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'admin' => true,
        ]);

        DB::table('users')->insert([
            'name' => 'student',
            'email' => 'student@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
