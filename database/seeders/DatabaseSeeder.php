<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(ExportedTables::class);
        $this->call(SlugSeeder::class);
        $this->call(ContentSeeder::class);
        $this->call(MetaSeeder::class);
    }
}
