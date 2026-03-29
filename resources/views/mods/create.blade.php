@extends('layouts.app')

@section('content')
    <x-form-component action="{{route('mods.store')}}" id="loginForm" enctype="multipart/form-data" id="mods-store">
        <h2>Cadastrar Mod</h2>

        <div class="form-group div-input">
            <input type="file" name="image" class="form-control" id="input-image" accept="image/*" required>
            <label for="input-image">Imagem do Mod</label>
        </div>

        <div class="form-group">
            <img id="image-preview" src="#" alt="Preview da imagem" style="display: none; max-width: 100%; height: auto; border-radius: 8px; margin-top: 10px;">
        </div>

        <div class="form-group div-input">
            <input type="text" name="title" class="form-control" id="input-title" required value="{{ old('title') }}" maxlength="255" placeholder=" ">
            <label for="input-title">Título</label>
        </div>            

        <div class="form-group div-input">
            <textarea name="description" class="form-control" id="input-description" cols="30" rows="10" maxlength="2000" placeholder=" " required>{{ old('description') }}</textarea>
            <label for="input-description">Descrição</label>
            <div id="char-count">0 / 2000</div>
        </div>

        <div class="form-group div-input">
            <input type="text" name="mod_version" class="form-control" id="input-mod-version" required value="{{ old('mod_version') }}" maxlength="15" placeholder=" ">
            <label for="input-mod-version">Versão do mod</label>
        </div>
        
        <div class="form-group div-input">            
            <select name="category" id="input-category" class="form-control" required>
                <option selected disabled>Selecione a categoria do mod</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group div-input">            
            <select name="game" id="input-game" class="form-control" required>
                <option selected disabled>Selecione o jogo compatível com o mod</option>
                @foreach ($games as $game)
                    <option value="{{$game->id}}">{{$game->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group div-input">            
            <select name="game_version" id="input-game-version" class="form-control" required>
                <option selected disabled>Selecione a versão do jogo</option>
            </select>
        </div>
        
        @for ($i = 0; $i < 3; $i++)
            <div class="form-group div-input">
                <input type="text" name="txt_link[]" class="form-control" id="input-txt-link-{{$i}}" value="{{ old('txt_link.'.$i) }}" maxlength="255" @if ($i == 0) required placeholder=" " @else placeholder=" " @endif>
                <label for="input-txt-link-{{$i}}">Texto do Link {{ $i + 1 }} Exemplo: {{$textHelpInputLinks[$i]}}</label>
            </div>   

            <div class="form-group div-input">
                <input type="url" name="link[]" class="form-control" id="input-link-{{$i}}" value="{{ old('link.'.$i) }}" maxlength="255" @if ($i == 0) required placeholder=" " @else placeholder=" " @endif>
                <label for="input-link-{{$i}}">URL do Link {{ $i + 1 }}</label>
            </div>   
        @endfor

        <button type="submit" class="btn btn-dark">Cadastrar</button>
    </x-form-component>

    <input type="hidden" id="option-game-versions" value='@json($gameVersions)'>
@endsection

@section('javascript')
    <script src="{{asset('js/form.js')}}?{{config('app.version')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const inputImage = document.getElementById('input-image');
        const preview = document.getElementById('image-preview');

        if (inputImage) {
            inputImage.addEventListener('change', function () {
                const file = this.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
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