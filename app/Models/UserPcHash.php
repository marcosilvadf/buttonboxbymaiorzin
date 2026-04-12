<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPcHash extends Model
{
    use HasFactory;
    protected $table = 'user_pc_hashes';

    protected $fillable = [
        'user_id', 'pc_hash'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
