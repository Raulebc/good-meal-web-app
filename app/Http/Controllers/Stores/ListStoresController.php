<?php

namespace App\Http\Controllers\Stores;

use Inertia\Inertia;
use App\Models\Stores\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        $status = $request->input('status');

        return Inertia::render('Stores/Index',  
            [
                // we return All the stores with their store hours and the number of products, and 
                'stores' => Store::join('store_hours', 'stores.id', '=', 'store_hours.store_id')
                                ->join('products', 'stores.id', '=', 'products.store_id')
                                ->when($status, function ($query, $status) {
                                    switch ($status) {
                                        case 'in-stock':
                                            $query->where('stock', '>', 0);
                                            break;
                                        case 'sold-out':
                                            $query->where('stock', 0);
                                            break;
                                    }
                                })
                                ->where('store_hours.day', now()->dayOfWeek)
                                ->select('stores.*', DB::raw('COUNT(products.id) as count_products'))
                                ->groupBy('stores.id')
                                ->get()

                // 'stores' => Store::with([
                //     'storeHours' => function ($query) {
                //         $query->where('day', now()->dayOfWeek)->first();
                //     },
                // ])->withCount('products')
                //     ->get()
            ]);
    }
}
