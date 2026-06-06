<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPanel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 'panel_id', 'css', 'html', 'current'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function panel()
    {
        return $this->belongsTo(Panel::class);
    }
}
