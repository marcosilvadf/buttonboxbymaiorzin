<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepportMod extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'mod_id', 'message', 'status', 'rejected_help'
    ];

    public function mod()
    {
        return $this->belongsTo(Mod::class, 'mod_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
