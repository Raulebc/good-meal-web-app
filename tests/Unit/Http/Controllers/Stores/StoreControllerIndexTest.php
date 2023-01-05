<?php

namespace Tests\Unit\Http\Controllers\Stores;

use Tests\TestCase;
use App\Models\User;
use App\Models\Stores\Store;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StoreControllerIndexTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    /**
     * @var User
     */
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

        $this->getJson(route('api.stores.index'))
            ->assertStatus(200);
    }

    /** @test */
    public function it_function_returns_a_paginated_collection_of_stores_in_the_response()
    {
        Sanctum::actingAs($this->user);

        $response = $this->getJson(route('api.stores.index'));

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'address',
                    'phone',
                    'email',
                    'created_at',
                    'updated_at',
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

    // Test that the function returns a collection of stores that are transformed into the StoreResource resource.
    /** @test */
    public function it_transformed_stores_into_the_store_resource()
    {
        Sanctum::actingAs($this->user);

        $this->getJson(route('api.stores.index'))->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'address',
                    'phone',
                    'email',
                    'created_at',
                    'updated_at',
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

    // Test that the function respects the per_page parameter in the request when paginating the stores.
    /** @test */
    public function it_respects_the_per_page_parameter_in_the_request_when_paginating_the_stores()
    {
        Store::factory()->count(6)->create([
            'owner_id' => $this->user->id,
        ]);

        Sanctum::actingAs($this->user);

        $this->getJson(route('api.stores.index', ['per_page' => 5]))
            ->assertJsonCount(5, 'data');
    }

    /** @test */
    public function it_per_page_must_be_a_valid_integer()
    {
        Sanctum::actingAs($this->user);

        $this->getJson(route('api.stores.index', ['per_page' => 'invalid']))
            ->assertJsonValidationErrors([
                'per_page' => 'El campo per page debe ser un número entero',
            ])
            ->assertStatus(422);
    }

    /** @test */
    public function it_per_page_must_be_equals_or_more_than_one()
    {
                Sanctum::actingAs($this->user);

        $this->getJson(route('api.stores.index', ['per_page' => 0]))
            ->assertJsonValidationErrors([
                'per_page' => 'El campo per page debe ser al menos 1.',
            ])
            ->assertStatus(422);
    }

    /** @test */
    public function it_per_page_must_be_equals_or_less_than_100()
    {
        Sanctum::actingAs($this->user);

        $this->getJson(route('api.stores.index', ['per_page' => 101]))
            ->assertJsonValidationErrors([
                'per_page' => 'El campo per page no debe ser mayor que 100.',
            ])
            ->assertStatus(422);
    }

    // test that the data is correct.
    /** @test */
    public function it_returns_the_correct_data()
    {
        $store1 = Store::factory()->create([
            'owner_id' => $this->user->id,
        ]);

        $store2 = Store::factory()->create([
            'owner_id' => $this->user->id,
        ]);

        Sanctum::actingAs($this->user);

        $this->getJson('/api/stores?per_page=2&page=1')
            ->assertExactJson(
                [
                    'data' => [
                        [
                            'id' => $store1->id,
                            'name' => $store1->name,
                            'description' => $store1->description,
                            'has_stock' => $store1->has_stock,
                            'address' => $store1->address,
                            'phone' => $store1->phone,
                            'email' => $store1->email,
                            'website' => $store1->website,
                            'owner_id' => $store1->owner_id,
                            'created_at' => $store1->created_at->startOfSecond()->toISOString(),
                            'updated_at' => $store1->updated_at->startOfSecond()->toISOString(),
                        ],
                        [
                            'id' => $store2->id,
                            'name' => $store2->name,
                            'description' => $store2->description,
                            'has_stock' => $store2->has_stock,
                            'address' => $store2->address,
                            'phone' => $store2->phone,
                            'email' => $store2->email,
                            'website' => $store2->website,
                            'owner_id' => $store2->owner_id,
                            'created_at' => $store2->created_at->startOfSecond()->toISOString(),
                            'updated_at' => $store2->updated_at->startOfSecond()->toISOString(),
                        ],
                    ],
                    'links' => [
                        'first' => route('api.stores.index', ['page' => 1]),
                        'next' => null,
                        'prev' => null,
                        'last' => null,
                    ],
                    'meta' => [
                        'current_page' => 1,
                        'from' => 1,
                        'path' => route('api.stores.index'),
                        'per_page' => "2",
                        'to' => 2,
                    ],
                ]
            );
    }
}
