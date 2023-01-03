<?php

namespace Database\Factories\Purchases;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchases\PurchaseOrder>
 */
class PurchaseOrderFactory extends Factory
{

    protected $model = \App\Models\Purchases\PurchaseOrder::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'store_id' => 1,
            'pickup_date' => $this->faker->date(),
            'pickup_time' => $this->faker->time(),
            'items' => $this->faker->json(),
            'delivery_fee' => $this->faker->numberBetween(0, 100),
            'total' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->numberBetween(0, 100),
        ];
    }
}
