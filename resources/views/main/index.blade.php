@extends('layouts.app')

@section('content')
    <h1>Transforme seu celular em um Button Box para ETS2</h1>

    <p>Use seu celular como painel interativo para Euro Truck Simulator 2 e aumente sua imersão no jogo.</p>

    <a href="{{ route('version.free') }}">Usar versão grátis</a><br>
    <a href="{{ route('version.pro') }}">Ver versão PRO</a>

    <h2>O que é o Button Box?</h2>

    <p>O Button Box é um app para Android que transforma seu celular em um painel interativo para simuladores como ETS2.</p>

    <div class="profile">
        <h2>Por que usar?</h2>

        <ul>
            <li>Use celular como painel</li>
            <li>Dados em tempo real</li>
            <li>Mais imersão</li>
            <li>Monte seu cockpit</li>
        </ul>
    </div>

    <h2>Escolha sua versão</h2>

    <div>
        <h3 class="my-text-emphasis">Grátis</h3>
        <p>Funcionalidades básicas para começar</p>
        <a href="{{ route('version.free') }}">Começar grátis</a>
    </div>

    <div>
        <h3 class="my-text-emphasis mt-2">PRO</h3>
        <p>Mais recursos, personalização por apenas <span class="my-text-emphasis">R$ 5,99</span></p>
        <a href="{{ route('version.pro') }}">Ver versão PRO</a>
    </div>
@endsection