<?php

use App\Http\Controllers\Products\ListStoreProductController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Stores\ShowStoreController;
use App\Http\Controllers\Stores\ListStoresController;
use App\Http\Controllers\Purchases\ShowPurchaseOrdersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Stores/Index', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware('auth')->group(function () {
    /**
     * Profile...
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /**
     * Stores...
     */
    Route::get('/stores', ListStoresController::class)->name('stores');
    Route::get('/stores/{store}', ShowStoreController::class)->name('stores.show');

    /**
     * Products...
     */
    Route::get('/stores/{store}/products', ListStoreProductController::class)->name('stores.products');

    /**
     * Purchase Orders...
     */
    Route::get('/purchase-orders', ShowPurchaseOrdersController::class)->name('purchase-orders');
});

require __DIR__.'/auth.php';
