<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'clientOid',
        'price',
        'size',
        'symbol',
        'type',
        'side',
        'remark',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function linkend()
    {
        return $this->belongsTo(LinkedCoonection::class);
    }
}
