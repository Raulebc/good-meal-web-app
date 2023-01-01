<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Products\Product;
use App\Http\Controllers\Controller;

class DeleteProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Product $product)
    {
         if (request()->user()->isNotOwnerOf($product)) {
            return response()->json([
                'error' => 'No estas autorizado para realizar esta acción.'
            ], Response::HTTP_FORBIDDEN);
        }

        $product->delete();

        return response()->json([
            'message' => 'Producto eliminado correctamente'
        ], Response::HTTP_OK);
    }
}
