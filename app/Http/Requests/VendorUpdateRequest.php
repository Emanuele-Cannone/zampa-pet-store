<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorUpdateRequest extends FormRequest
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
            'company_name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'postal_code' => ['required', 'string'],
            'country' => ['required', 'string'],
            'fiscal_code' => ['required', 'string'],
            'p_iva' => ['required', 'string'],
            'iban' => ['nullable', 'string'],
            'email' => ['required', 'email'],
            'pec' => ['nullable', 'email'],
            'telephone' => ['nullable', 'string'],
            'other_contact' => ['nullable', 'string'],
        ];
    }
}
