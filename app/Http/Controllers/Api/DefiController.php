<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coin;
use App\Models\Account;
use App\Models\Staking;
use App\Http\Resources\DefiResource;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class DefiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    protected function coinUSD($coin_name) {
        $geckoClient = new CoinGeckoClient();
        $current_usd_coin_price = $geckoClient->simple()->getPrice($coin_name, 'usd');
        $coinValue = $current_usd_coin_price[$coin_name];

        $result = $coinValue['usd'];

        return $result;
    }

    protected function getCoin() {
        $coins = Coin::all();

        return new DefiResource($coins);
    }

    protected function stakedCoins() {
        $stakings = Staking::where('user_id', auth()->user()->id)->latest()->paginate(9); 
        
        return new DefiResource($stakings);
    }

    protected function stakeCoin(Request $request) {
        DB::beginTransaction();
        try {
            $account = Account::where('user_id', auth()->user()->id)->first();

            // check if balance is enough for transaction
            $geckoClient = new CoinGeckoClient();
            $current_usd_coin_price = $geckoClient->simple()->getPrice($request->coin_identifier, 'usd');
            $coinValue = $current_usd_coin_price[$request->coin_identifier];
            $bal_value_in_coin = auth()->user()->account->usdt_balance / $coinValue['usd'];
            if($bal_value_in_coin < $request->amount) {
                $data = [
                    'success' => false,
                    'message' => 'Insuficient balance to perform operation! please top up to continue'
                ];

                return new DefiResource($data);
            } else {
                // remove the amount from USDT balance

                // get usdt value
                $usdt_coin_price = $geckoClient->simple()->getPrice('tether', 'usd');
                $usdt_coin_price = $usdt_coin_price['tether'];

                $amount_value_in_usdt = $request->amount * $coinValue['usd'];
                $new_balance = auth()->user()->account->usdt_balance - $amount_value_in_usdt;

                $account->update([
                    'usdt_balance' =>$new_balance
                ]);

                Staking::create([
                    'user_id' => auth()->user()->id,
                    'coin_name' => $request->coin,
                    'coin_identifier' => $request->coin_identifier,
                    'img' => $request->img,
                    'staked_value' => $request->amount,
                    'percentage' => $request->interest,
                    'duration' => $request->duration,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date
                ]);

                DB::commit();

                $data = [
                    'success' => true,
                    'message' => "Asset staked successfully!"
                ];
                return new DefiResource($data);
            }
            
        } catch (\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());

            $data = [
                'success' => false,
                'message' => 'Server Error!'
            ];
            return new DefiResource($data);
        }
    }

    protected function terminateStaking(Request $request) {
        DB::beginTransaction();

        try{
            $percent_deduct = 2.5/100;
            $staking = Staking::findOrFail($request->id);
            
            $percent_deduct = $staking->staked_value * $percent_deduct;
            $new_amount = $staking->staked_value - $percent_deduct;

            $coin_price = $this->coinUSD($staking->coin_identifier);

            $new_amount_in_usdt = $new_amount * $coin_price;
            
            $account = Account::where('user_id', auth()->user()->id)->first();
            $new_balance = $account->usdt_balance + $new_amount_in_usdt;

            $account->update([
                'usdt_balance' => $new_balance
            ]);

            $staking->delete();

            DB::commit();

            $data = [
                'success' => true,
                'message' => "Staking terminated successfully"
            ];

            return new DefiResource($data);
        } catch(\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());

            $data = [
                'success' => false,
                'message' => 'Server Error!'
            ];
            return new DefiResource($data);
        }
    }

    protected function withdrawStaking(Request $request) {
        DB::beginTransaction();

        try {
            $staking = Staking::findOrFail($request->id);
            $account = Account::where('user_id', auth()->user()->id)->first();
            $coin_price = $this->coinUSD($staking->coin_identifier);

            $total_payout = $staking->staked_value + $staking->profit;

            $coin_price_in_usdt = $total_payout * $coin_price;

            $account->update([
                'usdt_balance' => DB::raw('usdt_balance + ' . $coin_price_in_usdt),
                'balance' => DB::raw('balance + ' . $coin_price_in_usdt)
            ]);

            $staking->delete();

            DB::commit();

            $data = [
                'success' => true,
                'message' => "Staking withdrawal was successful"
            ];

            return new DefiResource($data);
        } catch (\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());

            $data = [
                'success' => false,
                'message' => 'Server Error!'
            ];
            return new DefiResource($data);
        }
    }
}
