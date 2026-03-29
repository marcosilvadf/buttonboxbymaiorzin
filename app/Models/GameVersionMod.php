<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameVersionMod extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_mod_id', 'version'
    ];

    public function gameMod()
    {
        return $this->belongsTo(GameMod::class);
    }

    public function mods()
    {
        return $this->hasMany(Mod::class);
    }
}
