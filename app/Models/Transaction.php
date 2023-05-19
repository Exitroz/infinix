<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type', 'amount_usd', 'coin_amount', 'payment_mode', 'address', 'network', 'status', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}