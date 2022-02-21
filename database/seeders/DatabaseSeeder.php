<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'nik' => '12345678',
            'nama' => 'Ali Reza Nauri',
            'email' => 'alireza@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        DB::table('user')->insert([
            'nik' => '87654321',
            'nama' => 'Agus Supono',
            'email' => 'agussupono@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user'
        ]);
    }
}
