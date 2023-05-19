<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Referral;
use App\Models\Account;
use App\Models\Plan;
use App\Models\Wallet;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

class UserdashboardController extends Controller
{

    protected function dashboard() {

        $investments = Investment::where('user_id', auth()->user()->id)->get();
        $total_investments = Investment::where('user_id', auth()->user()->id)->get('amount_usd')->sum('amount_usd');
        $total_profits = Investment::where('user_id', auth()->user()->id)->get('earning')->sum('earning');
        $total_withdrawals = Transaction::where('user_id', auth()->user()->id)->where('type', 'withdrawal')->where('status', 'approved')->get('amount_usd')->sum('amount_usd');
        $referral_bonus = Referral::where('user_id', auth()->user()->id)->where('status', 'active')->get('bonus')->sum('bonus');
        return view('accounts.user.dashboard', compact('investments', 'total_investments', 'total_profits', 'total_withdrawals', 'referral_bonus'));
    }

    protected function profile() {

        return view('accounts.user.profile');
    }

    protected function editProfile(Request $request) {
        $account = Account::where('user_id', auth()->user()->id)->first();
        $wallet = Wallet::where('user_id', auth()->user()->id)->first();

        DB::beginTransaction();
        try {

            if($request->has('firstname')) {
                $account->update([
                    'first_name' => $request->firstname
                ]);
            }
            if($request->has('middlename')) {
                $account->update([
                    'middle_name' => $request->middlename
                ]);
            }
            
            if($request->has('lastname')) {
                $account->update([
                    'last_name' => $request->lastname
                ]);
            }

            if($request->has('phone')) {
                $account->update([
                    'phone' => $request->phone
                ]);
            }

            if($request->has('country')) {
                $account->update([
                    'country' => $request->country
                ]);
            }

            if($request->has('currency')) {
                $account->update([
                    'currency' => $request->currency
                ]);
            }

            if($request->has('default_address')) {
                $wallet->update([
                    'default_address' => $request->default_address
                ]);
            }

            if($request->has('dob')) {
                $account->update([
                    'date_of_birth' => $request->dob
                ]);
            }

            if($request->has('bank_name')) {
                $wallet->update([
                    'bank_name' => $request->bank_name
                ]);
            }

            if($request->has('account_name')) {
                $wallet->update([
                    'account_name' => $request->account_name
                ]);
            }

            if($request->has('account_number')) {
                $wallet->update([
                    'account_number' => $request->account_number
                ]);
            }

            if($request->has('swift_code')) {
                $wallet->update([
                    'swift_code' => $request->swift_code
                ]);
            }

            if($request->has('btc_address')) {
                $wallet->update([
                    'btc' => $request->btc_address
                ]);
            }

            if($request->has('eth_address')) {
                $wallet->update([
                    'eth' => $request->eth_address
                ]);
            }

            if($request->has('usdt_address')) {
                $wallet->update([
                    'usdt' => $request->usdt_address,
                    'usdt_network' => 'TRC20'
                ]);
            }


            DB::commit();
            session()->flash('success', 'Account updated successfully');
            
            return back();
        } catch(\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());
            session()->flash('error', 'Server Error: Please contact an Admin');
            return back();
        }
    }

    protected function updatePassword(Request $request) {

        $validator = Validator::make($request->all(), [
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());
            return back();
        }

        DB::beginTransaction();
        try {
            $user = User::findOrFail(auth()->user()->id);
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            DB::commit();

            session()->flash('success', 'Your login password has been updated successfully. You will use the new password on your next login');
            
            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());
            session()->flash('error', 'Server Error: Please contact an Admin');
            return back();
        }
    }

    protected function settings() {

        return view('accounts.user.settings');
    }

    protected function referral() {

        $refIds = auth()->user()->referrals()->pluck('referred_id');
        $referrals = User::find($refIds)->map(function ($user) {
            $first_investment = Investment::where('user_id', $user->id)->where('status', Constants::APPROVED)->first();
            $amount = $first_investment->amount ?? 0;
            $user['amount'] = $amount * 15 / 100;
            $user['invested'] = ucfirst($user->referrer->invested);
            unset($user['referrer']);
            return $user;
        });

        return view('accounts.user.referral', compact('referrals'));
    }

    protected function portfolio() {
        $total_investments = Investment::where('user_id', auth()->user()->id)->get('amount_usd')->sum('amount_usd');
        $total_profits = Investment::where('user_id', auth()->user()->id)->get('earning')->sum('earning');
        $total_completed = Investment::where('user_id', auth()->user()->id)->where('status', 'completed')->get('earning')->sum('earning');
        $investments = Investment::where('user_id', auth()->user()->id)->latest()->paginate(10);

        return view('accounts.user.portfolio', compact('investments', 'total_investments', 'total_profits', 'total_completed'));
    }

    protected function transactions(Request $request) {
        $transactions = Transaction::where('user_id', auth()->user()->id)->where('type', $request->type)->latest()->paginate(10);
        return view('accounts.user.transactions', compact('transactions'));
    }

    protected function deposit($coin) {
        return view('accounts.user.deposit');
    }

    protected function pricing() {
        $plans = Plan::where('status', 'on')->get();

        return view('accounts.user.pricing', compact('plans'));
    }
}