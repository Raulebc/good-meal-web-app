<?php

namespace App\Http\Controllers\Products;

use App\Models\Stores\Store;
use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Products\StoreProductCollection;

class ListStoreProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Store $store)
    {
        $status = $request->input('status');
        $products = $this->filterProducts($store->products(), $status);

        return new StoreProductCollection($store->products);
    }

    /**
     * Filter the products by the given status.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $products
     * @param  string  $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function filterProducts($products, $status)
    {
        switch ($status) {
            case 'in-stock':
                $products->where('stock', '>', 0);
                break;
            case 'sold-out':
                $products->where('stock', 0);
                break;
            case 'favorites':
                $products = Product::join('favorites', 'products.id', '=', 'favorites.product_id')
                                    ->where('favorites.user_id', request()->user()->id)
                                    ->select('products.*')
                                    ->get();
                break;
        }

        return $products;
    }
}
