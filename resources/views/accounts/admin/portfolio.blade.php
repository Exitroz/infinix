@extends('layouts.admin')

@section('title', 'All Orders')

@section('content')

<!-- ROW-5 -->
<div class="row mt-5">
   <div class="col-12 col-sm-12">
      <div class="card shadow-none border">
         <div class="card-header">
            <h3 class="card-title mb-0">All Orders ({{ $investments->count() }} records)</h3>
         </div>
         <div class="card-body">
            <div class="grid-margin">
               @if($investments->count() > 0)
               <div class="table-responsive">
                  <table class="table card-table border table-vcenter text-nowrap align-items-center">
                     <thead class="">
                        <tr>
                           <th>Reference (#)</th>
                           <th>User</th>
                           <th>Amount</th>
                           <th>Profits</th>
                           <th>Plan</th>
                           <th>Status</th>
                           <th>Traded Days</th>
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     @foreach($investments as $key=> $investment)
                        <tr>
                           <td class="text-sm font-weight-600">#{{ str_pad($investment->id, 8, '0', STR_PAD_LEFT) }}</td>
                           <td>{{ $investment->user->email }}</td>
                           <td>{!! $investment->user->account->currency !!}{{ $investment->amount_usd }}</td>
                           <td>{!! $investment->user->account->currency !!}{{ $investment->earning }}</td>
                           <td>{{ ucwords($investment->plan->name) }}</td>
                           <td>
                              @if($investment->status == 'approved')
                                 <i class="fa fa-check me-1 text-success"></i> Active
                              @elseif($investment->status == 'declined')
                              <i class="fa fa-exclamation-triangle text-danger"></i> Suspended
                              @endif
                           </td>
                           <td>{{ $investment->count_down }} Days</td>
                           <td>{{ $investment->created_at->format('jS M Y') }}</td>
                           <td>
                              <div class="btn-list">
                                 @if($investment->status == 'approved')
                                    <button onclick="document.getElementById('suspend{{ $investment->id }}').submit()" class="btn btn-sm btn-danger shadow-none">Suspend</button>
                                 @else($investment->status == 'declined')
                                    <button onclick="document.getElementById('activate{{ $investment->id }}').submit()" class="btn btn-sm btn-success shadow-none">Activate</button>
                                 @endif

                                 <form id="activate{{ $investment->id }}" method="post" action="{{ route('admin.investments.activate') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $investment->id }}">
                                 </form>

                                 <form id="suspend{{ $investment->id }}" method="post" action="{{ route('admin.investments.suspend') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $investment->id }}">
                                 </form>
                              </div>
                           </td>
                        </tr>
                     @endforeach
                     </tbody>
                  </table>
                  {{ $investments->appends(request()->except('page'))->render() }}
               </div>
               @else
                  <div class="text-center p-5">
                     <h4 class="text-muted">No investment recorded yet</h4>
                  </div>
               @endif
            </div>
         </div>
      </div>
   </div><!-- COL END -->
</div>
<!-- ROW-5 END -->

@endsection