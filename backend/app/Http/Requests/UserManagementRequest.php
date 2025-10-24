<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserManagementRequest extends FormRequest
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
        // try several common route parameter names and handle model instance
        $userParam = $this->route('user-management') ?? $this->route('user_management') ?? $this->route('user') ?? $this->route('user-managements');
        $id = null;
        if ($userParam) {
            $id = $userParam instanceof \Illuminate\Database\Eloquent\Model ? $userParam->getKey() : $userParam;
        }

        return [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'epf'        => 'required|string|max:50',
            'telephone'  => 'nullable|string|max:15',
            'address'    => 'nullable|string|max:255',
            'email'      => [
                'required',
                'email',
                'max:255',
                Rule::unique('user_managements', 'email')->ignore($id),
            ],
            'password'   => $this->isMethod('post') ? 'required|string|min:6' : 'sometimes|string|min:6',
            'role'       => 'required',
            'status'     => 'required',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
