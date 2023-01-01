<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'image',
            'category_id' => 'required|exists:categories,id',
            // we ensure that the store_id belongs to a store that belongs to the user
            'store_id' => 'required|exists:stores,id,owner_id,' . $this->user()->id,
        ];
    }

    public function messages()
    {
        return [
            'store_id.exists' => 'La tienda seleccionada no existe o no pertenece al usuario'
        ];
    }
}
