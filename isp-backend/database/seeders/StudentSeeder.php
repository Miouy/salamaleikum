<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'student_name' => Str::random(10),
            'student_surname' => Str::random(10),
            'student_patronymic' => Str::random(10),
            'student_email' => Str::random(6).'@gmail.com',
            'student_password' => Hash::make('password'),
            'student_iin' => Str::random(12),
            'student_phone_num' => Str::random(11),
            'student_total_gpa' => rand(0,4),
            'group_id' => 1,
            'api_token' => Str::random(10),
        ]);
    }
}
