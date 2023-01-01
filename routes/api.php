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
    Route::apiResource('stores', StoreController::class);

    Route::get('products', ListProductController::class)->name('products.index');
    Route::post('products', CreateProductController::class)->name('products.store');
    Route::get('products/{product}', ShowProductController::class)->name('products.show');
    Route::put('products/{product}', UpdateProductController::class)->name('products.update');
    Route::delete('products/{product}', DeleteProductController::class)->name('products.destroy');
});

