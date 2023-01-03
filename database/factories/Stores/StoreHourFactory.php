<?php

namespace Database\Factories\Stores;

use App\Models\Stores\Store;
use App\Models\Stores\StoreHour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stores\StoreHour>
 */
class StoreHourFactory extends Factory
{

    protected $model = StoreHour::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'day' => $this->faker->dayOfWeek,
            'start_time' => $this->faker->time,
            'end_time' => $this->faker->time,
            'pickup_available' => $this->faker->boolean,
            'delivery_available' => $this->faker->boolean,
            'store_id' => Store::all()->random()->id,
        ];
    }
}
