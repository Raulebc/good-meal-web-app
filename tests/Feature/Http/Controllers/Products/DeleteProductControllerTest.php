<?php

namespace Tests\Feature\Http\Controllers\Products;

use Tests\TestCase;
use App\Models\User;
use App\Models\Stores\Store;
use App\Models\Products\Product;
use App\Models\Categories\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteProductControllerTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

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
    public function it_product_is_deleted_from_database_correctly()
    {
        $this->actingAs($this->user);

        $product = Product::factory()->create([
            'store_id' => Store::factory()->create([
                'owner_id' => $this->user->id,
            ])->id,
            'category_id' => Category::factory()->create()->id,
        ]);

        $this->deleteJson(route('api.products.destroy', $product))->assertOk();

        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }

    /** @test */
    public function it_returns_correct_status_code()
    {
        $this->actingAs($this->user);

        $product = Product::factory()->create([
            'store_id' => Store::factory()->create([
                'owner_id' => $this->user->id,
            ])->id,
            'category_id' => Category::factory()->create()->id,
        ]);

        $this->deleteJson(route('api.products.destroy', $product))
            ->assertOk();
    }

    /** @test */
    public function it_returns_correct_response()
    {
        $this->actingAs($this->user);

        $product = Product::factory()->create([
            'store_id' => Store::factory()->create([
                'owner_id' => $this->user->id,
            ])->id,
            'category_id' => Category::factory()->create()->id,
        ]);

        $this->deleteJson(route('api.products.destroy', $product))
            ->assertJson([
                'message' => 'Producto eliminado correctamente',
            ]);
    }

    /** @test */
    public function it_is_not_deleted_if_user_is_not_authenticated()
    {
        $product = Product::factory()->create([
            'store_id' => Store::factory()->create([
                'owner_id' => $this->user->id,
            ])->id,
            'category_id' => Category::factory()->create()->id,
        ]);

        $this->deleteJson(route('api.products.destroy', $product))
            ->assertUnauthorized();
    }

    /** @test */
    public function it_is_not_deleted_if_user_is_not_the_product_owner()
    {
        $this->actingAs($this->user);

        $product = Product::factory()->create([
            'store_id' => Store::factory()->create([
                'owner_id' => User::factory()->create()->id,
            ])->id,
            'category_id' => Category::factory()->create()->id,
        ]);

        $this->deleteJson(route('api.products.destroy', $product))
            ->assertForbidden();
    }
}
