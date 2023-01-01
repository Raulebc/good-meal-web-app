<?php

namespace Tests\Feature\Http\Controllers\Products;

use Tests\TestCase;
use App\Models\User;
use App\Models\Stores\Store;
use App\Models\Products\Product;
use App\Models\Categories\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ShowProductControllerTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_returns_correct_structure_response()
    {
        $this->actingAs($this->user);

        $product = Product::factory()->create([
            'category_id' => Category::factory()->create()->id,
            'store_id' => Store::factory()->create([
                'owner_id' => $this->user->id,
            ])->id,
        ]);

        $this->getJson(route('products.show', $product))
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'description',
                    'price',
                    'discount',
                    'stock',
                    'image',
                    'category' => [
                        'id',
                        'name',
                        'description',
                    ],
                    'store' => [
                        'id',
                        'name',
                        'description',
                    ],
                ],
        ]);
    }

    /** @test */
    public function it_returns_correct_response()
    {
        $this->actingAs($this->user);

        $product = Product::factory()->create([
            'category_id' => Category::factory()->create()->id,
            'store_id' => Store::factory()->create([
                'owner_id' => $this->user->id,
            ])->id,
        ]);

        $this->getJson(route('products.show', $product))
            ->assertOk()
            ->assertExactJson([
                'data' => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'discount' => $product->discount,
                    'stock' => $product->stock,
                    'image' => $product->image,
                    'category' => [
                        'id' => $product->category->id,
                        'name' => $product->category->name,
                        'description' => $product->category->description,
                    ],
                    'store' => [
                        'id' => $product->store->id,
                        'name' => $product->store->name,
                        'description' => $product->store->description,
                    ],
                ],
        ]);
    }
}
