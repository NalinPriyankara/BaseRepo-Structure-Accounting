<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierContactRequest extends FormRequest
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
        return [
            'supplier_id' => 'required|exists:suppliers,supplier_id',
            'short_name' => 'required|string|max:30',
            'name' => 'required|string|max:60',
            'name2' => 'nullable|string|max:60',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:30',
            'phone2' => 'nullable|string|max:30',
            'fax' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:100',
            'lang' => 'nullable|string|max:10',
            'notes' => 'required|string',
            'inactive' => 'boolean',
        ];
    }
}
