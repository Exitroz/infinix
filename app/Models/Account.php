<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $hidden = ['id', 'user_id'];
    
    protected $fillable = [ 'user_id', 'first_name', 'middle_name', 'last_name', 'balance', 'usdt_balance', 'btc_balance', 
        'busd_balance', 'currency', 'date_of_birth', 'transaction_pin', 'phone', 'country', 'status', 'referral_id' ];
}
