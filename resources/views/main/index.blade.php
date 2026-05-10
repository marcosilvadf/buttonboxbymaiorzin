@extends('layouts.app')

@section('content')
    <h1>Transforme seu celular em um Button Box para ETS2 Grátis</h1>

    <p>Use seu celular como painel interativo para Euro Truck Simulator 2 e aumente sua imersão no jogo.</p>

    <h2>O que é o Button Box?</h2>

    <p>O button box é um programa que transforma seu dispositivo que tenha navegador em um painel interativo para o jogo Euro Truck Simulator 2</p>

    <div class="profile">
        <h2>Por que usar?</h2>

        <ul>
            <li>Use celular como painel</li>
            <li>Dados em tempo real</li>
            <li>Controle seu PC</li>
            <li>Mais imersão</li>
            <li>Monte seu cockpit</li>
        </ul>
    </div>

    <h2>Gostaria de usar?</h2>

    <div>
        <h3 class="my-text-emphasis">Download</h3>
        <a href="{{ asset('program/ButtonBoxWebMaiorzin.zip') }}">Clique aqui pra baixar e usar</a>
    </div>  

    <div class="profile">
        <h2>Apoie o projeto</h2>

        <ul>
            <li>Remova os anúncios</li>
            <li>E ajude o projeto virando usuário PRO</li>
            <li>R$ 5,99 pré-pago por 30 dias</li>
            <li>Sem assinatura, se não quiser continuar é só não pagar</li>            
        </ul>
    </div>

    <h2>Tutorial</h2>

    <div>
        <h3 class="my-text-emphasis">Assista ao tutorial em vídeo de como baixar e instalar</h3>
    </div> 

    <div class="video-container">
        <iframe src="https://www.youtube.com/embed/gD_sxGTZ5dg?si=F78MrBoGGN3id8nZ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
@endsection