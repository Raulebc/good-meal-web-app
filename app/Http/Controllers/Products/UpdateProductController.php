<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\Sanitization;
use App\Models\Products\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Products\ProductResource;

class UpdateProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Product $product)
    {
        if (request()->user()->isNotOwnerOf($product)) {
            return response()->json([
                'error' => 'No estas autorizado para realizar esta acción.'
            ], Response::HTTP_FORBIDDEN);
        }

        $sanitizedData = $request->input(null, function ($productData) {
            return Sanitization::sanitize(new Product(), $productData);
        });

        $product->update($sanitizedData);

        return (new ProductResource($product))
                ->additional(['message' => 'Producto actualizado correctamente'])
                ->response()
                ->setStatusCode(Response::HTTP_OK);
    }
}
