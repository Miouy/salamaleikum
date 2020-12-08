<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialties')->insert([
            'name' => Str::random(10),
            'code' => Str::random(10),
            'courses_quantity' => rand(1,5),
            'manager_id' => 1,
        ]);
    }
}
