<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Button Box by Maiorzin')</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <header></header>
    <main>
        @yield('main')
    </main>
    <footer></footer>
</body>
</html>