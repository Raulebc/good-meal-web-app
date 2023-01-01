<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Products\ProductResource;

class ShowProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Models\Products\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Product $product)
    {
        return new ProductResource($product);
    }
}
