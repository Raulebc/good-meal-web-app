<?php

namespace App\Models\Stores;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
