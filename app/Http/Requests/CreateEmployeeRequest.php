<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'middle_name' => ['required', 'string', 'max:100'],
            'zip_code' => ['required', 'string', 'max:10'],
            'department_id' => ['required', 'exists:departments,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'birth_date' => ['required', 'date'],
            'hired_date' => ['required', 'date'],
        ];
    }
}
