<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdvisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advisors')->insert([
            'advisor_name' => Str::random(10),
            'advisor_surname' => Str::random(10),
            'advisor_email' => Str::random(10).'@gmail.com',
            'advisor_password' => Hash::make('password'),
            'advisor_phone_num' => Str::random(10),
        ]);
    }
}
