@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="row pt-5">
   <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
      <div class="card py-5 bg-gray img-card box-primary-shadow">
         <div class="card-body">
            <div class="d-flex">
               <div class="text-white">
                  <h2 class="mb-0 number-font">{{ $total_users->count() }}</h2>
                  <p class="text-white mb-0">Total Users </p>
               </div>
               <div class="ms-auto"> <i class="fa fa-user text-white fs-30 me-2 mt-2"></i> </div>
            </div>
         </div>
      </div>
   </div><!-- COL END -->
   <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
      <div class="card py-5 bg-secondary img-card box-secondary-shadow">
         <div class="card-body">
            <div class="d-flex">
               <div class="text-white">
                  <h2 class="mb-0 number-font">${{ number_format($total_balance, 2) }}</h2>
                  <p class="text-white mb-0">Total Balance</p>
               </div>
               <div class="ms-auto"> <i class="fa fa-dollar text-white fs-30 me-2 mt-2"></i> </div>
            </div>
         </div>
      </div>
   </div><!-- COL END -->
   <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
      <div class="card py-5 bg-success img-card box-success-shadow">
         <div class="card-body">
            <div class="d-flex">
               <div class="text-white">
                  <h2 class="mb-0 number-font">${{ number_format($total_deposits, 2) }}</h2>
                  <p class="text-white mb-0">Total Deposits</p>
               </div>
               <div class="ms-auto"> <i class="fa fa-cart-plus text-white fs-30 me-2 mt-2"></i> </div>
            </div>
         </div>
      </div>
   </div><!-- COL END -->
   <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
      <div class="card py-5 bg-info img-card box-info-shadow">
         <div class="card-body">
            <div class="d-flex">
               <div class="text-white">
                  <h2 class="mb-0 number-font">${{ number_format($total_withdrawals, 2) }}</h2>
                  <p class="text-white mb-0">Total Withdrawals</p>
               </div>
               <div class="ms-auto"> <i class="fa fa-send text-white fs-30 me-2 mt-2"></i> </div>
            </div>
         </div>
      </div>
   </div><!-- COL END -->
   <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
      <div class="card py-5 bg-primary img-card box-info-shadow">
         <div class="card-body">
            <div class="d-flex">
               <div class="text-white">
                  <h2 class="mb-0 number-font">${{ number_format($total_investments, 2) }}</h2>
                  <p class="text-white mb-0">Total Investments</p>
               </div>
               <div class="ms-auto"> <i class="fa fa-cart-plus text-white fs-30 me-2 mt-2"></i> </div>
            </div>
         </div>
      </div>
   </div><!-- COL END -->
   <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
      <div class="card py-5 bg-warning img-card box-info-shadow">
         <div class="card-body">
            <div class="d-flex">
               <div class="text-white">
                  <h2 class="mb-0 number-font">${{ number_format($total_profits, 2) }}</h2>
                  <p class="text-white mb-0">Total Profits</p>
               </div>
               <div class="ms-auto"> <i class="fa fa-dollar text-white fs-30 me-2 mt-2"></i> </div>
            </div>
         </div>
      </div>
   </div><!-- COL END -->
</div>

@endsection