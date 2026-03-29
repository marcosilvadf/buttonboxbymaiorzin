<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\MercadoPagoService;
use App\Models\PaymentPlanUser;

class MercadoPagoController extends Controller
{
    public function success()
    {
        $payment = PaymentPlanUser::where('user_id', auth()->id())
            ->where('payment_status', '2')
            ->latest()
            ->first();

        return view('mercado_pago.success', [
            'title' => 'Pagamento Aprovado',
            'payment' => $payment
        ]);
    }

    public function failure()
    {
        $payment = PaymentPlanUser::where('user_id', auth()->id())
            ->where('payment_status', '3')
            ->latest()
            ->first();

        return view('mercado_pago.failure', [
            'title' => 'Pagamento não aprovado',
            'payment' => $payment
        ]);        
    }
    
    public function pending()
    {        
        $payment = PaymentPlanUser::where('user_id', auth()->id())
            ->where('payment_status', '1')
            ->latest()
            ->first();

        return view('mercado_pago.pending', [
            'title' => 'Pagamento Pendente',
            'payment' => $payment
        ]);
    }

    public function webhook(Request $request)
    {
        switch ($request->type) {
            case 'payment':
                $mercadoPagoService = new MercadoPagoService;

                $paymentId = $request->data['id'];

                $mercadoPagoService->handlePayment($paymentId);
                break;
            
            default:
                Log::channel('mp_notification')->info($request);                
                break;
        }
        return response()->json('success', 200);
    }
}
