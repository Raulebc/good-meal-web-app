<?php

namespace App\Http\Controllers;

use App\Models\Stores\Store;
use Illuminate\Http\Response;
use App\Services\Sanitization;
use App\Http\Resources\StoreResource;
use App\Traits\Stores\PaginationTrait;
use App\Http\Requests\UpdateStoreRequest;
use App\Http\Requests\Stores\StoreIndexRequest;
use App\Http\Requests\Stores\StoreStoreRequest;

class StoreController extends Controller
{
    use PaginationTrait;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StoreIndexRequest $request)
    {
        $stores = $this->paginate($request, Store::query());

        return StoreResource::collection($stores);
    }

    /**
     * Store a newly created resource in storage.
     * - Validate input using StoreStoreRequest class
     * - Sanitize input using $request->input method and Sanitization class
     * - Create new store model and save to database
     * - Return response with `message` and `store` data
     *
     * @param  \App\Http\Requests\StoreStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoreRequest $request)
    {
        $sanitizedData = $request->input(null, function ($storeData) {
            return Sanitization::sanitize(new Store(), $storeData);
        });

        $store = Store::create($sanitizedData);

        return (new StoreResource($store))
                ->additional(['message' => 'Tienda creada correctamente'])
                ->response()
                ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return new StoreResource($store);
    }

    /**
     * Update the specified resource in storage.
     * - Validate input using UpdateStoreRequest class
     * - If user is not owner of store, return error response
     * - Sanitize input using $request->input method and Sanitization class
     * - Update store model and save to database
     * - Return response with `message` and `store` data
     *
     * @param  \App\Http\Requests\UpdateStoreRequest  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        if (request()->user()->isNotOwnerOf($store)) {
            return response()->json([
                'error' => 'No estas autorizado para realizar esta acción.'
            ], Response::HTTP_FORBIDDEN);
        }

        $sanitizedData = $request->input(null, function ($storeData) {
            return Sanitization::sanitize(new Store(), $storeData);
        });

        $store->update($sanitizedData);

        return (new StoreResource($store))
                ->additional(['message' => 'Tienda actualizada correctamente'])
                ->response()
                ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
         if (request()->user()->isNotOwnerOf($store)) {
            return response()->json([
                'error' => 'No estas autorizado para realizar esta acción.'
            ], Response::HTTP_FORBIDDEN);
        }

        $store->delete();

        return response()->json([
            'message' => 'Tienda eliminada correctamente'
        ], Response::HTTP_OK);
    }
}
