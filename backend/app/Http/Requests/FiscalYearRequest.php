<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FiscalYearRequest extends FormRequest
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
        $id = $this->route('fiscalyear');
        
        return [
            'fiscal_year_from' => 'required|string|max:255|unique:fiscal_years,fiscal_year_from,' . $id,
            'fiscal_year_to'   => 'required|string|max:255',
        ];
    }
}
