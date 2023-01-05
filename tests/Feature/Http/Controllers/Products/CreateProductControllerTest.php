<?php

namespace Tests\Feature\Http\Controllers\Products;

use Tests\TestCase;
use App\Models\User;
use App\Models\Stores\Store;
use App\Models\Categories\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateProductControllerTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /**
     * @var \App\Models\User
     */
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_product_is_created_correctly_in_database()
    {
        $this->actingAs($this->user);

        $this->postJson(route('api.products.store'), [
            'name' => 'Product 1',
            'description' => 'Product 1 description',
            'price' => 1000,
            'stock' => 10,
            'category_id' => Category::factory()->create()->id,
            'store_id' => Store::factory()->create([
                'owner_id' => $this->user->id,
            ])->id,
        ])->assertStatus(201);

        $this->assertDatabaseHas('products', [
            'name' => 'Product 1',
            'description' => 'Product 1 description',
            'price' => 1000,
            'stock' => 10,
        ]);
    }

    /** @test */
    public function it_function_returns_an_http_response()
    {
        $this->actingAs($this->user);

        $response = $this->postJson(route('api.products.store'), [
            'name' => 'Product 1',
            'description' => 'Product 1 description',
            'price' => 1000,
            'stock' => 10,
            'category_id' => Category::factory()->create()->id,
            'store_id' => Store::factory()->create([
                'owner_id' => $this->user->id,
            ])->id,
        ])->assertStatus(201);
    }

    /** @test */
    public function it_product_cannot_belong_to_a_store_that_is_not_owned_by_the_user()
    {
        $this->actingAs($this->user);

        $this->postJson(route('api.products.store'), [
            'name' => 'Product 1',
            'description' => 'Product 1 description',
            'price' => 1000,
            'stock' => 10,
            'category_id' => Category::factory()->create()->id,
            'store_id' => Store::factory()->create([
                'owner_id' => User::factory()->create()->id,
            ])->id,
        ])->assertJsonValidationErrors([
            'store_id' => 'La tienda seleccionada no existe o no pertenece al usuario'
        ])->assertStatus(422);
    }
}
