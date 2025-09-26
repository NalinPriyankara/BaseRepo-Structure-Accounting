<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaxGroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('tax_group');

        return [
            'description' => 'required|string|max:255',
            'tax' => 'sometimes|boolean',
            'shipping_tax' => 'sometimes|numeric|min:0',
        ];
    }
}
