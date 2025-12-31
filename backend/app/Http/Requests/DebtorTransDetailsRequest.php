<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DebtorTransDetailsRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'debtor_trans_no' => 'required|integer|exists:debtor_trans,trans_no',
                'debtor_trans_type' => 'required|integer|exists:debtor_trans,trans_type',
                'stock_id' => 'required|string|exists:stock_master,stock_id',
                'description' => 'nullable|string',
                'unit_price' => 'required|numeric',
                'unit_tax' => 'required|numeric',
                'quantity' => 'required|numeric',
                'discount_percent' => 'required|numeric',
                'standard_cost' => 'required|numeric',
                'qty_done' => 'required|numeric',
                'src_id' => 'required|integer'
            ];
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            return [
                'debtor_trans_no' => 'integer|exists:debtor_trans,trans_no',
                'debtor_trans_type' => 'integer|exists:debtor_trans,trans_type',
                'stock_id' => 'string|exists:stock_master,stock_id',
                'description' => 'nullable|string',
                'unit_price' => 'numeric',
                'unit_tax' => 'numeric',
                'quantity' => 'numeric',
                'discount_percent' => 'numeric',
                'standard_cost' => 'numeric',
                'qty_done' => 'numeric',
                'src_id' => 'integer'
            ];
        }

        return [];
    }
}
