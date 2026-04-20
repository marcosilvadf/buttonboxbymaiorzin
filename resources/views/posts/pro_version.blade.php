@extends('layouts.app')

@section('title', 'Button Box PRO ETS2 | Teste grátis 7 dias sem cartão')

@section('meta')
    <meta name="description" content="Use seu celular como Button Box no Euro Truck Simulator 2. Controle o jogo, monitore RPM e funções em tempo real, mute Discord e gerencie o volume do PC. Teste grátis por 7 dias, sem cartão.">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Open Graph --}}
    <meta property="og:title" content="Button Box PRO para ETS2 - Teste grátis por 7 dias">
    <meta property="og:description" content="Controle o ETS2 pelo celular ou tablet. Telemetria em tempo real, comandos no jogo, controle de Discord e volume do PC. Comece grátis agora.">
    <meta property="og:image" content="{{config('app.url') . asset('icon/android-chrome-192x192.png') }}?{{ config('app.app_version') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Button Box PRO ETS2">
    <meta name="twitter:description" content="Transforme seu celular em um painel completo para ETS2. Controle jogo, Discord e volume do PC. Teste grátis sem cartão.">
    <meta name="twitter:image" content="{{config('app.url') . asset('icon/android-chrome-192x192.png') }}?{{ config('app.app_version') }}">

    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')
    <h1>Button Box PRO para Euro Truck Simulator 2</h1>

    <p>
        <strong>Transforme seu celular, tablet ou outro PC em um painel completo para controlar o jogo e o seu computador.</strong>
    </p>

    <p>
        Comece agora com <span class="my-text-emphasis">7 dias grátis</span> — sem cartão de crédito.
    </p>

    <div class="profile">
        <h3>Teste grátis por 7 dias</h3>

        <p>
            Crie sua conta e tenha acesso completo imediatamente.
            Sem cartão de crédito. Sem compromisso.
        </p>
    </div>

    <hr>

    <h2 class="my-text-emphasis">O que você pode fazer:</h2>

    <ul>
        <li>Controlar funções do jogo em tempo real (faróis, motor, setas, freio e muito mais)</li>
        <li>Monitorar dados do jogo como RPM, velocidade e estados do caminhão</li>
        <li>Controlar o volume do PC e de aplicativos individuais</li>
        <li>Atalhos que você pode usar pra diversas coisas, como mutar o discord ou o mic do discord</li>
        <li>Usar qualquer dispositivo com navegador (celular, tablet ou PC)</li>
    </ul> 

    <div class="profile">
        <h3>Quer testar? A instalação é muito simples</h3>

        <p>
            Caso ainda não tenha uma conta, crie e adicione seu hash de usuário no programa, <a href="{{ route('register') }}">Clique aqui para se registrar</a>
        </p>
        <p>
            Você também precisa baixar o programa e rodar no seu PC, <a href="{{ asset('program/ButtonBoxWebMaiorzin.zip') }}">clique aqui para baixar</a>
        </p>
    </div>

    <div>
        <h3 class="my-text-emphasis">Grátis</h3>
        <p>Oferecemos também a versão grátis, mais simples e é apenas pra android</p>
        <a href="{{ route('version.free') }}">Começar grátis</a>
    </div>

    <h2 class="my-text-emphasis mt-5">Como usar?</h2>

    <p class="my-text-emphasis">
        Assista ao tutorial em vídeo
    </p>

    <div class="video-container">
        <iframe src="https://www.youtube.com/embed/RIQ2RXaF6Cc?si=wG_NI4SR8impLB_K" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>

    <p>Para usar é muito simples, basta fazer o <a href="{{ asset('program/ButtonBoxWebMaiorzin.zip') }}" class="my-text-emphasis">Download clicando aqui</a> do programa no pc, extrai-lo e seguir os passos abaixo:</p>
    
    <p class="my-text-emphasis">Lembre-se de nos campos não colocar espaços antes, nem depois</p>
    
    <p>Caso mostre essa tela:</p>

    <div class="mx-2 mx-md-5 content my-5">
        <img src="{{ asset('images_tutorial/windows-protegeu.jpg') }}" alt="Image do windows protegeu seu computador" style="width: 100%;">
    </div>

    <p>É devido o programa ser pouco conhecido, basta clicar em <span class="fw-bold">Mais informações</span>, <span class="my-text-emphasis mt-5">Atenção, sempre baixe pelo site oficial, que é o site https://buttonbox.maiorzin.com</span>, depois irá mostrar essa tela:</p>
        
    <div class="mx-2 mx-md-5 content my-5">
        <img src="{{ asset('images_tutorial/executar-mesmo-assim.jpg') }}" alt="Image do windows protegeu seu computador" style="width: 100%;">
    </div>
    
    <p>Depois clique em <span class="fw-bold">Executar mesmo assim</span> <span class="my-text-emphasis mt-5">reforço que só posso garantir a segurança de quem baixou no site oficial que é do maiorzin: https://buttonbox.maiorzin.com</span></p>

    <p>Você pode criar um atalho na Área de trabalho, basta clicar com o botão direto em cima do <span class="fw-bold">ButtonBoxWeb.exe</span> e depois deixe o mouse em <span class="fw-bold">Enviar para</span> e depois clique em: <span class="fw-bold">Área de trabalho (criar atalho)</span></p>
    
    <p>Essa é a tela inicial, clique em <span class="fw-bold">configurar</span>, caso seu jogo esteja em outra pasta que não seja padrão, a primeira página que abrirá será a de configuração</p>

    <div class="mx-2 mx-md-5 content my-5">
        <img src="{{ asset('images_tutorial/home-page.jpg') }}" alt="Image do windows protegeu seu computador" style="width: 100%;">
    </div>

    <p>Caso você tenha alterado a pasta do jogo mude em: <span class="fw-bold">Caminho completo do jogo:</span></p>
    
    <p>A parte de sensores terá uma explicação melhor em vídeo tutorial que farei futuramente</p>
    
    <p>Em <span class="fw-bold">Link do seu painel</span> cole o código gerado no seu perfil, lembrando que o <span class="my-text-emphasis">plano PRO</span> libera 7 dias para o teste e configuração do programa</p>
    
    <div class="mx-2 mx-md-5 content my-5">
        <img src="{{ asset('images_tutorial/config-page.jpg') }}" alt="Image do windows protegeu seu computador" style="width: 100%;">
    </div>

    <p>No seu perfil clique em <span class="fw-bold">Copiar</span>, depois irá abrir uma caixa de diálogo em cima, clique em ok e cole no link do seu perfil</p>
    
    <div class="mx-2 mx-md-5 content my-5">
        <img src="{{ asset('images_tutorial/dashboard.jpg') }}" alt="Image do windows protegeu seu computador" style="width: 100%;">
    </div>
    <hr>    
@endsection