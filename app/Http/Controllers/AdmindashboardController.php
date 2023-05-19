<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Account;
use App\Models\Staking;
use App\Models\Investment;
use App\Models\Company;
use App\Models\Coin;
use App\Models\Plan;
use App\Models\Loan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AdmindashboardController extends Controller
{
    protected function dashboard() {
        $total_users = User::get();
        $total_balance = Account::get('balance')->sum('balance');
        $total_deposits = Transaction::where('type', 'deposit')->where('status', 'approved')->get('amount_usd')->sum('amount_usd');
        $total_withdrawals = Transaction::where('type', 'withdrawal')->where('status', 'approved')->get('amount_usd')->sum('amount_usd');
        $total_investments = Investment::get('amount_usd')->sum('amount_usd');
        $total_profits = Investment::get('earning')->sum('earning');

        return view('accounts.admin.dashboard', compact('total_users', 'total_balance', 'total_deposits', 'total_withdrawals', 'total_investments', 'total_profits'));
    }

    protected function portfolios() {
        $investments = Investment::latest()->paginate(10);
        return view('accounts.admin.portfolio', compact('investments'));
    }

    protected function transactions(Request $request) {
        $transactions = Transaction::where('type', $request->type)->latest()->paginate(10);
        return view('accounts.admin.transactions', compact('transactions'));
    }

    protected function users() {
        $users = User::latest()->paginate(10);
        
        return view('accounts.admin.users', compact('users'));
    }

    protected function company() {
        $company = Company::first();

        return view('accounts.admin.company', compact('company'));
    }

    protected function plans() {
        $plans = Plan::all();

        return view('accounts.admin.plans', compact('plans'));
    }

    protected function loans() {
        $loans = Loan::latest()->paginate(10);

        return view('accounts.admin.loans', compact('loans'));
    }
    
    public function showUser($id) {
        $user = User::findOrFail($id);
        $plans = Plan::all();
        return view('accounts.admin.user.show', compact('user', 'plans'));
    }
}
