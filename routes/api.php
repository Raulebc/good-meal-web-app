<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\Products\ListProductController;
use App\Http\Controllers\Products\ShowProductController;
use App\Http\Controllers\Products\CreateProductController;
use App\Http\Controllers\Products\DeleteProductController;
use App\Http\Controllers\Products\UpdateProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    // we add prefix to avoid conflict with web route
    Route::apiResource('stores', StoreController::class)->names([
        'index' => 'api.stores.index',
        'show' => 'api.stores.show',
        'store' => 'api.stores.store',
        'update' => 'api.stores.update',
        'destroy' => 'api.stores.destroy',
    ]);

    Route::get('products', ListProductController::class)->name('api.products.index');
    Route::post('products', CreateProductController::class)->name('api.products.store');
    Route::get('products/{product}', ShowProductController::class)->name('api.products.show');
    Route::put('products/{product}', UpdateProductController::class)->name('api.products.update');
    Route::delete('products/{product}', DeleteProductController::class)->name('api.products.destroy');
});

