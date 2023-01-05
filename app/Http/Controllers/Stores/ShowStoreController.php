<?php

namespace App\Http\Controllers\Stores;

use Inertia\Inertia;
use App\Models\Stores\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowStoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Store $store)
    {
        return Inertia::render('Stores/Show', [
            'store' => $store->load(['storeHours' => function ($query) {
                $query->where('day', now()->dayOfWeek)->first();
            }]),
        ]);
    }
}
