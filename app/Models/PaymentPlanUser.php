<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPlanUser extends Model
{
    use HasFactory;

    public const STATUS_DESCRIPTIONS = [
        'accredited' => 'Pagamento aprovado.',
        'partially_refunded' => 'Pagamento feito com reembolso parcial.',
        'pending_capture' => 'Aguardando captura do pagamento autorizado.',
        'offline_process' => 'Pagamento sendo processado offline.',
        'pending_contingency' => 'Pagamento em processamento, atualização em até 2 dias úteis.',
        'pending_review_manual' => 'Pagamento em processamento, aguardando revisão.',
        'pending_waiting_transfer' => 'Aguardando transferência bancária.',
        'pending_waiting_payment' => 'Pagamento offline pendente.',
        'pending_challenge' => 'Confirmação pendente para cartão de crédito.',
        'bank_error' => 'Erro com o banco na transferência bancária.',
        'cc_rejected_3ds_mandatory' => 'Rejeitado por falta de 3DS quando obrigatório.',
        'cc_rejected_bad_filled_card_number' => 'Número do cartão incorreto.',
        'cc_rejected_blacklist' => 'Pagamento não processado.',
        'cc_rejected_insufficient_amount' => 'Saldo insuficiente.',
        'refunded' => 'Pagamento devolvido pelo coletor.',
        'by_admin' => 'Pagamento devolvido.',
    ];

    protected $fillable = [
        'user_id ', 'user_type_id', 'mercado_pago_id', 'quantity', 'value', 'payment_status', 'payment_status_details', 'json'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(UserType::class);
    }

    public function getPaymentStatusDescriptionAttribute()
    {
        return self::STATUS_DESCRIPTIONS[$this->payment_status_details]
            ?? 'Status desconhecido';
    }
    
}
