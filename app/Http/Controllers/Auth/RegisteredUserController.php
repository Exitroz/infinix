<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Account;
use App\Models\Referral;
use App\Models\Wallet;
use App\Models\Company;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());
            return back();
        }

        try{
            // check if first user
            $last_user =  User::latest()->first(); // get last users account_id

            if(!empty($last_user)) {
                $account_id = $last_user->account_id + 1;
            } else {
                $account_id = mt_rand(10000000,99999999);
            }

            $user = User::create([
                'email' => $request->email,
                'account_id' => $account_id,
                'password' => Hash::make($request->password),
            ]);

            $company = Company::first();

            Account::create([
                'user_id' => $user->id,
                'first_name' => $request->firstname,
                'last_name' => $request->lastname,
                'phone' => $request->phone,
                'currency' => $company->currency,
                'referral_id' => $this->generateReferralCode()
            ]);

            Wallet::create([
                'user_id' => $user->id
            ]);

            if (request()->has('ref')) {
                $getRef = User::whereEmail(request()->ref)->first();
                if ($getRef) {
                    Referral::create([
                        'user_id' => $getRef->id,
                        'referred_id' => $user->id
                    ]);
                }
            }

            event(new Registered($user));

            $data = [
                'name' => $request->firstname . " " . $request->lastname
            ];

            Mail::to($request->email)->send(new WelcomeMail($data));
            Auth::login($user);

            return redirect()->intended(RouteServiceProvider::HOME);

        } catch(\Throwable $th) {
            DB::rollback();
            Log::critical($th->getMessage());
            session()->flash('error', 'Server Error: Please contact an Admin');
            return back();
        }
    }

    protected function generateReferralCode() {
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $pin = mt_rand(10000, 99999)
            . mt_rand(10000, 99999);

        // shuffle the result
        $string = str_shuffle($pin);
        return $string;
    }
}