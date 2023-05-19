@extends('layouts.admin')

@section('title', ucfirst(request()->type) . ' Transactions')

@section('content')

<!-- ROW-5 -->
<div class="row mt-5">
   <div class="col-12 col-sm-12">
      <div class="card shadow-none border">
         <div class="card-header">
            <h3 class="card-title mb-0">All {{ ucfirst(request()->type) }} Requests ({{ $transactions->count() }} records)</h3>
         </div>
         <div class="card-body">
            <div class="grid-margin">
               @if($transactions->count() > 0)
               <div class="table-responsive">
                  <table class="table card-table border table-vcenter text-nowrap align-items-center">
                     <thead class="">
                        <tr>
                           <th>Reference (#)</th>
                           <th>User</th>
                           <th>Amount</th>
                           <th>Coin Value</th>
                           <th>Coin</th>
                           <th>Status</th>
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     @foreach($transactions as $key=> $transaction)
                        <tr>
                           <td class="text-sm font-weight-600">#{{ str_pad($transaction->id, 8, '0', STR_PAD_LEFT) }}</td>
                           <td>{{ $transaction->user->email }}</td>
                           <td>{!! $transaction->user->account->currency !!}{{ $transaction->amount_usd }}</td>
                           <td><strong>{{ $transaction->coin_amount }}</strong></td>
                           <td>{{ strtoupper($transaction->payment_mode) }}</td>
                           <td>
                              @if($transaction->status == 'pending')
                                 <i class="fa fa-exclamation-triangle text-warning"></i> {{ ucwords($transaction->status) }}
                              @elseif($transaction->status == 'approved')
                                 <i class="fa fa-check me-1 text-success"></i> {{ ucwords($transaction->status) }}
                              @elseif($transaction->status == 'declined')
                              <i class="fa fa-exclamation-triangle text-danger"></i> {{ ucwords($transaction->status) }}
                              @endif
                           </td>
                           <td>{{ $transaction->created_at->format('jS M Y') }}</td>
                           <td>
                              <div class="btn-list">
                                 @if($transaction->status == 'pending')
                                    <button onclick="document.getElementById('approve{{ $transaction->id }}').submit()" class="btn btn-sm btn-success shadow-none">Approve</button>
                                    <button onclick="document.getElementById('decline{{ $transaction->id }}').submit()" class="btn btn-sm btn-danger shadow-none">Decline</button>
                                 @elseif($transaction->status == 'approved')
                                    <button class="btn btn-sm btn-success shadow-none" disabled>Approved</button>
                                 @elseif($transaction->status == 'declined')
                                    <button onclick="document.getElementById('approve{{ $transaction->id }}').submit()" class="btn btn-sm btn-success shadow-none">Approve</button>
                                    <button class="btn btn-sm btn-danger shadow-none" disabled>Declined</button>
                                 @endif
                                 
                                 <form id="approve{{ $transaction->id }}" method="post" action="{{ route('admin.transactions.approve') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $transaction->id }}">
                                 </form>

                                 <form id="decline{{ $transaction->id }}" method="post" action="{{ route('admin.transactions.decline') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $transaction->id }}">
                                 </form>
                              </div>
                           </td>
                        </tr>
                     @endforeach
                     </tbody>
                  </table>
                  {{ $transactions->appends(request()->except('page'))->render() }}
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