<?php

namespace App\Http\Resources\Products;

use App\Http\Resources\StoreResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Categories\CategoryResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'discount' => $this->discount,
            'stock' => $this->stock,
            'image' => $this->image,
            // get specific data from the CategoryResource
            'category' => (new CategoryResource($this->category))->only('id', 'name', 'description'),
            'store' => (new StoreResource($this->store))->only('id', 'name', 'description'),
        ];
    }
}
