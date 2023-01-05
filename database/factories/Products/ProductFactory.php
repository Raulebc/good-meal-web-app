<?php

namespace Database\Factories\Products;

use App\Models\Stores\Store;
use App\Models\Categories\Category;
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
            'category_id' => Category::all()->random()->id,
            'store_id' => Store::all()->random()->id,
        ];
    }
}
