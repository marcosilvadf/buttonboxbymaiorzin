<?php

namespace App\Http\Controllers;
use App\Models\PaymentPlanUser;
use App\Services\MercadoPagoService;

class PlanController extends Controller
{
    public function index()
    {
        return view('plan.index');
    }

    public function payment()
    {
        return abort(404);
        
        $preferenceId = null;

        $mercadoPagoService = new MercadoPagoService;
        $preferenceId = $mercadoPagoService->createPreference();

        $payments = PaymentPlanUser::where('user_id', auth()->id())
        ->orderBy('id', 'desc')
        ->get();

        return view('plan.payment', [
            'payments' => $payments,
            'preferenceId' => $preferenceId,
        ]);
    }
}
