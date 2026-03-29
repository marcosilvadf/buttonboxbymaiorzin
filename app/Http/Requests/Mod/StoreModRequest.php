<?php

namespace App\Http\Requests\Mod;

use Illuminate\Foundation\Http\FormRequest;

class StoreModRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'mod_version' => ['required', 'string', 'max:15'],

            'category' => ['required', 'exists:category_mods,id'],
            'game' => ['required', 'exists:game_mods,id'],
            'game_version' => ['required', 'string', 'exists:game_version_mods,id', 'max:50'],

            // LINKS
            'txt_link' => ['required', 'array', 'max:3'],
            'txt_link.0' => ['required', 'string', 'max:255'],
            'txt_link.1' => ['nullable', 'string', 'max:255'],
            'txt_link.2' => ['nullable', 'string', 'max:255'],

            'link' => ['required', 'array', 'max:3'],
            'link.0' => ['required', 'url', 'max:255'],
            'link.1' => ['nullable', 'url', 'max:255'],
            'link.2' => ['nullable', 'url', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'A imagem do mod é obrigatória.',
            'image.image' => 'O arquivo deve ser uma imagem válida.',
            'image.mimes' => 'A imagem deve estar nos formatos: jpg, jpeg, png ou webp.',
            'image.max' => 'A imagem deve ter no máximo 2MB.',
            'title.required' => 'O título é obrigatório.',
            'title.max' => 'O título deve ter no máximo 255 caracteres.',

            'description.max' => 'A descrição deve ter no máximo 2000 caracteres.',

            'mod_version.required' => 'A versão do mod é obrigatória.',
            'mod_version.max' => 'A versão deve ter no máximo 15 caracteres.',

            'category.required' => 'Selecione uma categoria.',
            'category.exists' => 'Categoria inválida.',

            'game.required' => 'Selecione um jogo.',
            'game.exists' => 'Jogo inválido.',

            'game_version.required' => 'Selecione a versão do jogo.',

            'txt_link.required' => 'Informe pelo menos um link.',
            'txt_link.0.required' => 'O texto do primeiro link é obrigatório.',

            'link.required' => 'Informe pelo menos uma URL.',
            'link.0.required' => 'A URL do primeiro link é obrigatória.',
            'link.*.url' => 'Informe uma URL válida (ex: https://site.com).',
        ];
    }
    
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $links = $this->link;
            $texts = $this->txt_link;

            foreach ($links as $i => $link) {
                if ($link && empty($texts[$i])) {
                    $validator->errors()->add("txt_link.$i", "O texto do link ".($i+1)." é obrigatório quando a URL é informada.");
                }

                if (!empty($texts[$i]) && empty($link)) {
                    $validator->errors()->add("link.$i", "A URL do link ".($i+1)." é obrigatória quando o texto é informado.");
                }
            }
        });
    }
}
