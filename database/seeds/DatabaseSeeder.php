<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    DB::table('users')->insert([
            'f_name' => 'Developer',
            'l_name' => 'Test',
            'email' => 'dev@gmail.com',
            'password' => '123',
            'user_type' => 'admin'
        ]);	
    }
}
