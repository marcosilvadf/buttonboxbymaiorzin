@extends('layouts.app')

@section('title', 'Painél personalizado para button box: ' . $panel->name)

@section('meta')
    <meta name="description" content="{{ $panel->description }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Open Graph --}}
    <meta property="og:title" content="Painél personalizado para button box: {{ $panel->name }}">
    <meta property="og:description" content="{{ $panel->description }}">
    <meta property="og:image" content="{{ config('app.url') . asset($panel->image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Painél personalizado para button box: {{ $panel->name }}">
    <meta name="twitter:description" content="{{ $panel->description }}">
    <meta name="twitter:image" content="{{ config('app.url') . asset($panel->image) }}">

    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <img
            src="{{ asset($panel->image) }}"
            alt="{{ $panel->name }}"
            class="img-fluid rounded shadow"
        >
    </div>

    <div class="col-md-6">
        <h1>{{ $panel->name }}</h1>

        <p class="mt-3">
            {{ $panel->description }}
        </p>

        @if ($panel->id != 3)
            <div class="alert alert-warning">
                Exclusivo para assinantes Pro.
            </div>
        @endif

        @if(auth()->check() && auth()->user()->is_pro)
            @if ($current)
                <a
                class="btn btn-emphasis btn-lg">
                    Você já está utilizando esse painél
                </a>
            @else
                <a href="{{ route('panel.select', $panel->id) }}"
                class="btn btn-emphasis btn-lg"
                onclick="this.classList.add('disabled'); this.style.pointerEvents='none'; this.innerText='Carregando...';">
                    Usar este painel
                </a>
            @endif
        @else
            @if ($panel->id != 3)
                <button class="btn btn-secondary btn-lg" disabled>
                    Disponível apenas para usuários Pro, se você é pro, faça login
                </button>

                <div class="mt-3">
                    <a href="{{ route('plan') }}" class="btn btn-warning">
                        Tornar-se Pro
                    </a>
                </div>
            @else
                <p class="btn btn-emphasis">Padrão para quem não criou conta ou não é pro</p>
            @endif
        @endif
    </div>
</div>
@endsection

@section('javascript')

@endsection