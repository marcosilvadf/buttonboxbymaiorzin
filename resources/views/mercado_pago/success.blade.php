@extends('layouts.app')

@section('content')
<div class="my-card-xl text-center" style="max-width:700px; margin:40px auto;">

    <div style="font-size:70px; color:#2e7d32;">
        <i class="fa-solid fa-circle-check"></i>
    </div>

    <h1 class="mt-3" style="color:#2e7d32;">
        Pagamento Aprovado!
    </h1>

    <p class="mt-3" style="font-size:18px;">
        🎉 Seu <strong>Plano PRO</strong> foi ativado com sucesso.
    </p>

    <div class="mt-4 p-4" style="background:#008a35; border-radius:12px;">
        <p class="mb-2">
            Agora você tem acesso a todos os recursos exclusivos da plataforma.
        </p>

        <p class="mb-0">
            Caso tenha qualquer problema, entre em contato conosco.
        </p>
    </div>

    @if(isset($payment))
        <div class="mt-4 text-start">
            <h5>Detalhes do pagamento:</h5>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between">
                    <span>ID do pagamento</span>
                    <strong>{{ data_get(json_decode($payment?->json), 'id') }}</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Valor</span>
                    <strong>R$ {{ number_format($payment->value, 2, ',', '.') }}</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Data Pagamento</span>
                    <strong>{{ $payment->created_at->format('d/m/Y H:i') }}</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Data Expiração</span>
                    <strong>{{ auth()->user()->expirationUserPlan->expiration->format('d/m/Y') }}</strong>
                </li>
            </ul>
        </div>
    @endif

    <div class="mt-5">
        <a href="{{ route('dashboard') }}" class="btn btn-success btn-lg">
            Ir para meu perfil
        </a>
    </div>

</div>
@endsection