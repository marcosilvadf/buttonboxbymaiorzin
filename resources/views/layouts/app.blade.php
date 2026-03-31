<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>@yield('title', 'Button Box para ETS2 | Painel para Euro Truck Simulator 2')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/style.css') }}?{{ config('app.version') }}" rel="stylesheet">
    <link href="{{ asset('icon/favicon.ico') }}?{{ config('app.version') }}" rel="shortcut icon" type="image/x-icon">
    <meta content="{{ csrf_token() }}" name="csrf-token">
    @hasSection('meta')
        @yield('meta')
    @else
        <meta content="Use um dashboard e button box para ETS2 no celular ou PC. Veja velocidade, combustível, marcha e outras informações do caminhão em tempo real." name="description">
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="ie=edge" http-equiv="X-UA-Compatible">

        <meta content="Dashboard / Button Box Android para ETS2" property="og:title">
        <meta content="Dashboard / Button Box Android para ETS2" name="twitter:title">

        <meta content="Esse app permite transformar seu celular em um Button Box para o ETS2" property="og:description">
        <meta content="Esse app permite transformar seu celular em um Button Box para o ETS2" name="twitter:description">

        <meta content="{{ config('app.url') . asset('/icon/android-chrome-192x192.png') }}?{{ config('app.app_version') }}" property="og:image">
        <meta content="{{ config('app.url') . asset('/icon/android-chrome-192x192.png') }}?{{ config('app.app_version') }}" name="twitter:image">

        <meta content="{{ url()->current() }}" property="og:url">
        <meta content="website" property="og:type">
        <link href="{{ url()->current() }}" rel="canonical">

        <meta content="summary" name="twitter:card">
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

    <section class="mx-5 content">
        @yield('content')
    </section>

    <footer>
        <footer class="footer-custom mt-5">

            <div class="footer-content">

                <!-- logo / nome -->
                <div class="footer-brand">
                    <h4>Button Box by Maiorzin</h4>
                    <p>Dashboard e Button Box para Euro Truck Simulator 2</p>
                </div>

                <!-- links -->
                <div class="footer-links">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="{{ route('privacypolicy') }}">Política de Privacidade</a></li>
                        <li><a href="{{ route('terms') }}">Termos de Uso</a></li>
                    </ul>
                </div>

                <!-- redes sociais -->
                <div class="footer-social">
                    <h5>Redes Sociais</h5>
                    <a class="social-link" href="https://instagram.com/maiorzin" target="_blank">
                        Instagram
                    </a>
                </div>

            </div>

            <div class="footer-bottom">
                <p>© {{ date('Y') }} Button Box by Maiorzin - Todos os direitos reservados</p>
            </div>

        </footer>

    </footer>

    <div class="cookie-hidden" id="cookie-consent">
        <div class="cookie-box">
            <p>
                Este site usa cookies para melhorar sua experiência. Ao continuar navegando, você concorda com isso.
            </p>
            <button onclick="acceptCookies()">Aceitar</button>
        </div>
    </div>

    <div class="alert-hidden" id="custom-alert">
        <div class="alert-box">
            <div class="alert-icon" id="alert-icon"></div>
            <h2 id="alert-title"></h2>
            <p id="alert-message"></p>
            <button onclick="confirmAlert()">OK</button>
            <button onclick="closeAlert()">Cancelar</button>
        </div>
    </div>
    <script src="{{ asset('js/alert.js') }}?{{ config('app.version') }}"></script>
    <script src="{{ asset('js/cookie.js') }}?{{ config('app.version') }}"></script>
    @yield('javascript')
</body>

</html>
