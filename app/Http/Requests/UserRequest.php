<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
            'company' => ['required', 'string', 'min:4', 'max:100'],
            'address' => ['required', 'string', 'min:8', 'max:50'],
            'phone' => ['required', 'numeric', 'digits_between:7,10'],
        ];
    }
}
