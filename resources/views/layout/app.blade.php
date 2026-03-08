<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta name="description" content="@yield('description', 'Use um dashboard e button box para ETS2 no celular ou PC. Veja velocidade, combustível, marcha e outras informações do caminhão em tempo real.')">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta property="og:title" content="Dashboard / Button Box Android para ETS2">
    <meta name="twitter:title" content="Dashboard / Button Box Android para ETS2">

    <meta property="og:description" content="Esse app permite transformar seu celular em um Button Box para o ETS2">
    <meta name="twitter:description" content="Esse app permite transformar seu celular em um Button Box para o ETS2">

    <meta property="og:image" content="{{asset('images/icon/logotod192.png')}}?{{config('app.app_version')}}">
    <meta name="twitter:image" content="{{asset('images/icon/logotod192.png')}}?{{config('app.app_version')}}">

    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">
    <link rel="canonical" href="{{ url()->current() }}">    

    <meta name="twitter:card" content="summary">
    
    <link rel="icon" href="{{asset('images/icon/logotod16.jpg')}}?{{config('app.app_version')}}" sizes="16x16" type="image/jpg">
    <link rel="icon" href="{{asset('images/icon/logotod32.jpg')}}?{{config('app.app_version')}}" sizes="32x32" type="image/jpg">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('css')
</head>
<body>
    <div class="container">
        <div class="mt-5 row align-items-center justify-content-start" style="cursor: pointer" onclick="window.location.href = '/'">
            <div class="col-sm-1 col-lg-1">
                <img class="img-fluid rounded" style="width: 50px" src="{{asset('images/icon/logotod192.png')}}?{{config('app.app_version')}}" alt="">
            </div>
            <span class="col-sm-9 col-lg-3 h1">Button Box</span>
        </div>
        <hr>
    </div>
    @yield('content_body')

    <footer class="row justify-content-center m-0">
       <hr class="col-10 mt-4">
       <div class="col-10 d-flex justify-content-center m-0">
            <a href="https://www.youtube.com/@maiorzin" target="_blank" title="Youtube" class="h3"><i class="fa-brands fa-youtube"></i></a>
            <a href="https://www.instagram.com/maiorzin" target="_blank" title="Instagram" class="h3 mx-3"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://discord.gg/GrxzDY8CX3" target="_blank" title="Discord" class="h3"><i class="fa-brands fa-discord"></i></a>
       </div>

       <div class="col-10 d-flex justify-content-center m-0">
            <span><i class="fa-regular fa-copyright"></i> Copyright 2025</span>
            <span>&nbsp; - &nbsp;</span>
            <a href="/politicadeprivacidade"> Política de privacidade</a>
       </div>
    </footer>

    @yield('js')
    <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
</body>
</html>