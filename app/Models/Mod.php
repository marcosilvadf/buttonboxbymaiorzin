<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mod extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'game_mod_id', 'game_version_mod_id', 'category_mod_id',
        'title', 'slug', 'description', 'version', 'average_rating',
        'status', 'rejected_help'
    ];

    protected static function booted()
    {
        static::deleting(function ($mod) {
            $mod->load('images');

            foreach ($mod->images as $image) {
                $image->delete();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(GameMod::class, 'game_mod_id');
    }

    public function gameVersion()
    {
        return $this->belongsTo(GameVersionMod::class, 'game_version_mod_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryMod::class, 'category_mod_id');
    }

    public function links()
    {
        return $this->hasMany(LinkMod::class);
    }

    public function images()
    {
        return $this->hasMany(ImageMod::class);
    }

    public function ratings()
    {
        return $this->hasMany(RatingMod::class);
    }

    public function tags()
    {
        return $this->hasOne(TagMod::class);
    }

    public function repports()
    {
        return $this->hasMany(RepportMod::class, 'mod_id');
    }

    public static function textHelpInputLinks()
    {
        $textHelpInputLinks = [
            0 => 'Download do mod*',
            1 => 'Vídeo demonstrativo',
            2 => 'Mais informações'
        ];

        return $textHelpInputLinks;
    }
}
