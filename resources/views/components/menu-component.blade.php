<header class="soft-header shadow-sm">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand fw-bold" href="/">
                <img class="rounded" src="{{asset('icon/favicon-32x32.png')}}" alt="">
                {{config('app.name')}}
            </a>

            <!-- Mobile button -->
            <button class="navbar-toggler border-0" data-bs-target="#navbarMenu" data-bs-toggle="collapse" type="button">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarMenu">

                <ul class="navbar-nav ms-auto align-items-lg-center gap-2">

                    <li class="nav-item">
                        <a class="nav-link {{active('index')}}" href="/">
                            <i class="fa fa-home me-1"></i> Início
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{active(['panel', 'panel.*'])}}" href="{{ route('panel.index') }}">
                            <i class="fa-solid fa-layer-group"></i></i> Painéis
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{active('mods.*')}}" href="{{ route('mods.index') }}">
                            <i class="fa fa-box me-1"></i> Mods
                        </a>
                    </li>

                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{active(['login', 'register', 'password.*', 'dashboard', 'profile', 'profile.*', 'payment'])}}" data-bs-toggle="dropdown" href="#">
                            <i class="fa fa-user me-1"></i> Conta
                        </a>
                        <ul class="dropdown-menu shadow border-0 rounded-3">
                            @guest
                                <li>
                                    <a class="dropdown-item" href="{{route('login')}}">
                                        <i class="fa fa-user-circle me-2"></i> Login
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('register')}}">
                                        <i class="fa fa-user-circle me-2"></i> Cadastrar
                                    </a>
                                </li>                                
                            @else
                                <li>
                                    <a class="dropdown-item" href="{{route('dashboard')}}">
                                        <i class="fa fa-user-circle me-2"></i> Perfil
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('payment')}}">
                                        <i class="fa-solid fa-table-list"></i></i> Pagamentos
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('profile.config')}}">
                                        <i class="fa fa-cog me-2"></i> Configurações
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" style="background: none !important">
                                        @csrf
                                        <button class="dropdown-item text-danger">
                                            <i class="fa fa-sign-out-alt me-2"></i> Sair
                                        </button>
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="btn nav-link active rounded-pill px-3 ms-lg-2" href="{{ route('plan') }}">
                            <i class="fa-solid fa-file-invoice-dollar"></i> Plano PRO R$ 5,99
                        </a>
                    </li>

                </ul>

            </div>

        </div>
    </nav>
</header>
