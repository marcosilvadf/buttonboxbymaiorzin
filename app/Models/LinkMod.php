<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkMod extends Model
{
    use HasFactory;

    protected $fillable = [
        'mod_id', 'link', 'description'
    ];

    public function mod()
    {
        return $this->belongsTo(Mod::class);
    }
}
