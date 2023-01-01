<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Response;
use App\Services\Sanitization;
use App\Models\Products\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Products\ProductResource;
use App\Http\Requests\Products\CreateProductRequest;

class CreateProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateProductRequest $request)
    {
        $sanitizedData = $request->input(null, function ($productData) {
            return Sanitization::sanitize(new Product(), $productData);
        });

        $product = Product::create($sanitizedData);

        return (new ProductResource($product))
                ->additional(['message' => 'Producto creado correctamente'])
                ->response()
                ->setStatusCode(Response::HTTP_CREATED);
    }
}
