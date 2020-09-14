<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mwaka Ambrose',
            'email' => 'ambrosemwaka@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
