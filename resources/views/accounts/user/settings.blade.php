@extends('layouts.user')

@section('title', 'Account Settings')

@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
   <div class="col-lg-7 col-xl-7 col-md-12 col-sm-12">
      <form action="{{ route('user.profile.edit') }}" method="post">
         @csrf
         <div class="card">
            <div class="card-header">
               <h3 class="card-title fs-5">Edit Profile</h3>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-6 col-md-12">
                     <div class="mb-4">
                        <label for="exampleInputname">First Name</label>
                        <input type="text" class="form-control" id="exampleInputname" name="firstname"
                           value="{{ ucfirst(Auth::user()->account->first_name) }}" required placeholder="First Name">
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                     <div class="mb-4">
                        <label for="exampleInputname1">Middle Name</label>
                        <input type="text" class="form-control" id="exampleInputname1" name="middlename"
                           value="{{ ucfirst(Auth::user()->account->middle_name) }}" placeholder="Enter Middle Name">
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                     <div class="mb-4">
                        <label for="exampleInputname1">Last Name</label>
                        <input type="text" class="form-control" id="exampleInputname1" name="lastname"
                           value="{{ ucfirst(Auth::user()->account->last_name) }}" required
                           placeholder="Enter Last Name">
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                     <div class="mb-4">
                        <label for="exampleInputnumber">Phone Number</label>
                        <input type="number" class="form-control" placeholder="Phone number"
                           name="phone" value="{{ ucfirst(Auth::user()->account->phone) }}">
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                     <div class="mb-4">
                        <label for="exampleInputnumber">Country</label>
                        <select type="number" class="form-control"
                           name="country" value="{{ ucfirst(Auth::user()->account->phone) }}">
                           @include('partials.countries')
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                     <div class="mb-4">
                        <label for="exampleInputnumber">Currency</label>
                        <select type="number" class="form-control"
                           name="currency" value="{{ ucfirst(Auth::user()->account->phone) }}">
                           <option value="&dollar;" @if(Auth::user()->account->currency == '&dollar;') selected
                              @endif>Dollar (&dollar;)</option>
                           <option value="&euro;" @if(Auth::user()->account->currency == '&euro;') selected @endif>Euros
                              (&euro;)</option>
                           <option value="&pound;" @if(Auth::user()->account->currency == '&pound;') selected
                              @endif>Pounds (&pound;)</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                     <div class="mb-4">
                        <label for="exampleInputnumber">Date of Birth</label>
                        <input type="date" class="form-control" placeholder="Date of Birth"
                           name="dob" value="{{ ucfirst(Auth::user()->account->date_of_birth) }}">
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                     <div class="mb-4">
                        <label for="exampleInputnumber">Default Withdrawal Channel</label>
                        <select type="number" class="form-control"
                           name="default_address" value="{{ ucfirst(Auth::user()->wallet->default_address) }}">
                           <option value="BTC" @if(Auth::user()->wallet->default_address == 'BTC') selected
                              @endif>BTC</option>
                           <option value="ETH" @if(Auth::user()->wallet->default_address == 'ETH') selected @endif>ETH</option>
                           <option value="USDT" @if(Auth::user()->wallet->default_address == 'USDT') selected
                              @endif>USDT</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="my-5">
                  <h3 class="card-title fs-5">Payment (Withdrawal) Information</h3>
               </div>
               <hr />
               <div class="my-5">
                  <h3 class="text-muted card-title fs-6">Bank Account</h3>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-4">
                        <label for="exampleInputname">Bank Name</label>
                        <input type="text" class="form-control" id="exampleInputname" name="bank_name"
                           value="{{ ucfirst(Auth::user()->wallet->bank_name) }}" placeholder="Enter Bank Name">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-4">
                        <label for="exampleInputname1">Account Name</label>
                        <input type="text" class="form-control" id="exampleInputname1" name="account_name"
                           value="{{ ucfirst(Auth::user()->wallet->account_name) }}" placeholder="Enter Account Name">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-4">
                        <label for="exampleInputname1">Account Number</label>
                        <input type="text" class="form-control" readonly id="exampleInputname1" name="account_number"
                           value="{{ ucfirst(Auth::user()->wallet->account_number) }}"
                           placeholder="Enter Account Number">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-4">
                        <label for="exampleInputname1">Swift Code</label>
                        <input type="text" class="form-control" readonly id="exampleInputname1" name="swift_code"
                           value="{{ ucfirst(Auth::user()->wallet->swift_code) }}" placeholder="Enter Swift Code">
                     </div>
                  </div>
               </div>
               <div class="my-5">
                  <h3 class="text-muted card-title fs-6">Cryptocurrency</h3>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="mb-4">
                        <label for="exampleInputname">BTC Address</label>
                        <input type="text" class="form-control" id="exampleInputname" name="btc_address"
                           value="{{ ucfirst(Auth::user()->wallet->btc) }}" placeholder="BTC Address">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-4">
                        <label for="exampleInputname">Eth Address</label>
                        <input type="text" class="form-control" id="exampleInputname" name="eth_address"
                           value="{{ ucfirst(Auth::user()->wallet->eth) }}" placeholder="ETH Address">
                           <div class="mt-1">Required network address for Ethereum is ERC20</div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-4">
                        <label for="exampleInputname1">USDT Address</label>
                        <input type="text" class="form-control" id="exampleInputname1" name="usdt_address"
                           value="{{ ucfirst(Auth::user()->wallet->usdt) }}" placeholder="Enter USDT Address">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-4">
                        <label for="exampleInputname1">USDT Network</label>
                        <input type="text" class="form-control" readonly id="exampleInputname1" name="usdt_network"
                           value="{{ ucfirst(Auth::user()->wallet->usdt_network) }}" placeholder="Enter USDT Network">
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-footer">
               <button type="submit" class="btn btn-success mt-1">Update Settings</button>
            </div>
         </div>
      </form>
   </div>
   <div class="col-lg-5 col-xl-5 col-md-12 col-sm-12">
      <div class="card">
         <div class="card-header">
            <div class="card-title fs-5">Change Password</div>
         </div>
         <form action="{{ route('user.profile.edit-password') }}" method="POST">
            @csrf
            <div class="card-body">
               <div class="mb-3">
                  <label class="form-label">New Password</label>
                  <input type="password" class="form-control" name="password" autocomplete="new-passord">
               </div>
               <div class="mb-0">
                  <label class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" name="password_confirmation" autocomplete="new-passord">
               </div>
            </div>
            <div class="card-footer text-end">
               <button type="submit" class="btn btn-success">Update</button>
            </div>
         </form>
      </div>
      <div class="card">
         <div class="card-header">
            <div class="card-title fs-5">Notification Settings</div>
         </div>
         <form action="{{ route('user.profile.edit-notifications') }}" method="POST">
            @csrf
            <div class="card-body">
               <div class="mb-4">
                  <label class="custom-switch">
                     <input type="checkbox" name="send_w_otp" class="custom-switch-input">
                     <span class="custom-switch-indicator"></span>
                     <span class="custom-switch-description">Send confirmation OTP to my email when withdrawing my funds.</span>
                  </label>
               </div>
               <div class="mb-4">
                  <label class="custom-switch">
                     <input type="checkbox" name="send_p_email" class="custom-switch-input">
                     <span class="custom-switch-indicator"></span>
                     <span class="custom-switch-description">Send me email when I get profit.</span>
                  </label>
               </div>
               <div class="mb-4">
                  <label class="custom-switch">
                     <input type="checkbox" name="send_i_exp_email" class="custom-switch-input">
                     <span class="custom-switch-indicator"></span>
                     <span class="custom-switch-description">Send me email when my investment plan expires.</span>
                  </label>
               </div>
            </div>
            <div class="card-footer text-end">
               <button type="submit" class="btn btn-success">Update</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- ROW-1 CLOSED -->
@endsection