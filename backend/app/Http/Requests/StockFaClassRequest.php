<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockFaClassRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // allow all for now
    }

    public function rules(): array
    {
        return [
            'fa_class_id' => 'required|string|max:255',
            'parent_id' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'long_description' => 'required|string',
            'depreciation_rate' => 'required|numeric|min:0',
            'inactive' => 'required|boolean',
        ];
    }
}
