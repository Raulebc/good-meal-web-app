<?php

namespace Tests\Feature\Http\Controllers\Products;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateProductControllerTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }
    public function it_store_resource_is_returned_with_correct_data()
    {
        Sanctum::actingAs($this->user, ['*']);

        $this->postJson(route('stores.store'), $this->fakeStoreData)
            ->assertExactJson([
                'message' => 'Tienda creada correctamente',
                'data' => [
                    'id' => 1,
                    'name' => $this->fakeStoreData['name'],
                    'description' => $this->fakeStoreData['description'],
                    'address' => $this->fakeStoreData['address'],
                    'phone' => $this->fakeStoreData['phone'],
                    'email' => $this->fakeStoreData['email'],
                    'website' => $this->fakeStoreData['website'],
                    'owner_id' => $this->fakeStoreData['owner_id'],
                    'created_at' => Carbon::now()->startOfSecond()->toISOString(),
                    'updated_at' => Carbon::now()->startOfSecond()->toISOString(),
                ],
            ]);
    }

    /** @test */
    public function it_store_method_response_has_correct_structure()
    {
        Sanctum::actingAs($this->user, ['*']);

        $this->postJson(route('stores.store'), $this->fakeStoreData)
            ->assertJsonStructure([
                'message',
                'data' => [
                    'id',
                    'name',
                    'description',
                    'address',
                    'phone',
                    'email',
                    'website',
                    'owner_id',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

    /** @test */
    public function it_store_response_has_correct_status_code()
    {
        Sanctum::actingAs($this->user, ['*']);

        $this->postJson(route('stores.store'), $this->fakeStoreData)
            ->assertStatus(201);
    }

    /** @test */
    public function it_store_is_not_created_if_user_is_not_authenticated()
    {
        // we run the api request as a non authenticated user
        $this->postJson(route('stores.store'), $this->fakeStoreData)
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
