<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\DashboardResource;
use App\Models\Investment;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Referral;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use App\Traits\ManageCoins;

class DashboardController extends Controller
{

    use ManageCoins;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $investments = Investment::where('user_id', auth()->user()->id)->get();
        $total_investments = Investment::where('user_id', auth()->user()->id)->get('amount_usd')->sum('amount_usd');
        $total_profits = Investment::where('user_id', auth()->user()->id)->get('earning')->sum('earning');
        $total_withdrawals = Transaction::where('user_id', auth()->user()->id)->where('type', 'withdrawal')->where('status', 'approved')->get('amount_usd')->sum('amount_usd');
        $referral_bonus = Referral::where('user_id', auth()->user()->id)->where('status', 'active')->get('bonus')->sum('bonus');
        $user = User::with(['account', 'wallet'])->where('id', auth()->user()->id)->get();
        $active_investments = Investment::where('user_id', auth()->user()->id)->where('status', 'approved')->latest()->paginate(8);
        $bitcoin_price = $this->coinUSD('bitcoin');
        $busd_price = $this->coinUSD('binance-usd');
        $usdt_price = $this->coinUSD('tether');
        $eth_price = $this->coinUSD('ethereum');

        $data = [
            'user' => $user,
            'active_investments' => $active_investments,
            'investments' => $investments,
            'total_investments' => $total_investments,
            'total_profits' => $total_profits,
            'total_withdrawals' => $total_withdrawals,
            'referral_bonus' => $referral_bonus,
            'bitcoin_price' => $bitcoin_price,
            'eth_price' => $eth_price,
            'usdt_price' => $usdt_price,

        ];

        return new DashboardResource($data);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
