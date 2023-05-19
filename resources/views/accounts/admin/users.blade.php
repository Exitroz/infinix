@extends('layouts.admin')

@section('title', 'All Users')

@section('content')

<!-- ROW-5 -->
<div class="row mt-5">
   <div class="col-12 col-sm-12">
      <div class="card shadow-none border">
         <div class="card-header">
            <h3 class="card-title mb-0">All Users ({{ $users->count() }} users)</h3>
         </div>
         <div class="card-body">
            <div class="grid-margin">
               @if($users->count() > 0)
               <div class="table-responsive">
                  <table class="table card-table border table-vcenter text-nowrap align-items-center">
                     <thead class="">
                        <tr>
                           <th>Account ID</th>
                           <th>Full name</th>
                           <th>Email</th>
                           <th>Role</th>
                           <th>Account Balance</th>
                           <th>Phone</th>
                           <th>Country</th>
                           <th>Status</th>
                           <th>Date Registered</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     @foreach($users as $key=> $user)
                        <tr>
                           <td>{{ $user->account_id }}</td>
                           <td>{{ ucwords($user->account->first_name . " " . $user->account->middle_name . " " . $user->account->last_name) }}</td>
                           <td>{{ $user->email }}</td>
                           <td>{{ ucfirst($user->role) }}</td>
                           <td>${{ number_format($user->account->balance, 2) }}</td>
                           <td>{{ $user->account->phone }}</td>
                           <td>{{ ucwords($user->account->country) }}</td>
                           <td>
                              @if($user->account->status == 'verified')
                                 <i class="fa fa-check me-1 text-success"></i> Verified
                              @elseif($user->account->status == 'unverified')
                                 <i class="fa fa-exclamation-triangle text-warning"></i> Unverified
                              @elseif($user->account->status == 'suspended')
                                 <i class="fa fa-exclamation-triangle text-danger"></i> Suspended
                              @endif
                           </td>
                           <td>{{ $user->created_at->format('jS M Y') }}</td>
                           <td>
                              <div class="btn-list">
                                 @if($user->account->status == 'verified')
                                    <button onclick="document.getElementById('suspend{{ $user->id }}').submit()" class="btn btn-sm btn-danger shadow-none">Suspend</button>
                                 @elseif($user->account->status == 'unverified')
                                    <button onclick="document.getElementById('verify{{ $user->id }}').submit()" class="btn btn-sm btn-success shadow-none">Verify</button>
                                    <button onclick="document.getElementById('suspend{{ $user->id }}').submit()" class="btn btn-sm btn-danger shadow-none">Suspend</button>
                                 @elseif($user->account->status == 'suspended')
                                    <button onclick="document.getElementById('verify{{ $user->id }}').submit()" class="btn btn-sm btn-success shadow-none">Activate</button>
                                 @endif
                                    <a href="/admin/users/edit/wallet/{{ $user->id }}" class="btn btn-sm btn-primary shadow-none">Load Wallet</a>
                                    
                                 <form id="verify{{ $user->id }}" method="post" action="{{ route('admin.users.verify') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->account->id }}">
                                 </form>

                                 <form id="suspend{{ $user->id }}" method="post" action="{{ route('admin.users.suspend') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->account->id }}">
                                 </form>
                              </div>
                           </td>
                        </tr>
                     @endforeach
                     </tbody>
                  </table>
                  {{ $users->appends(request()->except('page'))->render() }}
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