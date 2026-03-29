@extends('layouts.app')

@section('content')
    <div class="profile">
        <h2>Perfil</h2>
        <span class="h3">{{auth()->user()->name}}</span>
        <span class="h4">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</span>
        <a href="{{ route('mods.manager') }}" class="btn btn-dark my-2">Gerenciar mods</a>
        <a href="{{ route('repport.index') }}" class="btn btn-dark my-2">Reportes</a>
        <div class="mt-2">
            @if ($plan && $plan->user_type_id == 2)
                <span class="fw-bold my-text-secondary">Plano: {{$plan->plan->name}} - Vencimento: {{\Carbon\Carbon::parse($plan->expiration)->format('d/m/Y')}}</span> <br>
                @if (\Carbon\Carbon::parse($plan->expiration)->isPast())
                    <span class="fw-bolder text-danger">Expirou</span> - <a href="{{route('sign.plan')}}">Clique aqui para renovar</a>
                @else                        
                    <span class="fw-bolder text-green">Ativo</span> @if (auth()->user()->expiring_soon) - <a href="{{route('sign.plan')}}">Clique aqui para renovar</a> @endif
                @endif
            @else
                <span class="fw-bold my-text-secondary">Plano: Free - desbloqueie o acesso ao button box - <a href="{{route('plan')}}" class="btn btn-dark">Saiba mais</a></span>
            @endif
        </div>
        <div class="d-flex align-items-center gap-2 mt-2">
            <input 
                type="text" 
                id="codeInput" 
                class="form-control w-auto"
                value="••••••••-••••••••••••••••"
                data-real="{{ auth()->user()->link_code }}-{{ md5(auth()->user()->id) }}"
                readonly
            >

            <button class="btn btn-show-code" onclick="toggleCode()">
                Mostrar
            </button>

            <button class="btn btn-dark" onclick="copyCode()">
                Copiar
            </button>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        let showing = false;

        function toggleCode() {
            const input = document.getElementById('codeInput');
            const btn = event.target;

            if (!showing) {
                input.value = input.dataset.real;
                btn.innerText = 'Ocultar';
            } else {
                input.value = '••••••••-••••••••••••••••';
                btn.innerText = 'Mostrar';
            }

            showing = !showing;
        }

        function copyCode() {
            const input = document.getElementById('codeInput');
            const realCode = input.dataset.real;

            navigator.clipboard.writeText(realCode).then(() => {
                alert('Código copiado!');
            });
        }
    </script>
@endsection