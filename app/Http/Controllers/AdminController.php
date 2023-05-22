<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Investment;
use App\Models\Staking;
use App\Models\Company;
use App\Models\Coin;
use App\Models\Plan;
use App\Models\User;
use App\Models\Loan;
use App\Mail\DepositSuccessMail;
use App\Mail\WithdrawSuccessMail;
use App\Mail\LoanDeclined;
use App\Mail\LoanApproved;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    protected function approve(Request $request) {
        DB::beginTransaction();

        try {
            $transaction = Transaction::findOrFail($request->id);
            $account = Account::where('user_id', $transaction->user_id)->first();

            if($transaction->type == 'deposit') {
                switch ($transaction->payment_mode) {
                    case 'btc':    
                        $data = [
                            'name' => $account->first_name . " " . $account->last_name,
                            'amount' => $transaction->coin_amount,
                            'coin' => "BTC"
                        ];
    
                        break;
                    
                    case 'usdt':    
                        $data = [
                            'name' => $account->first_name . " " . $account->last_name,
                            'amount' => $transaction->coin_amount,
                            'coin' => "USDT"
                        ];
    
                        break;
                    case 'eth':        
                            $data = [
                                'name' => $account->first_name . " " . $account->last_name,
                                'amount' => $transaction->coin_amount,
                                'coin' => "ETH"
                            ];
        
                        break;
                    default:
                        //session()->flash('error', 'Coin deposit method not supported');
                        $data = [
                            'name' => $account->first_name . " " . $account->last_name,
                            'amount' => $transaction->coin_amount,
                            'coin' => "USD"
                        ];
                        break;
                }  

                $new_account_balance = $account->balance + $transaction->amount_usd;
                
                $account->update([
                    'balance' => $new_account_balance
                ]);

                session()->flash('success', 'Deposit approved successfully');
                Mail::to($transaction->user->email)->send(new DepositSuccessMail($data));
            } else {
                switch ($transaction->payment_mode) {
                    case 'btc':
                        $new_balance = $account->btc_balance + $transaction->coin_amount;
    
                        $account->update([
                            'btc_balance' => $new_balance
                        ]);
    
                        $data = [
                            'name' => $account->first_name . " " . $account->last_name,
                            'amount' => $transaction->amount_usd,
                            'coin' => strtoupper($transaction->payment_mode),
                            'address' => $transaction->address
                        ];
    
                        break;
                    
                    case 'usdt':
                        $new_balance = $account->usdt_balance + $transaction->coin_amount;
    
                        $account->update([
                            'usdt_balance' => $new_balance
                        ]);
    
                        $data = [
                            'name' => $account->first_name . " " . $account->last_name,
                            'amount' => $transaction->amount_usd,
                            'coin' => strtoupper($transaction->payment_mode),
                            'address' => $transaction->address
                        ];
    
                        break;
                    default:

                        $data = [
                            'name' => $account->first_name . " " . $account->last_name,
                            'amount' => $transaction->amount_usd,
                            'coin' => "Spot Wallet Balance",
                            'address' => $transaction->address
                        ];
                        break;
                }  

                session()->flash('success', 'Withdrawal approved successfully');
                Mail::to($transaction->user->email)->send(new WithdrawSuccessMail($data));
            }
                   

            DB::commit();
            
            $transaction->update([
                'status' => 'approved'
            ]);

            return back();
        } catch(\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());
            session()->flash('error', 'Server Error: Please contact an Admin');
            return back();
        }
    }

    protected function decline(Request $request) {
        DB::beginTransaction();

        try {
            $transaction = Transaction::findOrFail($request->id);

            $transaction->update([
                'status' => 'declined'
            ]);

            session()->flash('success', 'Deposit declined successfully');
            DB::commit();

            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());
            session()->flash('error', 'Server Error: Please contact an Admin');
            return back();
        }
    }

    protected function suspendInvestment(Request $request) {
        DB::beginTransaction();
        try {
            $investment = Investment::findOrFail($request->id);

            $investment->update([
                'status' => 'declined'
            ]);

            DB::commit();
            session()->flash('success', 'Investment suspended successfully');
            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());
            session()->flash('error', 'Server Error: Please contact an Admin');
            return back();
        }
    }

    protected function activateInvestment(Request $request) {
        DB::beginTransaction();
        try {
            $investment = Investment::findOrFail($request->id);

            $investment->update([
                'status' => 'approved'
            ]);

            DB::commit();
            session()->flash('success', 'Investment activated successfully');
            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());
            session()->flash('error', 'Server Error: Please contact an Admin');
            return back();
        }
    }

    protected function verifyUser(Request $request) {
        DB::beginTransaction();
        try {
            $account = Account::findOrFail($request->id);

            $account->update([
                'status' => 'verified'
            ]);

            DB::commit();
            session()->flash('success', 'User verifed successfully');
            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());
            session()->flash('error', 'Server Error: Please contact an Admin');
            return back();
        }
    }

    protected function suspendUser(Request $request) {
        DB::beginTransaction();
        try {
            $account = Account::findOrFail($request->id);

            $account->update([
                'status' => 'suspended'
            ]);

            DB::commit();
            session()->flash('success', 'User suspended successfully');
            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());
            session()->flash('error', 'Server Error: Please contact an Admin');
            return back();
        }
    }

    protected function update(Request $request) {
        DB::beginTransaction();
        try{
            $company = Company::first();

            $company->update([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'min_deposit' => $request->min_deposit,
                'btc' => $request->btc,
                'eth' => $request->eth,
                'usdt' => $request->usdt,
                'bank' => $request->bank,
                'alt_coin' => $request->alt_coin,
                'usdt_network' => $request->usdt_network
            ]);

            DB::commit();
            session()->flash('success', 'Company info. updated successfully');
            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());
            session()->flash('error', 'Server Error: Please contact an Admin');
            return back();
        }
    }

    protected function plansUpdate(Request $request) {
        DB::beginTransaction();

        try {
            $coins = Plan::findOrFail($request->id);

            $coins->update([
                'name' => $request->name,
                'min_amount' => $request->min_amount,
                'max_amount' => $request->max_amount,
                'interest' => $request->interest,
                'duration' => $request->duration,
                'description' => $request->description
            ]);

            DB::commit();
            session()->flash('success', 'Investment plans updatedt successfully');
            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());
            session()->flash('error', 'Server Error: Please contact an Admin');
            return back();
        }
    }

    protected function plansSwitch(Request $request) {
        DB::beginTransaction();
        try {
            $plan = Plan::findOrFail($request->id);

            if($plan->status == 'on') {
                $plan->update([
                    'status' => 'off'
                ]);
            } else {
                $plan->update([
                    'status' => 'on'
                ]);
            }

            DB::commit();
            session()->flash('success', 'Plan status changed successfully');
            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());
            session()->flash('error', 'Server Error: Please contact an Admin');
            return back();
        }
    }

    protected function plansEdit(Request $request) {
        DB::beginTransaction();

        try {
            $plan = Plan::findOrFail($request->id);

            $plan->update([
                'name' => $request->name,
                'min_amount' => $request->min_amount,
                'max_amount' => $request->max_amount,
                'interest' => $request->interest,
                'duration' => $request->duration,
                'referral_bonus' => $request->ref_bonus,
                'mining_duration' => $request->mining_duration
            ]);
            DB::commit();
            session()->flash('success', 'Plan updated successfully');
            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());
            session()->flash('error', 'Server Error: Please contact an Admin');
            return back();
        }
    }

    protected function plansNew(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'min_amount' => ['required', 'string'],
            'max_amount' => ['required', 'string'],
            'interest' => ['required', 'integer'],
            'duration' => ['required', 'integer'],
            'ref_bonus' => ['required', 'integer'],
            'mining_duration' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());
            return back();
        }

        DB::beginTransaction();

        try {
            Plan::create([
                'name' => $request->name,
                'min_amount' => $request->min_amount,
                'max_amount' => $request->max_amount,
                'interest' => $request->interest,
                'duration' => $request->duration,
                'referral_bonus' => $request->ref_bonus,
                'mining_duration' => $request->mining_duration
            ]);
            
            DB::commit();
            session()->flash('success', 'New plan added successfully');
            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());
            session()->flash('error', 'Server Error: Please contact an Admin');
            return back();
        }
    }
    
    protected function loadWallet(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'amount' => 'required',
            'plan_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());
            return back();
        }

        try {
            DB::beginTransaction();
            $user = Account::where('user_id', $request->id)->first();
            $plan = Plan::findOrFail($request->plan_id);

            Investment::create([
                'user_id' => $request->id,
                'plan_id' => $request->plan_id,
                'amount_usd' => $request->amount,
                'duration' => $plan->duration,
                'status' => 'approved'
            ]);

            DB::commit();
            session()->flash('success', 'User account loaded successfully');

            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());
            session()->flash('error', 'Server Error: Please contact an Admin');
            return back();
        }
    }
}