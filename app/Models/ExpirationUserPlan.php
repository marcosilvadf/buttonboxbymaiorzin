<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpirationUserPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'user_type_id ', 'expiration'
    ];

    protected $casts = [
        'expiration' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(UserType::class, 'user_type_id');
    }
}
