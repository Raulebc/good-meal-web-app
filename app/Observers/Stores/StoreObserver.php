<?php

namespace App\Observers\Stores;

use App\Models\Stores\Store;

class StoreObserver
{
    /**
     * Handle the Store "created" event.
     *
     * @param  \App\Models\Stores\Store  $store
     * @return void
     */
    public function creating(Store $store)
    {
        $store->has_stock = $store->countInStockProducts();
    }

    /**
     * Handle the Store "updated" event.
     *
     * @param  \App\Models\Stores\Store  $store
     * @return void
     */
    public function updating(Store $store)
    {
        $store->has_stock = $store->countInStockProducts();
    }

    /**
     * Handle the Store "deleted" event.
     *
     * @param  \App\Models\Stores\Store  $store
     * @return void
     */
    public function deleting(Store $store)
    {
        $store->has_stock = $store->countInStockProducts();
    }
}
