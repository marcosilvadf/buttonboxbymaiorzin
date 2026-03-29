<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ImageMod extends Model
{
    use HasFactory;

    protected $fillable = [
        'mod_id', 'link', 'cover', 'alt'
    ];

    protected static function booted()
    {
        static::deleting(function ($image) {
            Storage::disk('public')->delete($image->link);
        });
    }

    public function mod()
    {
        return $this->belongsTo(Mod::class);
    }

    public function getUrlAttribute()
    {
        return asset('storage/' . $this->link);
    }
}
