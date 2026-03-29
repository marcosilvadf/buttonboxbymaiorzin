@extends('layouts.app')

@section('description')Conheça os planos do Central Achadinhos e descubra os benefícios do plano Pro para aproveitar mais ofertas, recursos exclusivos e vantagens.@endsection

@section('content')
<div class="my-card-xl" style="text-align:center; padding:40px;">

    <div class="my-card-xl div-emphasis" style="text-align:center; padding:40px; max-width:600px; margin:auto;">

        <h2 style="margin-bottom:10px;">
            🚀 Ative o Plano PRO
        </h2>

        <p style="font-size:18px; margin-bottom:5px;">
            Acesso completo às funcionalidades exclusivas.
        </p>

        <h1 style="font-size:38px; color:#07580b; margin:20px 0;">
            R$ 5,99
        </h1>

        <p style="font-size:16px; margin-bottom:20px;">
            Plano <strong>pré-pago válido por 30 dias</strong>.
            Após esse período, você pode renovar se desejar.
        </p>

        <div style="padding:15px; border-radius:8px; margin-bottom:25px;" class="my-bg-dark-white">
            🔒 O pagamento é processado com total segurança pelo 
            <strong>Mercado Pago</strong>.<br>
            Seus dados financeiros não ficam armazenados em nosso sistema. <br>
            Ao clicar no botão abaixo você será redirecionado para a plataforma do Mercado Pago, você não precisa de uma conta no Mercado Pago para realizar o pagamento
        </div>

        @if ($preferenceId['status'])
            <div id="walletBrick_container"></div>
        @else
            <span class="h5" style="color:#07580b;">{{$preferenceId['message']}}</span>
        @endif

    </div>

    <hr class="my-5">

<h4 class="mb-4">📄 Histórico de Pagamentos</h4>

@if($payments->isEmpty())
    <div class="alert alert-info">
        Você ainda não realizou nenhum pagamento.
    </div>
@else
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Plano</th>
                    <th>Valor</th>
                    <th>Status</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->plan->name ?? 'Plano PRO' }}</td>
                        <td>R$ {{ number_format($payment->value, 2, ',', '.') }}</td>
                        <td>
                            @php
                                $color = match($payment->payment_status_details) {
                                    'accredited' => 'success',
                                    'pending_review_manual',
                                    'pending_waiting_payment',
                                    'pending_contingency',
                                    'pending_capture',
                                    'pending_challenge',
                                    'offline_process' => 'warning',
                                    'refunded',
                                    'by_admin' => 'secondary',
                                    default => 'danger'
                                };
                            @endphp
                            
                            @if($payment->payment_status == '0')
                                <span class="badge bg-light text-dark">
                                    Aguardando pagamento
                                </span>
                            @else
                                <span class="badge bg-{{ $color }}">
                                    {{ $payment->payment_status_description }}
                                </span>
                            @endif
                        </td>
                        <td>{{ $payment->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
</div>

@section('javascript')
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
    const publicKey = "{{config('services.mercado_pago.public_key')}}";
    const preferenceId = "{{$preferenceId['preferenceId']}}";

    const mp = new MercadoPago(publicKey);

    const bricksBuilder = mp.bricks();
    const renderWalletBrick = async (bricksBuilder) => {
        await bricksBuilder.create("wallet", "walletBrick_container", {
        initialization: {
            preferenceId: preferenceId,
        }
    });
    };

    renderWalletBrick(bricksBuilder);
    </script>
@endsection
@endsection