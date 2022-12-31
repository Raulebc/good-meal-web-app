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

        $response = $this->getJson(route('stores.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_function_returns_a_paginated_collection_of_stores_in_the_response()
    {
        Sanctum::actingAs($this->user);

        $response = $this->getJson(route('stores.index'));

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

        $this->getJson(route('stores.index'))->assertJsonStructure([
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

        $this->getJson(route('stores.index', ['per_page' => 5]))
            ->assertJsonCount(5, 'data');
    }

    /** @test */
    public function it_per_page_must_be_a_valid_integer()
    {
        Sanctum::actingAs($this->user);

        $this->getJson(route('stores.index', ['per_page' => 'invalid']))
            ->assertJsonValidationErrors([
                'per_page' => 'El campo per page debe ser un número entero',
            ])
            ->assertStatus(422);
    }


}
