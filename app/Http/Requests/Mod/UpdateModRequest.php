<?php

namespace App\Http\Requests\Mod;

use Illuminate\Foundation\Http\FormRequest;

class UpdateModRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // policy já protege
    }

    public function rules(): array
    {
        return [
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'mod_version' => ['required', 'string', 'max:15'],

            'category' => ['required', 'exists:category_mods,id'],
            'game' => ['required', 'exists:game_mods,id'],
            'game_version' => ['required', 'exists:game_version_mods,id'],

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
        return (new StoreModRequest)->messages();
    }

    public function withValidator($validator)
    {
        (new StoreModRequest)->withValidator($validator);
    }
}
