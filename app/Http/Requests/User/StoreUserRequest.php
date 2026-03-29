<?php

namespace App\Http\Requests\User;
use Illuminate\Validation\Rules;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'unique:users,name', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'first_name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'last_name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome de usuário é obrigatório.',
            'name.unique' => 'Este nome de usuário já está em uso.',
            'name.max' => 'O nome de usuário deve ter no máximo :max caracteres.',

            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            'email.max' => 'O e-mail deve ter no máximo :max caracteres.',

            'first_name.required' => 'O nome é obrigatório.',
            'first_name.max' => 'O nome deve ter no máximo :max caracteres.',
            'first_name.regex' => 'O nome deve conter apenas letras e espaços.',

            'last_name.required' => 'O sobrenome é obrigatório.',
            'last_name.max' => 'O sobrenome deve ter no máximo :max caracteres.',
            'last_name.regex' => 'O sobrenome deve conter apenas letras e espaços.',

            'password.required' => 'A senha é obrigatória.',
            'password.confirmed' => 'As senhas não coincidem.',
        ];
    }
    
    public function attributes(): array
    {
        return [
            'name' => 'nome de usuário',
            'email' => 'e-mail',
            'first_name' => 'nome',
            'last_name' => 'sobrenome',
            'password' => 'senha',
        ];
    }
}
