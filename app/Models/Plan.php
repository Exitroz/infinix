<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'name', 'min_amount', 'max_amount', 'interest', 'mining_duration', 'referral_bonus', 'duration', 'description', 'status'];
}
