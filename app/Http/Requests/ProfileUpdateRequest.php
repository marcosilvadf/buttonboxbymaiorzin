<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
        'name' => [
            'required',
            'string',
            'max:255',
            Rule::unique('users', 'name')->ignore($this->user()->id),
        ],
            'first_name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'last_name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome de usuário é obrigatório.',
            'name.unique' => 'Este nome de usuário já está em uso.',
            'name.max' => 'O nome de usuário deve ter no máximo :max caracteres.',

            'first_name.required' => 'O nome é obrigatório.',
            'first_name.max' => 'O nome deve ter no máximo :max caracteres.',
            'first_name.regex' => 'O nome deve conter apenas letras e espaços.',

            'last_name.required' => 'O sobrenome é obrigatório.',
            'last_name.max' => 'O sobrenome deve ter no máximo :max caracteres.',
            'last_name.regex' => 'O sobrenome deve conter apenas letras e espaços.',
        ];
    }
    
    public function attributes(): array
    {
        return [
            'name' => 'nome de usuário',
            'first_name' => 'nome',
            'last_name' => 'sobrenome',
        ];
    }
}
