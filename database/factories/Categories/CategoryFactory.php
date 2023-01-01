<?php

namespace Database\Factories\Categories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categories\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = \App\Models\Categories\Category::class;

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
            // 'parent_id' => 0,
            'image' => $this->faker->imageUrl(),
        ];
    }
}
