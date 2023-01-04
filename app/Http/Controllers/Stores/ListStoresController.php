<?php

namespace App\Http\Controllers\Stores;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stores\Store;

class ListStoresController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Stores/Index',  
            [
                'stores' => Store::with([
                    'storeHours' => function ($query) {
                        $query->where('day', now()->dayOfWeek)->first();
                    },
                ])->withCount('products')
                    ->get()
            ]);
    }
}
