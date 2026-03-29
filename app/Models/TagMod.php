<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagMod extends Model
{
    use HasFactory;

    protected $fillable = [
        'mod_id', 'tag'
    ];

    public function mod()
    {
        return $this->belongsTo(Mod::class);
    }
}
