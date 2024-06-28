<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            ['code' => 'BSIS', 'name' => 'Bachelor of Science in Information Systems'],
            ['code' => 'BSA', 'name' => 'Bachelor of Science in Accountancy'],
            ['code' => 'BSBA', 'name' => 'Bachelor of Science in Business Administration'],
            ['code' => 'BSHRM', 'name' => 'Bachelor of Science in Hotel and Restaurant Management'],
            ['code' => 'BSN', 'name' => 'Bachelor of Science in Nursing'],
            ['code' => 'BSED', 'name' => 'Bachelor of Science in Education'],
            ['code' => 'BSA', 'name' => 'Bachelor of Science in Agriculture'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
