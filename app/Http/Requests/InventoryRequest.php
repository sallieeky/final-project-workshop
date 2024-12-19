<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'warehouse_id' => ['required', 'exists:warehouses'],
            'product_id' => ['required', 'exists:products'],
            'stock' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
