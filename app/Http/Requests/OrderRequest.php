<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products'],
            'stock' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
