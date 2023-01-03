<?php

namespace App\Http\Controllers\Purchases;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchases\PurchaseOrder;

class ShowPurchaseOrdersController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Purchases/PurchaseOrders', [
            'purchaseOrders' => PurchaseOrder::all(),
        ]);
    }
}
