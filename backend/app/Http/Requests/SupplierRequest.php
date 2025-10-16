<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'supp_name' => 'required|string|max:60',
            'supp_short_name' => 'required|string|max:30',
            'gst_no' => 'nullable|string|max:25',
            'website' => 'nullable|string|max:100',
            'curr_code' => 'nullable|exists:currencies,currency_abbreviation',
            'tax_group' => 'nullable|exists:tax_groups,id',
            'supp_account_no' => 'nullable|string|max:40',
            'bank_account' => 'nullable|string|max:60',
            'credit_limit' => 'numeric|min:0',
            'payment_terms' => 'nullable|exists:payment_terms,terms_indicator',
            'tax_included' => 'boolean',
            'payable_account' => 'nullable|exists:chart_master,account_code',
            'purchase_account' => 'nullable|exists:chart_master,account_code',
            'payment_discount_account' => 'nullable|exists:chart_master,account_code',
            'contact' => 'nullable|string|max:60',
            'dimension_id' => 'integer',
            'dimension2_id' => 'integer',
            'mail_address' => 'nullable|string',
            'bill_address' => 'nullable|string',
            'notes' => 'nullable|string',
            'inactive' => 'boolean',
        ];
    }
}
