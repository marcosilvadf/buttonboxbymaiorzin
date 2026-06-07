@extends('layouts.app')

@section('title', 'Painéis para Dashboard e Button Box')

@section('meta')
    <meta name="description" content="Escolha painéis de caminhões para utilizar no Dashboard e Button Box. Personalize seu setup com diferentes modelos inspirados em caminhões reais.">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Open Graph --}}
    <meta property="og:title" content="Painéis de Caminhões para Dashboard e Button Box">
    <meta property="og:description" content="Selecione o painel ideal para seu Dashboard e Button Box e torne sua experiência de simulação mais imersiva.">
    <meta property="og:image" content="{{ config('app.url') . asset('icon/android-chrome-192x192.png') }}?{{ config('app.app_version') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Painéis de Caminhões para Dashboard e Button Box">
    <meta name="twitter:description" content="Escolha entre diversos painéis de caminhões para utilizar em seu Dashboard e Button Box.">
    <meta name="twitter:image" content="{{ config('app.url') . asset('icon/android-chrome-192x192.png') }}?{{ config('app.app_version') }}">

    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')
    <title>Painéis para Dashboard e Button Box | Maiorzin</title>

    <h1 class="mb-4">Painéis para Dashboard e Button Box</h1>

    <p class="mb-5">
        Transforme seu Dashboard e Button Box com painéis exclusivos inspirados nos caminhões
        mais populares das estradas, ou até com temas específicos. Tenha uma experiência mais
        realista e organizada durante suas viagens, com visual personalizado e integração completa
        com o aplicativo.
        <strong>Disponível exclusivamente para assinantes Pro.</strong>
    </p>

    <div class="row">
        @forelse($panels as $panel)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <a href="{{ route('panel.preview', ['panel' => $panel->id, 'name' => Str::slug($panel->name)]) }}"
                class="text-decoration-none text-reset">
                    <div class="card h-100 shadow-sm">
                        <img
                            src="{{ asset($panel->image) }}"
                            class="card-img-top"
                            alt="{{ $panel->name }}"
                            loading="lazy"
                        >

                        <div class="card-body">
                            <h5 class="card-title mb-0">
                                {{ $panel->name }}
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Nenhum painel disponível.
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $panels->links() }}
    </div>
@endsection

@section('javascript')

@endsection