<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExchangeRateRequest extends FormRequest
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
            'curr_code' => 'exists:currencies,currency_abbreviation',
            'rate_buy' => 'numeric|min:0',
            'rate_sell' => 'numeric|min:0',
            'date' => 'required|date',
        ];
    }
}
