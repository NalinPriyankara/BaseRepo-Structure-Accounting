<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChartTypeRequest extends FormRequest
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
            'id'       => 'required|string|max:10|unique:chart_types,id,' . $this->route('id'),
            'name'     => 'required|string|max:60',
            'class_id' => 'required|string|exists:chart_class,cid',
            'parent'   => 'nullable|string|max:10',
            'inactive' => 'boolean',
        ];
    }
}
