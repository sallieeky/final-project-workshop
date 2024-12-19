<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'warehouse_id' => ['required'],
            'product_id' => ['required'],
            'stock' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
