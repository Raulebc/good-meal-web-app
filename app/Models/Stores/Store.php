<?php

namespace App\Models\Stores;

use App\Models\User;
use App\Models\Products\Product;
use App\Models\Stores\StoreHour;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'phone',
        'email',
        'website',
        'owner_id',

        // 'image',
        // 'latitude',
        // 'longitude',
    ];

    /**
     * Create a new store.
     *
     * @param array $data
     * @return self
     */
    public static function createStore($data): self
    {
        return self::create(array_merge(
            $data,
            [
                'owner_id' => auth()->id(),
            ]
        ));
    }

    /**
     * Get all of the products for the Store
     *
     * @return \Illuminate\Database\Elo/quent\Relations\HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the user that owns the Store
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the storeHours for the Store
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function storeHours(): HasMany
    {
        return $this->hasMany(StoreHour::class);
    }

    /**
     * Get the store that have the lowest price product.
     * The store must have at least one product with stock.
     * 
     * @return Store|null
     */
    public function fromProduct()
    {
        $this->products()
            ->where('stock', '>', 0)
            ->orderBy('price', 'asc');
    }

    /**
     * The number of products in stock.
     * 
     * @return int
     */
    public function countInStockProducts(): int
    {
        return $this->products()->where('stock', '>', 0)->count('id');
    }
}
