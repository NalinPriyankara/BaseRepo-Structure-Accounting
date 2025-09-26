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
            'supplier_name' => 'required|string|max:255',
            'supplier_short_name' => 'nullable|string|max:255',
            'gst_number' => 'nullable|string|max:50',
            'website' => 'nullable|string|max:255',
            'supplier_currency' => 'nullable|string|max:10',
            'tax_group' => 'nullable|string|max:100',
            'our_customer_no' => 'nullable|string|max:50',
            'bank_account' => 'nullable|string|max:100',
            'bank_name' => 'nullable|string|max:255',
            'credit_limit' => 'nullable|numeric',
            'payment_terms' => 'nullable|string|max:100',
            'prices_include_tax' => 'boolean',
            'accounts_payable' => 'nullable|string|max:255',
            'purchase_account' => 'nullable|string|max:255',
            'purchase_discount_account' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'secondary_phone' => 'nullable|string|max:50',
            'fax' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'document_language' => 'nullable|string|max:50',
            'mailing_address' => 'nullable|string',
            'physical_address' => 'nullable|string',
            'general_notes' => 'nullable|string',
        ];
    }
}
