<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Account;
use App\Models\Investment;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use App\Traits\ManageCoins;

class UserController extends Controller
{
    use ManageCoins;
    
    protected function usdBalValue() {
        $coingecko = $geckoClient = new CoinGeckoClient();
        $btc_bal = auth()->user()->account->btc_balance;
        $usdt_bal = auth()->user()->account->usdt_balance;
        $busd_bal = auth()->user()->account->busd_balance;
        
        $data = [$btc_bal, $usdt_bal, $busd_bal];

        return new UserResource($data);
    }

    protected function porfolios() {
        $portfolios = Investment::where('user_id', auth()->user()->id)->latest()->paginate(10);
        $equity = Investment::where('user_id', auth()->user()->id)->get('amount_usd')->sum('amount_usd');
        $profits = Investment::where('user_id', auth()->user()->id)->get('earning')->sum('earning');
        $completed = Investment::where('user_id', auth()->user()->id)->where('status', 'completed')->get('earning')->sum('earning');
        $data = [
            'success' => true,
            'portfolios' => $portfolios,
            'total_profit' => $profits,
            'total_equity' => $equity,
            'total_completed' => $completed,
            'message' => 'User portfolios retrieved successfully'
        ];

        return new UserResource($data);
    }
}
