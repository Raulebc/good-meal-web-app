<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Products\Product;
use Database\Seeders\UserSeeder;
use Database\Seeders\StoreSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\Hash;
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

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'user@email.com',
            'password' => Hash::make('password'),
        ]);

        Product::factory()->count(10)->create();
    }
}
