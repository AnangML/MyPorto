<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'subject' => ['nullable', 'string', 'max:200'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'website_hp' => ['nullable', 'string', 'max:100'],
        ];
    }

    /**
     * Custom validation messages (bilingual support).
     */
    public function messages(): array
    {
        return [
            'name.required' => __('portfolio.contact.name_required', [], app()->getLocale()) ?: 'Nama wajib diisi.',
            'email.required' => __('portfolio.contact.email_required', [], app()->getLocale()) ?: 'Alamat email wajib diisi.',
            'email.email' => __('portfolio.contact.email_invalid', [], app()->getLocale()) ?: 'Format email tidak valid.',
            'message.required' => __('portfolio.contact.message_required', [], app()->getLocale()) ?: 'Pesan wajib diisi.',
            'message.min' => __('portfolio.contact.message_min', [], app()->getLocale()) ?: 'Pesan minimal terdiri dari 10 karakter.',
        ];
    }
}
