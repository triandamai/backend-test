<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $db = public_path('database/number_2.sql');
        DB::unprepared(file_get_contents($db));
        $this->command->info('database table seeded!');
    }
}
