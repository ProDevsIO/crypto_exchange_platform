<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkedCoonection extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kucoin_id',
        'blockchain_id',   
        'status', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kucoin()
    {
        return $this->belongsTo(Kucoin::class);
    }

    public function blockchain()
    {
        return $this->belongsTo(Blockchain::class);
    }

}
