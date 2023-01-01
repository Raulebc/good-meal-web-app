<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Stores\Store;
use App\Models\Products\Product;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Depending on the model, we check if:
     * - the user is the owner of the store
     * - the user is the owner of the product
     * 
     * @param Model $model
     * @return bool
     */
    public function isNotOwnerOf(Model $model): bool
    {
        if ($model instanceof Store) {
            return $this->id !== $model->owner_id;
        }

        if ($model instanceof Product) {
            return $this->id !== $model->store->owner_id;
        }

        return false;
    }
}
