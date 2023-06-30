<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExportedTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $markets = 'database/tables/markets.sql';
        DB::unprepared(file_get_contents($markets));
        $this->command->info('Market table seeded!');

        $categories = 'database/tables/categories.sql';
        DB::unprepared(file_get_contents($categories));
        $this->command->info('Category table seeded!');

        $products = 'database/tables/products.sql';
        DB::unprepared(file_get_contents($products));
        $this->command->info('Product table seeded!');

        $addresses = 'database/tables/addresses.sql';
        DB::unprepared(file_get_contents($addresses));
        $this->command->info('Addresses table seeded!');

        $prices = 'database/tables/prices.sql';
        DB::unprepared(file_get_contents($prices));
        $this->command->info('Price table seeded!');

        $marquee = 'database/tables/marquee_prices.sql';
        DB::unprepared(file_get_contents($marquee));
        $this->command->info('Price table seeded!');
    }
}
