@extends('layouts.user')

@section('title', 'My Profile')

@section('content')

<!-- ROW-1 OPEN -->
<div class="row" id="user-profile">
   <div class="col-lg-12">
      <div class="card shadow-none border">
         <div class="card-body">
            <div class="wideget-user">
               <div class="row">
                  <div class="col-12">
                     <div class="wideget-user-desc d-flex">
                        <div class="wideget-user-img">
                           <img class="" src="{{ asset('assets/auth/images/users/user.png') }}" alt="img" width="150" height="150">
                        </div>
                        <div class="user-wrap fs-5">
                           <h4>{{ ucwords(Auth::user()->account->first_name . " " . Auth::user()->account->middle_name . " " . Auth::user()->account->last_name) }}</h4>
                           <h6 class="text-muted mb-3">Registered on: {{ Auth::user()->created_at->format('jS M Y') }}</h6>
                           <!--h6 class="text-muted mb-3">Account Status: {{ ucfirst(Auth::user()->account->status) }}</h6-->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="card shadow-none border">
         <div class="card-body">
            <div class="border-0">
               <div class="tab-content">
                  <div class="tab-pane active show" id="tab-51">
                     <div id="profile-log-switch">
                        <div class="media-heading">
                           <h5 class="fs-5"><strong>Personal Information</strong></h5>
                        </div>
                        <div class="table-responsive">
                           <table class="table row table-borderless">
                              <tbody class="col-lg-12 col-xl-6 p-0">
                                 <tr>
                                    <td class="fs-6"><strong>Full Name :</strong> {{ ucwords(Auth::user()->account->first_name . " " . Auth::user()->account->middle_name . " " . Auth::user()->account->last_name) }}</td>
                                 </tr>
                                 <tr>
                                    <td class="fs-6"><strong>Email :</strong> {{ Auth::user()->email }}</td>
                                 </tr>
                                 <tr>
                                    <td class="fs-6"><strong>Account ID :</strong> {{ Auth::user()->account_id }}</td>
                                 </tr>
                                 <tr>
                                    <td class="fs-6"><strong>Phone :</strong> @if(Auth::user()->account->phone != '' ) {{ Auth::user()->account->phone }} @else ******** @endif</td>
                                 </tr>
                                 <tr>
                                    <td class="fs-6"><strong>Country :</strong> @if(Auth::user()->account->country) {{ ucwords(Auth::user()->account->country) }}  @else ******** @endif</td>
                                 </tr>
                              </tbody>
                              <tbody class="col-lg-12 col-xl-6 p-0">
                                 <tr>
                                    <td class="fs-6"><strong>BTC Address :</strong> @if(Auth::user()->wallet->btc) {{ Auth::user()->wallet->btc }}  @else ******** @endif</td>
                                 </tr>
                                 <tr>
                                    <td class="fs-6"><strong>USDT Address :</strong> @if(Auth::user()->wallet->usdt) {{ Auth::user()->wallet->usdt }} @else ******** @endif</td>
                                 </tr>
                                 <tr>
                                    <td class="fs-6"><strong>Ethereum Address :</strong> @if(Auth::user()->wallet->eth) {{ Auth::user()->wallet->eth }} @else ******** @endif</td>
                                 </tr>
                                 <tr>
                                    <td class="fs-6"><strong>Default Withdrawal Channel:</strong> @if(Auth::user()->wallet->default_address) {{ ucwords(Auth::user()->wallet->default_address) }} @else ******** @endif</td>
                                 </tr>
                                 <tr>
                                    <td class="fs-6"><strong>Auto Withdrawal:</strong> {{ ucfirst(Auth::user()->wallet->auto_withdrawal) }}</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div><!-- COL-END -->
</div>
<!-- ROW-1 CLOSED -->
@endsection