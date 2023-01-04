<?php

namespace App\Models\Stores;

use App\Models\Stores\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoreHour extends Model
{
    use HasFactory;

    public const MONDAY = 1;
    public const TUESDAY = 2;
    public const WEDNESDAY = 3;
    public const THURSDAY = 4;
    public const FRIDAY = 5;
    public const SATURDAY = 6;
    public const SUNDAY = 7;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store_id',
        'day',
        'start_time',
        'end_time',
        'pickup_available',
        'delivery_available',
    ];

    // /**
    //  * Get the store that owns the StoreHour
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function store(): BelongsTo
    // {
    //     return $this->belongsTo(Store::class);
    // }
}
