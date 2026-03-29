<?php

namespace App\Http\Requests\Repport;

use Illuminate\Foundation\Http\FormRequest;

class StoreRepportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'message' => ['required', 'string', 'max:255']
        ];
    }

    public function messages(): array
    {
        return [
            'message.required' => 'A mensagem da denúncia é obrigatória.',
            'message.max' => 'A mensagem da denúncia deve ter no máximo 255 caracteres.',
        ];
    }
}
