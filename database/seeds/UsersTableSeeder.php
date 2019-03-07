<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@marshian-cms.website',
            'password' => bcrypt('password@2017'),
            'remember_token' => str_random(10),
            'created_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@marshian-cms.website',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
            'created_at' => Carbon::now()
        ]);
    }
}
