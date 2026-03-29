<?php
namespace App\Services;

use App\Models\ExpirationUserPlan;
use App\Models\PaymentPlanUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use MercadoPago\Client\MerchantOrder\MerchantOrderClient;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\MercadoPagoConfig;


class MercadoPagoService{
    protected $accessToken;
    protected $publicKey;

    public function __construct()
    {
        $this->accessToken = config('services.mercado_pago.access_token');
        $this->publicKey = config('services.mercado_pago.public_key');        
    }

    public function createPreference()
    {
        $preferenceId = null;

        if(!auth()->user()->expiring_soon) {
            return ['status' => false, 'preferenceId' => $preferenceId, 'message' => "Você já é assinante, o botão para pagar só aparece quando faltar 3 dias para seu plano expirar. Seu plano expira em: ".auth()->user()->expirationUserPlan->expiration->format('d/m/Y') . "."];
        }

        MercadoPagoConfig::setAccessToken($this->accessToken);

        $paymentPlanUser = PaymentPlanUser::where('user_id', auth()->id())
        ->where('payment_status', '1')
        ->orderBy('id', 'DESC')
        ->first();        

        if(
            PaymentPlanUser::where('user_id', auth()->id())
                ->where('payment_status', '1')
                ->exists()
            &&
            !PaymentPlanUser::where('user_id', auth()->id())
                ->where('payment_status', '0')
                ->exists()
        ) {
            return ['status' => false, 'preferenceId' => $preferenceId, 'message' => 'Você possuí um pagamento pendente, aguarde até que seja aprovado ou recusado.'];
        }

        $paymentPlanUser = PaymentPlanUser::where('user_id', auth()->id())
        ->where('payment_status', '0')
        ->orderBy('id', 'DESC')
        ->first();

        if($paymentPlanUser) {
            $preferenceId = $paymentPlanUser->mercado_pago_id;
        } else {
            $client = new PreferenceClient();
            $paymentPlanUser = new PaymentPlanUser;
            $paymentPlanUser->user_id = auth()->id();
            $paymentPlanUser->user_type_id = 2;
            $paymentPlanUser->payment_status = '0';
            $paymentPlanUser->save();
            try {
                $preference = $client->create([
                    "items"=> array(
                        array(
                            "id" => "plan_pro_" . $paymentPlanUser->id,
                            "title" => "ButtonBoxByMaiorzin,plano pro,".auth()->id(),
                            "description" => "Assinatura Plano Pro - ButtonBoxByMaiorzin",
                            "category_id" => "services",
                            "quantity" => 1,
                            "unit_price" => 5.99,
                            "currency_id" => "BRL",
                            "unit_price" => (float) 5.99
                        )
                    ),
                    "payer" => [
                        "first_name" => auth()->user()->first_name,
                        "last_name" => auth()->user()->last_name,
                        "email" => auth()->user()->email
                    ],
                    "statement_descriptor" => "BUTTONBOXBYMAIORZIN",
                    "external_reference" => $paymentPlanUser->id,
                    "back_urls" => [
                        "success" => config('services.mercado_pago.route_success'),
                        "failure" => config('services.mercado_pago.route_failure'),
                        "pending" => config('services.mercado_pago.route_pending')
                    ],
                    "notification_url" => config('app.url') . '/api/mercado-pago',
                    "auto_return" => "approved"
                ]);
            } catch (\MercadoPago\Exceptions\MPApiException $e) {
                Log::channel('mp_error')->error(json_encode($e->getApiResponse()->getContent()));
                return redirect()->back()->withErrors(['erro' => 'Houve um erro interno.']);
            }

            $paymentPlanUser->mercado_pago_id = $preference->id;
            $paymentPlanUser->quantity = $preference->items[0]->quantity;
            $paymentPlanUser->value = $preference->items[0]->unit_price;
            $paymentPlanUser->save();

            $preferenceId = $preference->id;
        }        

        return ['status' => true, 'preferenceId' => $preferenceId, 'message' => null];
    }

    public function handlePayment($paymentId)
    {
        MercadoPagoConfig::setAccessToken($this->accessToken);

        $paymentClient = new PaymentClient();
        $payment = $paymentClient->get($paymentId);

        $this->updatePaymentPlanUser($payment);
    }

    public function getPaymentInfo($merchant)
    {
        MercadoPagoConfig::setAccessToken($this->accessToken);

        $merchantClient = new MerchantOrderClient();
        $order = $merchantClient->get($merchant);

        if (!empty($order->payments)) {

            foreach ($order->payments as $paymentData) {

                $paymentClient = new PaymentClient();
                $payment = $paymentClient->get($paymentData->id);

                $this->updatePaymentPlanUser($payment);
            }
        }
        return;
    }

    public function updatePaymentPlanUser($payment)
    {
        $paymentPlanUser = PaymentPlanUser::find($payment->external_reference);

        if($paymentPlanUser) {
            $statusCode = '1';
            if ($payment->status === 'approved') {
                $expirationDate = Carbon::now()->addDays(30)->endOfDay();

                if($paymentPlanUser->payment_status != '2') {
                    $expirationUserPlan = ExpirationUserPlan::where('user_id', $paymentPlanUser->user_id)
                                            ->first();                    

                    if($expirationUserPlan) {
                        $currentExpiration = Carbon::parse($expirationUserPlan->expiration);
                        $now = now();

                        if ($currentExpiration->isPast()) {
                            $expirationDate = $now->copy()->addDays(30)->endOfDay();
                        } else {
                            $expirationDate = $currentExpiration->copy()->addDays(30)->endOfDay();
                        }
                        
                        $expirationUserPlan->user_id = $paymentPlanUser->user_id;
                        $expirationUserPlan->user_type_id = $paymentPlanUser->user_type_id;
                        $expirationUserPlan->expiration = $expirationDate;
                        $expirationUserPlan->save();
                    } else {
                        $expirationUserPlan = new ExpirationUserPlan;
                        $expirationUserPlan->user_id = $paymentPlanUser->user_id;
                        $expirationUserPlan->user_type_id = $paymentPlanUser->user_type_id;
                        $expirationUserPlan->expiration = $expirationDate;
                        $expirationUserPlan->save();
                    }
                } else {
                    $expirationUserPlan = ExpirationUserPlan::where('user_id', $paymentPlanUser->user_id)
                                            ->first();                    

                    if(!$expirationUserPlan) {                        
                        $expirationDate = Carbon::now()->addDays(30)->endOfDay();
                        $expirationUserPlan = new ExpirationUserPlan;
                        $expirationUserPlan->user_id = $paymentPlanUser->user_id;
                        $expirationUserPlan->user_type_id = $paymentPlanUser->user_type_id;
                        $expirationUserPlan->expiration = $expirationDate;
                        $expirationUserPlan->save();
                    }
                }
                $statusCode = '2';
            }

            if (in_array($payment->status, ['rejected', 'cancelled'])) {
                $statusCode = '3';
                Log::channel('mp_info')->error('pagamento recusado: ' . json_encode($payment));
            }

            $paymentPlanUser->payment_status = $statusCode;
            $paymentPlanUser->payment_status_text = $payment->status;
            $paymentPlanUser->payment_status_details = $payment->status_detail;
            $paymentPlanUser->json = json_encode($payment);
            $paymentPlanUser->save();
        } else {
            Log::channel('mp_error')->error('Nao foi possivel recuperar id do plano de pagamento: ' . json_encode($payment));
        }
    }
}