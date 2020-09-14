<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apps')->insert([
            'name' => 'Deploi',
            'user_id' => 1,
            'app_id' => 'JKJKJKJKOIO-JJKJFFFGKJGV',
            'app_secret' => 'UIERIUWERIU-JJKJFFFGKJGV',
        ]);
    }
}
