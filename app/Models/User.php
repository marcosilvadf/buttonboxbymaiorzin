<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\ResetPasswordNotification;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_type_id',
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'link_code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'link_code',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function userType()
    {
        return $this->belongsTo(UserType::class);
    }

    public function expirationUserPlan()
    {
        return $this->hasOne(ExpirationUserPlan::class);
    }

    public function paymentPlanUser()
    {
        return $this->hasMany(PaymentPlanUser::class);
    }

    public function mods()
    {
        return $this->hasMany(Mod::class, 'user_id');
    }

    public function getIsProAttribute()
    {
        return $this->expirationUserPlan
            && $this->expirationUserPlan->user_type_id == 2
            && $this->expirationUserPlan->expiration->greaterThanOrEqualTo(now());
    }

    public function panel()
    {
        return $this->hasOne(UserPanel::class);
    }

    public function getExpiringSoonAttribute()
    {
        if (
            !$this->expirationUserPlan ||
            $this->expirationUserPlan->user_type_id != 2 ||
            !$this->expirationUserPlan->expiration
        ) {
            return true;
        }

        $expiration = $this->expirationUserPlan->expiration;

        if ($expiration->isPast()) {
            return true;
        }

        return $this->expirationUserPlan->expiration->isFuture()
                && $this->expirationUserPlan->expiration->lte(now()->addDays(3)->endOfDay());
    }
}
