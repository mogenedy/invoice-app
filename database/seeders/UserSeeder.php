<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456789'),
                'role'=>'admin'
            ]);
            DB::table('users')->insert([
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('12345678'),
                'role'=>'user'

            ]);
            DB::table('users')->insert([
                'name' => 'client',
                'email' => 'client@gmail.com',
                'password' => bcrypt('1234567'),
                'role'=>'client'

            ]);
    }
            
}
