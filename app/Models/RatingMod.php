<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingMod extends Model
{
    use HasFactory;

    protected $fillable = [
        'mod_id', 'user_id', 'rating'
    ];

    public function mod()
    {
        return $this->belongsTo(Mod::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
