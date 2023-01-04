<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\StoreSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\StoreHourSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // The order of the seeders must be maintained, 
        // as some seeders depend on the data created by other seeders.
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            StoreSeeder::class,
            StoreHourSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
