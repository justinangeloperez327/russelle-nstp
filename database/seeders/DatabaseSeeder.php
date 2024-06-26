<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CoursesSeeder::class,
            UsersSeeder::class,

            StudentsSeeder::class,
        ]);
    }
}
