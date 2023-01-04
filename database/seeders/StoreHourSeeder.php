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
class StoreHourSeeder extends Seeder
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
        $store = DB::table('stores')->where('name', 'John Doe Store')->first() 
            ?? DB::table('stores')->first();

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

        $storeTwo = DB::table('stores')->where('name', 'John Doe Store 2')->first() 
            ?? DB::table('stores')->skip(1)->first();
        
        DB::table('store_hours')->insert([
            [
                'store_id' => $storeTwo->id,
                'day' => StoreHour::MONDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $storeTwo->id,
                'day' => StoreHour::TUESDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $storeTwo->id,
                'day' => StoreHour::WEDNESDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $storeTwo->id,
                'day' => StoreHour::THURSDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $storeTwo->id,
                'day' => StoreHour::FRIDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $storeTwo->id,
                'day' => StoreHour::SATURDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
            [
                'store_id' => $storeTwo->id,
                'day' => StoreHour::SUNDAY,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'pickup_available' => true,
                'delivery_available' => true,
            ],
        ]);
    }
}
