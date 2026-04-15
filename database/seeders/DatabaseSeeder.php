<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Episode;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

DB::table('episodes')->truncate();
DB::table('courses')->truncate();

DB::statement('SET FOREIGN_KEY_CHECKS=1;');

Course::factory(15)->create();
Episode::factory(120)->create();
    }
}
