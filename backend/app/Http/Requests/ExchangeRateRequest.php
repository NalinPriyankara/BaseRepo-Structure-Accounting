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
        if ($this->isMethod('post')) {
            return [
                'curr_code' => 'required|string|size:3',
                'rate_buy' => 'required|numeric',
                'rate_sell' => 'required|numeric',
                'date' => 'required|date',
            ];
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            return [
                'curr_code' => 'sometimes|string|size:3',
                'rate_buy' => 'sometimes|numeric',
                'rate_sell' => 'sometimes|numeric',
                'date' => 'sometimes|date',
            ];
        }

        return [];
    }
}
