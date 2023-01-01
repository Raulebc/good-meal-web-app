<?php

namespace Tests\Feature\Http\Controllers\Products;

use Tests\TestCase;
use App\Models\User;
use App\Models\Stores\Store;
use Laravel\Sanctum\Sanctum;
use App\Models\Products\Product;
use App\Models\Categories\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListProductControllerTest extends TestCase
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
    public function it_function_returns_an_http_response()
    {
        Sanctum::actingAs($this->user);

        $response = $this->getJson(route('products.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_function_returns_a_paginated_collection_of_stores_in_the_response()
    {
        Sanctum::actingAs($this->user);

        $response = $this->getJson(route('products.index'));

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'description',
                    'price',
                    'stock',
                    'status',
                    'image',
                    'created_at',
                    'updated_at',
                    'deleted_at',
                ],
            ],
            'links' => [
                'first',
                'last',
                'prev',
                'next',
            ],
            'meta' => [
                'current_page',
                'from',
                'path',
                'per_page',
                'to',
            ],
        ]);
    }

    /** @test */
    public function it_respects_the_per_page_parameter_in_the_request_when_paginating_the_stores()
    {
        $this->withoutExceptionHandling();

        $store = Store::factory()->create(['owner_id' => $this->user->id]);

        Product::factory()->count(2)->create([
            'store_id' => $store->id,
            'category_id' => Category::factory()->create()->id,
        ]);

        Sanctum::actingAs($this->user);

        $this->getJson(route('products.index', ['per_page' => 1]))
            ->assertJsonCount(1, 'data');
    }

    /** @test */
    public function it_per_page_must_be_a_valid_integer()
    {
        Sanctum::actingAs($this->user);

        $response = $this->getJson(route('products.index', ['per_page' => 'invalid']));

        $response->assertStatus(422);
    }
}
