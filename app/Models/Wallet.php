<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $hidden = ['id', 'user_id'];
    
    protected $fillable = [ 'user_id', 'bank_name', 'account_name', 'account_number', 'swift_code', 'btc', 'eth', 'busd', 'usdt', 'usdt_network', 'ltc', 'xrp', 'xrp_tag', 'default_address' ];
}
