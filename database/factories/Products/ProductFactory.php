<?php

namespace Database\Factories\Products;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products\Product>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Products\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'price' => $this->faker->randomNumber(5),
            'discount' => $this->faker->randomNumber(2),
            'stock' => $this->faker->randomNumber(2),
            'image' => $this->faker->imageUrl(),
            'category_id' => $this->faker->randomNumber(2),
            'store_id' => $this->faker->randomNumber(2),
        ];
    }
}
