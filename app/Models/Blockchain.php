<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blockchain extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_name',
        'api_token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
