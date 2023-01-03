<?php

use Inertia\Inertia;
use App\Models\Stores\Store;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
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
    return Inertia::render('Dashboard', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', function () {
        return Inertia::render('Dashboard', [
            // we get the stores with the quantity of products
            // 'stores' => Store::withCount('products')->get(),
            'stores' => Store::with(['storeHours' => function ($query) {
                $query->where('day', now()->dayOfWeek)->first();
            }])->withCount('products')->get(),
        ]);
    })->name('home');

    Route::get('/purchase-orders', ShowPurchaseOrdersController::class)->name('purchase-orders');
});

require __DIR__.'/auth.php';
