@extends('layouts.user')

@section('title', 'Referral Program')

@section('content')

<!-- ROW-5 -->
<div class="row mt-5">
   <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
      <div class="card bg-secondary img-card box-secondary-shadow">
         <div class="card-body">
            <div class="d-flex">
               <div class="text-white">
                  <h2 class="mb-0 number-font">{{ $referrals->count() }}</h2>
                  <p class="text-white mb-0">Total Referrals </p>
               </div>
               <div class="ms-auto"> <i class="fe fe-users text-white fs-30 me-2 mt-2"></i> </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-12 col-md-6 col-lg-6 col-xl-9">
      <div class="card shadow-none border">
         <div class="card-body">
            <div class="grid-margin">
               <div class="">
                  <h5>Earn 15% referral commision when you invite friends to {{ $company->name }} with your referral link.</h5>
                  <div class="py-2">
                     <div class="row gutters-xs">
                        <div class="col">
                           <input type="text" class="form-control form-control-lg bg-white" readonly aria-label="Referral Link" aria-describedby="button-addon2" id="refText"
                              value="https://www.exchangedigitalmining.com/register?ref={{ Auth::user()->account->referral_id }}">
                        </div>
                        <span class="col-auto">
                           <button class="btn btn-warning btn-lg" type="button" id="refBtn"><i class="fe fe-copy"></i> Copy</button>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div><!-- COL END -->
</div>
<!-- ROW-5 END -->

<!-- ROW-5 -->
<div class="row mt-5">
   <div class="col-12 col-sm-12">
      <div class="card shadow-none border">
         <div class="card-header">
            <h3 class="card-title mb-0">My Referrals</h3>
         </div>
         <div class="card-body">
            <div class="grid-margin">
               <div class="">
                  @forelse($referrals as $key=> $referral)
                  <div class="table-responsive">
                     <table class="table card-table border table-vcenter text-nowrap align-items-center">
                        <thead class="">
                           <tr>
                              <th>Reference Code (#)</th>
                              <th>Equity ({!! Auth::user()->account->currency !!})</th>
                              <th>Profit ({!! Auth::user()->account->currency !!})</th>
                              <th>Status</th>
                              <th>Active for</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td class="text-sm font-weight-600">Women Wallet-E32N</td>
                              <td>18</td>
                              <td>05</td>
                              <td>112</td>
                              <td>$ 2,356</td>
                              <td><i class="fa fa-check me-1 text-success"></i> In Stock</td>
                           </tr>
                           <tr>
                              <td class="text-sm font-weight-600">Mens Gold Metal Watch</td>
                              <td>11</td>
                              <td>04</td>
                              <td>0</td>
                              <td>$ 3,256</td>
                              <td>
                                 <i class="fa fa-exclamation-triangle text-warning"></i> Out of stock
                              </td>
                           </tr>
                           <tr>
                              <td class="text-sm font-weight-600">Laptop</td>
                              <td>60</td>
                              <td>10</td>
                              <td>0</td>
                              <td>$ 7,652</td>
                              <td>
                                 <i class="fa fa-exclamation-triangle text-danger"></i> Out of stock
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  @empty
                  <div class="text-center p-5">
                     <h4 class="text-muted">No referral recorded yet</h4>
                  </div>
                  @endforelse
               </div>
            </div>
         </div>
      </div>
   </div><!-- COL END -->
</div>
<!-- ROW-5 END -->
@endsection