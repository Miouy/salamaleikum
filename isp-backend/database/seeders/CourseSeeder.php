<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'course_name' => Str::random(10),
            'course_code' => Str::random(10),
            'course_education_year' => Str::random(10),
            'specialty_id' => 1,
        ]);
    }
}
