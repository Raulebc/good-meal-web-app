<?php

namespace App\Models\Products;

use App\Models\Stores\Store;
use App\Models\Categories\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'discount',
        'stock',
        'image',
        'category_id',
        'store_id',
    ];

    /**
     * Get the category that owns the product.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the store that owns the product.
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Update the product.
     *
     * @param  array  $productData
     * @return void
     */
    public function updateProduct(array $productData): void
    {
        if (array_key_exists('store_id', $productData)) {
            $store = Store::find($productData['store_id']);

            if ($this->store->owner->isNotOwnerOf($store)) {
                unset($productData['store_id']);
            }
        }

        $this->update($productData);
    }
}
