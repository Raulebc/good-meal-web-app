<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stores\StoreHour;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * Class StoreHoursSeeder
 *
 * @package Database\Seeders
 */
class StoreHoursSeeder extends Seeder
{
    /**
     * The steps to be run during seeding.
     * - Create a user
     * - Create a store
     * - Create store hours
     * - Create another store
     * - Create store hours
     *
     * @return void
     */
    public function run()
    {
        // we dump the database
        Schema::disableForeignKeyConstraints(); 

        DB::table('store_hours')->truncate();
        DB::table('stores')->truncate();
        DB::table('users')->truncate();
                
        Schema::enableForeignKeyConstraints();

        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'user.john@email.com',
            'password' => Hash::make('password'),
        ]);


        $jhon = DB::table('users')->where('email', 'user.john@email.com')->first();

        DB::table('stores')->insert(
            [
                'owner_id' => $jhon->id,
                'name' => 'John Doe Store',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
                'email' => 'store@email.com',
                'address' => '1234 Main St',
                'website' => 'https://www.website.cl',
                'phone' => '9 1234 5678',
            ],
            [
                'owner_id' => $jhon->id,
                'name' => 'John Doe Store 2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet hendrerit urna. Vestibulbitant morbi tristique',
                'email' => 'store@eamil.com',
                'address' => 'Another address 45678',
                'website' => 'https://www.website.cl',
                'phone' => '9 1234 45678',
            ]
        );

        $store = DB::table('stores')->where('name', 'John Doe Store')->first();

        DB::table('store_hours')->insert([
            [
                'store_id' => $store->id,
                'day' => StoreHour::MONDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $store->id,
                'day' => StoreHour::TUESDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $store->id,
                'day' => StoreHour::WEDNESDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $store->id,
                'day' => StoreHour::THURSDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $store->id,
                'day' => StoreHour::FRIDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $store->id,
                'day' => StoreHour::SATURDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $store->id,
                'day' => StoreHour::SUNDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
        ]);

        DB::table('store_hours')->insert([
            [
                'store_id' => $store->id,
                'day' => StoreHour::MONDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $store->id,
                'day' => StoreHour::TUESDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $store->id,
                'day' => StoreHour::WEDNESDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $store->id,
                'day' => StoreHour::THURSDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $store->id,
                'day' => StoreHour::FRIDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $store->id,
                'day' => StoreHour::SATURDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $store->id,
                'day' => StoreHour::SUNDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
        ]);
    }
}
