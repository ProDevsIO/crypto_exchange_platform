<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kucoin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_name',
        'api_token',
        'secret',
        'passphrase'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
