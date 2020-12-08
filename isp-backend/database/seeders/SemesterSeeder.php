<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semesters')->insert([
            'semester_name' => Str::random(10),
            'semester_num' => rand(1,2),
            'total_gpa' => rand(0,4),
            'course_id' => 1,
        ]);
    }
}
