<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BomRequest extends FormRequest
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
            'parent' => 'required|string|exists:stock_master,stock_id',
            'component' => 'required|string|exists:stock_master,stock_id',
            'work_centre' => 'required|integer|exists:work_centres,id',
            'loc_code' => 'required|string|exists:inventory_locations,loc_code',
            'quantity' => 'required|numeric',
        ];
    }
}
