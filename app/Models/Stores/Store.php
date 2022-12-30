<?php

namespace App\Models\Stores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
