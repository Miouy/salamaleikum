<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('managers')->insert([
            'manager_name' => Str::random(10),
            'manager_surname' => Str::random(10),
            'manager_email' => Str::random(10).'@gmail.com',
            'manager_password' => Hash::make('password'),
            'manager_phone_num' => Str::random(10),
        ]);
    }
}
