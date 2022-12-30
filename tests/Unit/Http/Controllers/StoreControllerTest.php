<?php

namespace Tests\Unit\Http\Controllers;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\User;
use App\Models\Stores\Store;
use Laravel\Sanctum\Sanctum;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StoreControllerTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    protected $user;

    protected $fakeStoreData;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->fakeStoreData = [
            'name' => 'Test Store',
            'description' => 'Test Store Description',
            'address' => 'Test Store Address',
            'phone' => 'Test Store Phone',
            'email' => 'testing@email.com',
            'website' => 'www.website-testing.com',
            'owner_id' => $this->user->id,
        ];
    }

    /** @test */
    public function it_store_is_created_correctly_in_database()
    {
        Sanctum::actingAs($this->user, ['*']);

        $store = $this->fakeStoreData;

        $this->postJson(route('stores.store'), $store)
            ->assertCreated();

        $this->assertDatabaseHas('stores', $store);
    }

    // test that additional message is returned
    /** @test */
    // public function it_message_is_returned_correctly()
    // {
    //     $this->withoutExceptionHandling();

    //     $this->postJson(route('stores.store'), $this->fakeStoreData)
    //         ->assertJson([
    //             'message' => 'Tienda creada correctamente',
    //         ]);
    // }

        /** @test */
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

    // test that store is returned
    /** @test */
    public function it_store_response_has_correct_structure()
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

    // test that the correct status code is returned
    /** @test */
    public function it_store_response_has_correct_status_code()
    {
        Sanctum::actingAs($this->user, ['*']);

        $this->postJson(route('stores.store'), $this->fakeStoreData)
            ->assertStatus(201);
    }

    // test that the store is not created if the user is not authenticated
    /** @test */
    public function it_store_is_not_created_if_user_is_not_authenticated()
    {
        // we run the api request as a non authenticated user
        $this->postJson(route('stores.store'), $this->fakeStoreData)
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    // show method tests
    /** @test */
    public function it_show_method_returns_correct_structure_response()
    {
        $store = Store::factory()->create([
            'owner_id' => $this->user->id,
        ]);

        Sanctum::actingAs($this->user, ['*']);

        $this->getJson(route('stores.show', $store->id))
            ->assertStatus(200)
            ->assertJsonStructure([
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
    public function it_show_method_returns_correct_response()
    {
        $store = Store::factory()->create([
            'owner_id' => $this->user->id,
        ]);

        Sanctum::actingAs($this->user, ['*']);

        $this->getJson(route('stores.show', $store->id))
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $store->id,
                    'name' => $store->name,
                    'description' => $store->description,
                    'address' => $store->address,
                    'phone' => $store->phone,
                    'email' => $store->email,
                    'website' => $store->website,
                    'owner_id' => $store->owner_id,
                    'created_at' => $store->created_at->startOfSecond()->toISOString(),
                    'updated_at' => $store->updated_at->startOfSecond()->toISOString(),
                ],
            ]);
    }

    /** @test */
    public function it_the_store_is_updated_in_database_correctly()
    {
        Sanctum::actingAs($this->user, ['*']);

        $store = Store::factory()->create([
            'owner_id' => $this->user->id,
        ]);

        Sanctum::actingAs($this->user, ['*']);

        $this->putJson(route('stores.update', $store->id), $this->fakeStoreData)
            ->assertStatus(200);

        $this->assertDatabaseHas('stores', $this->fakeStoreData);
    }

    /** @test */
    public function it_update_method_returns_correct_response()
    {
        $store = Store::factory()->create([
            'owner_id' => $this->user->id,
        ]);

        Sanctum::actingAs($this->user, ['*']);

        $this->putJson(route('stores.update', $store->id), $this->fakeStoreData)
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Tienda actualizada correctamente',
                'data' => [
                    'id' => $store->id,
                    'name' => $this->fakeStoreData['name'],
                    'description' => $this->fakeStoreData['description'],
                    'address' => $this->fakeStoreData['address'],
                    'phone' => $this->fakeStoreData['phone'],
                    'email' => $this->fakeStoreData['email'],
                    'website' => $this->fakeStoreData['website'],
                    'owner_id' => $this->fakeStoreData['owner_id'],
                    'created_at' => $store->created_at->startOfSecond()->toISOString(),
                    'updated_at' => Carbon::now()->startOfSecond()->toISOString(),
                ],
            ]);
    }

    /** @test */
    public function it_update_method_returns_correct_status_code()
    {
        $store = Store::factory()->create([
            'owner_id' => $this->user->id,
        ]);

        Sanctum::actingAs($this->user, ['*']);

        $this->putJson(route('stores.update', $store->id), $this->fakeStoreData)
            ->assertStatus(200);
    }

    /** @test */
    public function it_store_is_not_updated_if_user_is_not_authenticated()
    {
        $store = Store::factory()->create([
            'owner_id' => $this->user->id,
        ]);

        // we run the api request as a non authenticated user
        $this->putJson(route('stores.update', $store->id), $this->fakeStoreData)
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    /** @test */
    public function it_store_is_not_updated_if_user_is_not_the_owner_of_the_store()
    {
        $store = Store::factory()->create([
            'owner_id' => User::factory()->create()->id,
        ]);

        Sanctum::actingAs($this->user, ['*']);

        $this->putJson(route('stores.update', $store->id), $this->fakeStoreData)
            ->assertJson(['error' => 'No estas autorizado para realizar esta acción.'])
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    // tests for the destroy method
    // - test that the store is deleted from the database
    /** @test */
    public function it_store_is_deleted_from_database_correctly()
    {
        $store = Store::factory()->create([
            'owner_id' => $this->user->id,
        ]);

        Sanctum::actingAs($this->user, ['*']);

        $this->deleteJson(route('stores.destroy', $store->id))
            ->assertStatus(200);

        $this->assertDatabaseMissing('stores', $store->toArray());
    }

    // - test that the correct status code is returned
    /** @test */
    public function it_destroy_method_returns_correct_status_code()
    {
        $store = Store::factory()->create([
            'owner_id' => $this->user->id,
        ]);

        Sanctum::actingAs($this->user, ['*']);

        $this->deleteJson(route('stores.destroy', $store->id))
            ->assertStatus(200);
    }

    // - test that the correct response is returned
    /** @test */
    public function it_destroy_method_returns_correct_response()
    {
        $store = Store::factory()->create([
            'owner_id' => $this->user->id,
        ]);

        Sanctum::actingAs($this->user, ['*']);

        $this->deleteJson(route('stores.destroy', $store->id))
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Tienda eliminada correctamente'
            ]);
    }

    // - test that the store is not deleted if the user is not authenticated
    /** @test */
    public function it_store_is_not_deleted_if_user_is_not_authenticated()
    {
        $store = Store::factory()->create([
            'owner_id' => $this->user->id,
        ]);

        // we run the api request as a non authenticated user
        $this->deleteJson(route('stores.destroy', $store->id))
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    // - test that the store is not deleted if the user is not the owner of the store
    /** @test */
    public function it_store_is_not_deleted_if_user_is_not_the_owner_of_the_store()
    {
        $store = Store::factory()->create([
            'owner_id' => User::factory()->create()->id,
        ]);

        Sanctum::actingAs($this->user, ['*']);

        $this->deleteJson(route('stores.destroy', $store->id))
            ->assertJson(['error' => 'No estas autorizado para realizar esta acción.'])
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    // the correct format of the response must be tested in their own test (StoreResourceTest)

    // todo: Separate the tests for methods of the controller in different classes as follows:
    // StoreControllerIndexTest, StoreControllerShowTest, StoreControllerStoreTest, StoreControllerUpdateTest, StoreControllerDestroyTest
}
