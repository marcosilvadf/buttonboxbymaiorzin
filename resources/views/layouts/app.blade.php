<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Button Box para ETS2 | Painel para Euro Truck Simulator 2')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('css/style.css')}}?{{config('app.version')}}">
    <link rel="shortcut icon" href="{{asset('icon/favicon.ico')}}?{{config('app.version')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @hasSection('meta')
        @yield('meta')
    @else
        <meta name="description" content="Use um dashboard e button box para ETS2 no celular ou PC. Veja velocidade, combustível, marcha e outras informações do caminhão em tempo real.">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta property="og:title" content="Dashboard / Button Box Android para ETS2">
        <meta name="twitter:title" content="Dashboard / Button Box Android para ETS2">

        <meta property="og:description" content="Esse app permite transformar seu celular em um Button Box para o ETS2">
        <meta name="twitter:description" content="Esse app permite transformar seu celular em um Button Box para o ETS2">

        <meta property="og:image" content="{{config('app.url') . asset('/icon/android-chrome-192x192.png')}}?{{config('app.app_version')}}">
        <meta name="twitter:image" content="{{config('app.url') . asset('/icon/android-chrome-192x192.png')}}?{{config('app.app_version')}}">

        <meta property="og:url" content="{{url()->current()}}">
        <meta property="og:type" content="website">
        <link rel="canonical" href="{{ url()->current() }}">    

        <meta name="twitter:card" content="summary">
    @endif
</head>
<body>    
    <x-menu-component>
    </x-menu-component>
    
    <div class="mx-3">
        @if (session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: black !important">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <section class="mx-5">
        @yield('content')
    </section>

    <footer>

    </footer>

    <div id="custom-alert" class="alert-hidden">
        <div class="alert-box">
            <div class="alert-icon" id="alert-icon"></div>
            <h2 id="alert-title"></h2>
            <p id="alert-message"></p>
            <button onclick="confirmAlert()">OK</button>
            <button onclick="closeAlert()">Cancelar</button>
        </div>
    </div>
    <script src="{{asset('js/alert.js')}}?{{config('app.version')}}"></script>
    @yield('javascript')
</body>
</html>