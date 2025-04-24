<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('players')->insert([
            'username' => 'cirleK',
            'kd_player' => 9.45,
            'umur' => 21,
            'achievement' => 2,
            'komunikasi' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
