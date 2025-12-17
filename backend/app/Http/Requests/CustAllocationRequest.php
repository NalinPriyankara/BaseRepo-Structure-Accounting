<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustAllocationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // handle auth elsewhere if needed
    }

    public function rules(): array
    {
        return [
            'person_id' => [
                'nullable',
                'integer',
                'exists:debtors_master,debtor_no',
            ],

            'amt' => [
                'nullable',
                'numeric',
                'min:0.01',
            ],

            'date_alloc' => [
                'required',
                'date',
            ],

            'trans_no_from' => [
                'nullable',
                'integer',
                'exists:debtor_trans,trans_no',
            ],

            'trans_type_from' => [
                'nullable',
                'integer',
                'exists:debtor_trans,trans_type',
            ],

            'trans_no_to' => [
                'nullable',
                'integer',
                'exists:sales_orders,order_no',
            ],

            'trans_type_to' => [
                'nullable',
                'integer',
                'exists:sales_orders,trans_type',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'person_id.exists' => 'Selected customer does not exist.',
            'amt.min' => 'Allocated amount must be greater than zero.',
            'date_alloc.required' => 'Allocation date is required.',
            'trans_no_from.exists' => 'Source transaction not found.',
            'trans_no_to.exists' => 'Target transaction not found.',
        ];
    }
}
