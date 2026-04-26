<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PcHashTrial extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_ip', 'updated_ip', 'pc_hash'
    ];
}
