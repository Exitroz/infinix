@extends('layouts.admin')

@section('title', ucfirst($user->account->first_name) .' Information')

@section('content')
    
    <!-- ROW-5 -->
<div class="row mt-5">
    <div class="col-12 col-md-2"></div>
    <div class="col-12 col-md-8">
      <div class="card shadow-none border">
         <div class="card-header">
            <h3 class="card-title mb-0">Edit {{ ucfirst($user->account->first_name) }}'s Information</h3>
         </div>
         <div class="card-body">
            <form method="post" action="{{ route('admin.users.load-wallet') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="row">
                    <div class="col-md-12">
                      <div class="mb-3">
                         <label for="recipient-name" class="form-control-label">Email:</label>
                         <input type="email" readonly class="form-control form-control-lg"
                         value="{{ $user->email}}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="mb-3">
                         <label for="message-text" class="form-control-label">Plan</label>
                           <select type="text" class="form-control form-control-lg" name="plan_id">
                              @foreach($plans as $key => $plan)
                                 <option value="{{ $plan->id }}">{{ ucwords($plan->name)}}</option>
                              @endforeach
                           </select>
                      </div>
                   </div>
                   <div class="col-md-12">
                      <div class="mb-3">
                         <label for="message-text" class="form-control-label">Load amount (USD)</label>
                         <input type="text" class="form-control form-control-lg" name="amount">
                      </div>
                   </div>
                    <div class="col-md-12">
                        <div class="mt-3 btn-list">
                           <button type="submit" class="btn btn-primary shadow-none">Load Wallet</button>
                           <a href="/admin/users" class="btn btn-danger shadow-none">Back</a>
                        </div>
                    </div>
             </form>
         </div>
      </div>
   </div><!-- COL END -->
   <div class="col-12 col-md-2"></div>
</div>
<!-- ROW-5 END -->

@endsection