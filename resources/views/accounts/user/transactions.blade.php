@extends('layouts.user')

@section('title', ucfirst(request()->type) . ' Transactions')

@section('content')

<!-- ROW-5 -->
<div class="row mt-5">
   <div class="col-12 col-sm-12">
      <div class="card shadow-none border">
         <div class="card-header">
            <h3 class="card-title mb-0">All {{ ucfirst(request()->type) }} Transactions</h3>
         </div>
         <div class="card-body">
            <div class="grid-margin">
               @if($transactions->count() > 0)
               <div class="table-responsive">
                  <table class="table card-table border table-vcenter text-nowrap align-items-center">
                     <thead class="">
                        <tr>
                           <th>Reference Code (#)</th>
                           <th>Amount ({!! Auth::user()->account->currency !!})</th>
                           @if(request()->type !== 'withdrawal')<th>Coin Value</th>@endif
                           <th>Payment Mode</th>
                           <th>Status</th>
                           <th>Date</th>
                        </tr>
                     </thead>
                     <tbody>
                     @foreach($transactions as $key=> $transaction)
                        <tr>
                           <td class="text-sm fs-6 font-weight-600">#{{ str_pad($transaction->id, 8, '0', STR_PAD_LEFT) }}</td>
                           <td class="fs-6">{!! Auth::user()->account->currency !!}{{ $transaction->amount_usd }}</td>
                           @if(request()->type !== 'withdrawal')<td><strong>{{ $transaction->coin_amount }} {{ strtoupper($transaction->payment_mode) }}</strong></td>@endif
                           <td class="fs-6">{{ strtoupper($transaction->payment_mode) }}</td>
                           <td class="fs-6">
                              @if($transaction->status == 'pending')
                                 <i class="fa fa-exclamation-triangle text-warning"></i> {{ ucwords($transaction->status) }}
                              @elseif($transaction->status == 'approved')
                                 <i class="fa fa-check me-1 text-success"></i> {{ ucwords($transaction->status) }}
                              @elseif($transaction->status == 'declined')
                              <i class="fa fa-exclamation-triangle text-danger"></i> {{ ucwords($transaction->status) }}
                              @endif
                           </td>
                           <td class="fs-6">{{ $transaction->created_at->format('jS M Y') }}</td>
                        </tr>
                     @endforeach
                     </tbody>
                  </table>
               </div>
               @else
                  <div class="text-center p-5">
                     <h4 class="text-muted">No transaction recorded yet</h4>
                  </div>
               @endif
            </div>
         </div>
      </div>
   </div><!-- COL END -->
</div>
<!-- ROW-5 END -->

@endsection