<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\InvestmentResource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Investment;
use App\Models\Plan;
use App\Models\Account;
use App\Models\Transaction;
use App\Traits\ManageCoins;

class InvestmentController extends Controller
{
    use ManageCoins;

    private function generateTransactionId()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $pin = mt_rand(10000, 99999) . mt_rand(10000, 99999); // . $characters[rand(0, strlen($characters) - 1)];
        $string = str_shuffle($pin);

        return $string;
    }

    protected function invest(Request $request) {
        DB::beginTransaction();
        try{
            // check if balance is enough
            if($request->amount > auth()->user()->account->balance) {
                $data = [
                    'success' => false,
                    'message' => "Insificient balance on wallet, please top-up to continnue",
                ];
            } else {
                $plans = Plan::where('id', $request->plan)->first();
                $account = Account::where('user_id', auth()->user()->id)->first();

                $new_b = $account->balance - $request->amount;

                $account->update([
                    'balance' => $new_b
                ]);

                Investment::create([
                    'user_id' => auth()->user()->id,
                    'plan_id' => $request->plan,
                    'amount_usd' => $request->amount,
                    'duration' => $plans->duration,
                    'status' => 'approved'
                ]);
                
                $data = [   
                    'success' => true,
                    'message' => "Investment order created successfully",
                ];
            }
            DB::commit();
            return new InvestmentResource($data);
        } catch(\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());

            $data = [
                'success' => false,
                'message' => 'Server Error!'
            ];
            return new InvestmentResource($data);
        }
    }

    protected function withdraw(Request $request) {
        DB::beginTransaction();

        try{
            $investment = Investment::findOrFail($request->investment_id);
            $account = Account::where('user_id', auth()->user()->id)->first();

            $new_bal = $investment->earning - $request->amount;

            if($request->wallet == 'wallet') {
                $new_account_bal = $account->balance + $request->amount;

                $account->update([
                    'balance' => $new_account_bal
                ]);

                Transaction::create([
                    'user_id' => auth()->user()->id,
                    'type' => 'withdrawal',
                    'amount_usd' => $request->amount,
                    'payment_mode' => 'spot wallet',
                    'address' => '**********',
                    'network' => '**********',
                    'status' => 'approved'
                ]);
                
            } elseif($request->wallet == 'btc') {

                if(auth()->user()->wallet->btc == '') {
                    $data = [   
                        'success' => false,
                        'message' => "Bitcoin payment address not yet added, please add Bitcoin payment method on your account to continue"
                    ];

                    DB::rollback();
                } else {
                    Transaction::create([
                        'user_id' => auth()->user()->id,
                        'type' => 'withdrawal',
                        'amount_usd' => $request->amount,
                        'payment_mode' => 'Bitcoin wallet address',
                        'address' => auth()->user()->wallet->btc,
                        'network' => 'segwit'
                    ]);
                }
            } elseif($request->wallet == 'usdt') {
                if(auth()->user()->wallet->usdt == '' || auth()->user()->wallet->usdt_network == '') {
                    $data = [   
                        'success' => false,
                        'message' => "USDT payment address/Network not yet added, please add USDT payment method on your account to continue"
                    ];

                    DB::rollback();
                } else {
                    Transaction::create([
                        'user_id' => auth()->user()->id,
                        'type' => 'withdrawal',
                        'amount_usd' => $request->amount,
                        'payment_mode' => 'Bitcoin wallet address',
                        'address' => auth()->user()->wallet->usdt,
                        'network' => auth()->user()->wallet->usdt_network
                    ]);
                }
            } else {

            }

            $investment->update([
                'earning' => $new_bal
            ]);

            DB::commit();

            $data = [   
                'success' => true,
                'message' => "Withdrawal request sent successfully",
            ];

            return new InvestmentResource($data);
        } catch(\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());

            $data = [
                'success' => false,
                'message' => 'Server Error!'
            ];
            return new InvestmentResource($data);
        }
    }

    protected function reInvest(Request $request) {
        DB::beginTransaction();

        try {
            $investment = Investment::findOrFail($request->transaction_id);

            $new_equity = $investment->amount_usd + $investment->earning;
            
            $investment->update([
                'amount_usd' => $new_equity,
                'earning' => 0.00,
                'status' => 'approved',
                'count_down' => 0
            ]);
            
            DB::commit();
            $data = [
                'success' => true,
                'message' => 'Order #' . str_pad($investment->id, 8, '0', STR_PAD_LEFT) . ' has been re-invested successfuly'
            ];

            return new InvestmentResource($data);
        } catch (\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());

            $data = [
                'success' => false,
                'message' => 'Server Error!'
            ];
            return new InvestmentResource($data);
        }
    }
}
