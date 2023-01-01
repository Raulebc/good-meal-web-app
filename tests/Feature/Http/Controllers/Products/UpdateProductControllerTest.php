<?php

namespace Tests\Feature\Http\Controllers\Products;

use Tests\TestCase;
use App\Models\User;
use App\Models\Stores\Store;
use Laravel\Sanctum\Sanctum;
use Illuminate\Http\Response;
use App\Models\Products\Product;
use App\Models\Categories\Category;
use App\Http\Resources\StoreResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UpdateProductControllerTest extends TestCase
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
    public function it_returns_forbidden_if_user_is_not_the_product_owner()
    {
        $this->withoutExceptionHandling();
        Sanctum::actingAs($this->user);

        $product = Product::factory()->create([
            'store_id' => Store::factory()->create([
                'owner_id' => User::factory()->create()->id,
            ])->id,
            'category_id' => Category::factory()->create()->id,
        ]);

        $this->putJson(route('products.update', $product))
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function it_product_owner_can_update_the_product_correctly()
    {
        Sanctum::actingAs($this->user);

        $product = Product::factory()->create([
            'store_id' => Store::factory()->create([
                'owner_id' => $this->user->id,
            ])->id,
            'category_id' => Category::factory()->create([
                'name' => 'category name',
                'description' => 'category description',
            ])->id,
        ]);

        $newProductData = [
            'name' => 'New Product Name',
            'description' => 'New Product Description',
            'price' => 100,
            'discount' => 10,
            'stock' => 10,
            'image' => 'https://new-product-image.com',
            'category_id' => Category::factory()->create()->id,
            'store_id' => Store::factory()->create([
                'owner_id' => $this->user->id,
            ])->id,
        ];

        $this->putJson(route('products.update', $product), $newProductData)
            ->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'data' => [
                    'name' => $newProductData['name'],
                    'description' => $newProductData['description'],
                    'price' => $newProductData['price'],
                    'discount' => $newProductData['discount'],
                    'stock' => $newProductData['stock'],
                    'image' => $newProductData['image'],
                    'category' => [
                        'id' => $newProductData['category_id'],
                        'name' => Category::find($newProductData['category_id'])->name,
                        'description' => Category::find($newProductData['category_id'])->description,
                    ],
                    'store' => [
                        'id' => $newProductData['store_id'],
                        'name' => Store::find($newProductData['store_id'])->name,
                        'description' => Store::find($newProductData['store_id'])->description,
                    ],
                ],
                'message' => 'Producto actualizado correctamente',
            ]);
    }

    /** @test */
    public function it_product_is_updated_correctly_into_database()
    {
        Sanctum::actingAs($this->user);

        $product = Product::factory()->create([
            'store_id' => Store::factory()->create([
                'owner_id' => $this->user->id,
            ])->id,
            'category_id' => Category::factory()->create()->id,
        ]);

        $newProductData = [
            'name' => 'New Product Name',
            'description' => 'New Product Description',
            'price' => 100,
            'discount' => 10,
            'stock' => 10,
            'image' => 'https://new-product-image.com',
            'category_id' => Category::factory()->create()->id,
            'store_id' => Store::factory()->create([
                'owner_id' => $this->user->id,
            ])->id,
        ];

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'discount' => $product->discount,
            'stock' => $product->stock,
            'image' => $product->image,
            'category_id' => $product->category_id,
            'store_id' => $product->store_id,
        ]);

        $this->putJson(route('products.update', $product), $newProductData)
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => $newProductData['name'],
            'description' => $newProductData['description'],
            'price' => $newProductData['price'],
            'discount' => $newProductData['discount'],
            'stock' => $newProductData['stock'],
            'image' => $newProductData['image'],
            'category_id' => $newProductData['category_id'],
            'store_id' => $newProductData['store_id'],
        ]);
    }
}
