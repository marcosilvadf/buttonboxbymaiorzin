@extends('layouts.app')
@section('title', 'Mods para ETS2 e ATS | Download de Mods Euro Truck Simulator 2 e American Truck Simulator')
@section('meta')
    <meta name="description" content="Encontre mods para Euro Truck Simulator 2 e American Truck Simulator. Caminhões, mapas, sons, gráficos e muito mais para melhorar sua experiência no ETS2 e ATS.">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Open Graph --}}
    <meta property="og:title" content="Mods para ETS2 e ATS | Caminhões, Mapas e Muito Mais">
    <meta property="og:description" content="Explore mods para Euro Truck Simulator 2 e American Truck Simulator e personalize seu jogo com novos caminhões, mapas e recursos.">
    <meta property="og:image" content="{{ asset('icon/android-chrome-192x192.png') }}?{{ config('app.app_version') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Mods ETS2 e ATS para Download">
    <meta name="twitter:description" content="Baixe mods para Euro Truck Simulator 2 e American Truck Simulator e deixe seu jogo mais completo.">
    <meta name="twitter:image" content="{{ asset('icon/android-chrome-192x192.png') }}?{{ config('app.app_version') }}">

    <link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')
    <div class="filter-box">
        <input type="text" name="search" class="input-search" id="search-view" placeholder="Buscar por nome..." value="{{ $search ?? '' }}">

        <button onclick="$('#form-filter').submit()" class="btn-search">
            Buscar
        </button>

        <li class="nav-item dropdown" style="list-style: none">

            <a class="nav-link btn-filter text-dark" data-bs-toggle="dropdown" id="btn-filter">
                <i class="fa fa-filter me-1"></i> Filtros
            </a>

            <div class="dropdown-menu dropdown-filter dropdown-menu-end">

                <form method="GET" id="form-filter" action="{{ route('mods.filter') }}" onsubmit="searchFilter()">
                    
                    <input type="hidden" name="search" id="search-input">

                    <div class="mb-2">
                        <label>Categoria</label>
                        <select name="category" id="input-category">
                            <option value="">Todos</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if (isset($categorySelected) && $category->id == $categorySelected) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                        <label>Jogo</label>
                        <select name="game" id="input-game">
                            <option value="">Todos</option>
                            @foreach ($games as $game)
                                <option value="{{ $game->id }}" @if (isset($gameSelected) && $game->id == $gameSelected) selected @endif>{{ $game->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                        <label>Versões</label>
                        <select name="version" id="input-game-version">
                            <option value="">Todas</option>
                        </select>
                    </div>

                    <button class="btn btn-apply mt-2" id="btn-apply">
                        Aplicar filtros
                    </button>

                </form>

            </div>

        </li>

    </div>

    @foreach ($mods as $mod)
        <x-show-mod-component :mod="$mod"></x-show-mod-component>
    @endforeach

    <div class="paginate-custom">
        {{ $mods->links('pagination::bootstrap-5') }}
    </div>

    <input type="hidden" id="option-game-versions" value='@json($gameVersions)'>
    <input type="hidden" id="option-game-version-selected" value='{{ $gameVersionSelected ?? '' }}'>
@endsection

@section('javascript')
    <script>
        const gameSelect = document.getElementById('input-game');
        const versionSelect = document.getElementById('input-game-version');

        const gameVersions = JSON.parse(
            document.getElementById('option-game-versions').value
        );

        document.addEventListener('DOMContentLoaded', function () {
            $('#input-category').on('change', function() {
                changeFilterIcon();
            });
            
            $('#input-game').on('change', function() {
                changeFilterIcon();
            });

            $('#input-game-version').on('change', function() {
                changeFilterIcon();
            });

            updateSelectVersions();

            if($('#option-game-version-selected').val() != '') {
                $('#input-game-version').val($('#option-game-version-selected').val());
            }

            changeFilterIcon();
        });

        function manageFilterIcon() {
            
            if($('#input-category').val() !== '') {
                return true;
            }

            if($('#input-game').val() !== '') {
                return true;
            }

            if($('#input-game-version').val() !== '') {
                return true;
            }

            return false;
        }

        function searchFilter() {
            $('#search-input').val($('#search-view').val());
        }
        
        gameSelect.addEventListener('change', function () {
            updateSelectVersions();
        });

        function updateSelectVersions() {
            const gameId = gameSelect.value;
            versionSelect.innerHTML = '';

            if(gameId != '') {
                const filtered = gameVersions.filter(v => v.game_mod_id == gameId);

                filtered.forEach(version => {
                    const option = document.createElement('option');
                    option.value = version.id;
                    option.textContent = version.version;

                    versionSelect.appendChild(option);
                });
            } else {
                versionSelect.innerHTML = '<option value="" selected>Todas</option>';
            }
        }
        
        function changeFilterIcon() {
            if(manageFilterIcon()) {
                $('#btn-filter').html('<i class="fa-solid fa-filter-circle-xmark me-1"></i> Filtros');
            } else {
                $('#btn-filter').html('<i class="fa fa-filter me-1"></i> Filtros');
            }
        }
    </script>
@endsection