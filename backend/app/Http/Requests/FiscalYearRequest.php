<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $id = $this->route('id');

        // Check if it's an update request (PUT or PATCH)
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            // ✅ Updating only 'closed'
            return [
                'closed' => ['required', 'boolean'],
            ];
        }

        // ✅ Adding a new fiscal year (POST)
        return [
            'fiscal_year_from' => [
                'required',
                'date',
                Rule::unique('fiscal_years', 'fiscal_year_from'),
            ],
            'fiscal_year_to' => [
                'required',
                'date',
                'after_or_equal:fiscal_year_from',
                Rule::unique('fiscal_years', 'fiscal_year_to'),
            ],
            'closed' => ['boolean'],
        ];
    }
}
