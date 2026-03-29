@extends('layouts.app')

@section('content')
<div class="my-card-xl text-center" style="max-width:700px; margin:40px auto;">

    <div style="font-size:70px; color:#f9a825;">
        <i class="fa-solid fa-hourglass-half"></i>
    </div>

    <h1 class="mt-3" style="color:#f9a825;">
        Pagamento em Processamento
    </h1>

    <p class="mt-3" style="font-size:18px;">
        ⏳ Seu pagamento está <strong>pendente de confirmação</strong>.
    </p>

    <div class="mt-4 p-4" style="background:#fff3cd; border-radius:12px;">
        <p class="mb-2">
            O <strong>Mercado Pago</strong> ainda está processando sua transação.
        </p>

        <p class="mb-0">
            Assim que o pagamento for aprovado, seu Plano PRO será ativado automaticamente.
        </p>
    </div>

    @if(isset($payment))
        <div class="mt-4 text-start">
            <h5>Detalhes do pagamento:</h5>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between">
                    <span>ID do pagamento</span>
                    <strong>{{ data_get(json_decode($payment?->json), 'id') ?? '—' }}</strong>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Valor</span>
                    <strong>R$ {{ number_format($payment->value, 2, ',', '.') }}</strong>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Status</span>
                    <strong>{{ $payment->payment_status_description ?? 'Em processamento' }}</strong>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Data da solicitação</span>
                    <strong>{{ $payment->created_at->format('d/m/Y H:i') }}</strong>
                </li>
            </ul>
        </div>
    @endif

    <div class="mt-5">
        <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg">
            Voltar para meu perfil
        </a>
    </div>

</div>
@endsection