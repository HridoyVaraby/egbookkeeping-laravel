<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\'.-]+$/u'],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20', 'regex:/^[0-9+\s\-\(\)]+$/'],
            'project_type' => ['nullable', 'string', 'max:255', 'in:Monthly Bookkeeping,Catch-Up Bookkeeping,Payroll Services,Tax Preparation,Business Consultation,Other'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.regex' => 'The name format is invalid.',
            'email.dns' => 'The email domain must be valid.',
            'phone.regex' => 'The phone number format is invalid.',
            'message.max' => 'The message must not exceed 5000 characters.',
        ];
    }
}
