<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DebtorsMasterRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'debtor_ref' => 'required|string|max:30',
            'address' => 'nullable|string',
            'gst' => 'nullable|string|max:55',
            'curr_code' => 'required|exists:currencies,currency_abbreviation',
            'sales_type' => 'required|exists:sales_types,id',
            'dimension_id' => 'nullable|integer|min:0',
            'dimension2_id' => 'nullable|integer|min:0',
            'credit_status' => 'nullable|exists:credit_status_setups,id',
            'payment_terms' => 'nullable|exists:payment_terms,terms_indicator',
            'discount' => 'nullable|numeric|min:0',
            'pymt_discount' => 'nullable|numeric|min:0',
            'credit_limit' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
            'inactive' => 'boolean',
        ];
    }
}
