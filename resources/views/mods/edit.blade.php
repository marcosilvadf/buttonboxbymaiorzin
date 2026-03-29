@extends('layouts.app')

@section('content')
    <x-form-component action="{{ route('mods.update', $mod->id) }}" method="PATCH" enctype="multipart/form-data" id="loginForm" id="mods-store">
        <h2>Cadastrar Mod</h2>

        <div class="form-group div-input">
            <input accept="image/*" class="form-control" id="input-image" name="image" type="file">
            <label for="input-image">Imagem do Mod</label>
        </div>

        <div class="form-group">
            <img alt="Preview da imagem" id="image-preview" src="{{ asset('storage/' . $mod->images->first()->link) }}" style="max-width: 100%; height: auto; border-radius: 8px; margin-top: 10px;">
        </div>

        <div class="form-group div-input">
            <input class="form-control" id="input-title" maxlength="255" name="title" placeholder=" " required type="text" value="{{ $mod->title }}">
            <label for="input-title">Título</label>
        </div>

        <div class="form-group div-input">
            <textarea class="form-control" cols="30" id="input-description" maxlength="2000" name="description" placeholder=" " required rows="10">{{ $mod->description }}</textarea>
            <label for="input-description">Descrição</label>
            <div id="char-count">0 / 2000</div>
        </div>

        <div class="form-group div-input">
            <input class="form-control" id="input-mod-version" maxlength="15" name="mod_version" placeholder=" " required type="text" value="{{ $mod->version }}">
            <label for="input-mod-version">Versão do mod</label>
        </div>

        <div class="form-group div-input">
            <select class="form-control" id="input-category" name="category" required>
                @foreach ($categories as $category)
                    <option @if ($category->id == $mod->category_mod_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group div-input">
            <select class="form-control" id="input-game" name="game" required>
                @foreach ($games as $game)
                    <option @if ($game->id == $mod->game_mod_id) selected @endif value="{{ $game->id }}">{{ $game->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group div-input">
            <select class="form-control" id="input-game-version" name="game_version" required>
                @foreach ($gameVersionGameSelected as $version)
                    <option @if ($version->id == $mod->game_version_mod_id) selected @endif value="{{ $version->id }}">{{ $version->version }}</option>
                @endforeach
            </select>
        </div>

        @for ($i = 0; $i < 3; $i++)
            @php
                $link = $mod->links[$i] ?? null;
            @endphp

            <div class="form-group div-input">
                <input @if ($i == 0) required @endif class="form-control" id="input-txt-link-{{ $i }}" maxlength="255" name="txt_link[]" placeholder=" " type="text" value="{{ $link->description ?? '' }}">
                <label for="input-txt-link-{{ $i }}">
                    Texto do Link {{ $i + 1 }} Exemplo: {{ $textHelpInputLinks[$i] }}
                </label>
            </div>

            <div class="form-group div-input">
                <input @if ($i == 0) required @endif class="form-control" id="input-link-{{ $i }}" maxlength="255" name="link[]" placeholder=" " type="url" value="{{ $link->link ?? '' }}">
                <label for="input-link-{{ $i }}">
                    URL do Link {{ $i + 1 }}
                </label>
            </div>
        @endfor

        <button class="btn btn-dark" type="submit">Editar</button>
    </x-form-component>

    <input id="option-game-versions" type="hidden" value='@json($gameVersions)'>
@endsection

@section('javascript')
    <script src="{{ asset('js/form.js') }}?{{ config('app.version') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputImage = document.getElementById('input-image');
            const preview = document.getElementById('image-preview');

            if (inputImage) {
                inputImage.addEventListener('change', function() {
                    const file = this.files[0];

                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                        }

                        reader.readAsDataURL(file);
                    } else {
                        preview.style.display = 'none';
                    }
                });
            }
        });
    </script>
@endsection
