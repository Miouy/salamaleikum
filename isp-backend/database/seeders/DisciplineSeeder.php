<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disciplines')->insert([
            'discipline_name' => Str::random(10),
            'discipline_credit' => rand(2,7),
            'discipline_code' => Str::random(4),
            'discipline_type' => Str::random(10),
            'discipline_teacher' => Str::random(6),
            'discipline_is_elective' => rand(0,1),
            'discipline_is_finished' => rand(0,1),
            'semester_id' => 4,
        ]);
    }
}
