<?php

namespace App\Http\Controllers\Products;

use App\Models\Products\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Products\ProductResource;
use App\Http\Requests\Products\ListProductsRequest;

class ListProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ListProductsRequest $request)
    {
        $stores = $this->paginate($request, Product::query());

        return ProductResource::collection($stores);
    }
}
