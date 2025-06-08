<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends StoreRoleRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = parent::rules();

        $rules['name'] = [
            'required',
            'min:3',
            'max:255',
            'string',
            Rule::unique('roles', 'name')->ignore($this->route('role'))
        ];

        return $rules;
    }
}
