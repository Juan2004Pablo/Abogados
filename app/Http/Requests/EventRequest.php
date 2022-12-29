<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'participants' => ['nullable', 'string', 'min:5', 'max:250'],
            'date' => ['required', 'date'],
            'start' => ['nullable', 'string'],
            'finish' => ['nullable', 'string'],
            'location' => ['nullable', 'string', 'min:5', 'max:250'],
            'description' => ['nullable', 'string', 'min:5', 'max:5000'],
        ];
    }
}
