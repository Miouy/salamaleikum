<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentMarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_marks')->insert([
            'mt_1' => rand(50,100),
            'mt_2' => rand(50,100),
            'exam' => rand(50,100),
            'final' => rand(30,100),
            'grade_name' => Str::random(1),
            'gpa' => rand(0,4),
            'student_id' => 1,
            'discipline_id' => 20,
        ]);
    }
}
