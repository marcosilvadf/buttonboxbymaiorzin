<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInEmailRequest extends FormRequest
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
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O campo de E-mail é obrigatório.',
            'email.email' => 'Insira um endereço de E-mail válido.',
        ];
    }
}
