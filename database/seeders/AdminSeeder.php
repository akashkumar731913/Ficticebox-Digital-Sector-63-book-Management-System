<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert 'users' table
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt('12345678'),
            'type'=> "admin",
        ]);
    }
}
