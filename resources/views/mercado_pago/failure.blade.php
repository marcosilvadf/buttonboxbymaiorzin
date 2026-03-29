@extends('layouts.app')

@section('content')
<div class="my-card-xl text-center" style="max-width:700px; margin:40px auto;">

    <div style="font-size:70px; color:#d32f2f;">
        <i class="fa-solid fa-circle-xmark"></i>
    </div>

    <h1 class="mt-3" style="color:#d32f2f;">
        Pagamento Não Aprovado
    </h1>

    <p class="mt-3" style="font-size:18px;">
        ❌ Não foi possível concluir o pagamento do seu <strong>Plano PRO</strong>.
    </p>

    <div class="mt-4 p-4" style="background:#b80817; border-radius:12px;">
        <p class="mb-2">
            O pagamento foi recusado ou cancelado.
        </p>

        <p class="mb-0">
            Você pode tentar novamente ou escolher outro método de pagamento.
        </p>
    </div>

    @if(isset($payment))
        <div class="mt-4 text-start">
            <h5>Detalhes da tentativa:</h5>
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
                    <span>Motivo</span>
                    <strong>
                        {{ $payment->payment_status_description ?? 'Pagamento não autorizado.' }}
                    </strong>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Data da tentativa</span>
                    <strong>{{ $payment->created_at->format('d/m/Y H:i') }}</strong>
                </li>
            </ul>
        </div>
    @endif

    <div class="mt-5 d-flex justify-content-center gap-3 flex-wrap">
        <a href="{{ route('payment') }}" class="btn btn-danger btn-lg">
            Tentar novamente
        </a>

        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-lg">
            Voltar para o perfil
        </a>
    </div>

</div>
@endsection