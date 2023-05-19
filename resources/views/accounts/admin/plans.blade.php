@extends('layouts.admin')

@section('title', 'Investment Plans')

@section('content')
<!-- ROW-5 -->
<div class="row mt-5">
    <div class="col-12 col-sm-12">
        <div class="card shadow-none border">
            <div class="card-header">
                <h3 class="card-title mb-0">All Investment Plans ({{ $plans->count() }} records)</h3>
                <div class="card-options">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#new_plan"
                        class="btn btn-primary shadow-none">Add New Plan</button>
                </div>
            </div>
            <div class="card-body">
                <div class="grid-margin">
                    @if($plans->count() > 0)
                    <div class="table-responsive">
                        <table class="table card-table border table-vcenter text-nowrap align-items-center">
                            <thead class="">
                                <tr>
                                    <th>S/N (#)</th>
                                    <th>Plan Name</th>
                                    <th>Min Amount</th>
                                    <th>Max Amount</th>
                                    <th>Interest/Profit(%)</th>
                                    <th>Duration(Days)</th>
                                    <th>Referral Bonus (%)</th>
                                    <th>Mining Duration (Days)</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($plans as $key=> $plan)
                                <tr>
                                    <td class="text-sm fs-6 font-weight-600">{{ $key + 1 }}</td>
                                    <td class="fs-6">{{ ucwords($plan->name)  }} Plan</td>
                                    <td class="fs-6">{!! Auth::user()->account->currency
                                        !!}{{ number_format($plan->min_amount, 2) }}</td>
                                    <td class="fs-6">{!! Auth::user()->account->currency
                                        !!}{{ number_format($plan->max_amount, 2) }}</td>
                                    <td class="fs-6">{{ $plan->interest  }}%</td>
                                    <td class="fs-6">{{ $plan->duration  }} Days</td>
                                    <td class="fs-6">{{ $plan->referral_bonus  }}%</td>
                                    <td class="fs-6">{{ $plan->mining_duration  }} Days</td>
                                    <td class="fs-6">{{ ucwords($plan->status) }}</td>
                                    <td class="fs-6">
                                        <div class="btn-list">
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#plan_{{ $plan->id}}"
                                                class="btn btn-sm btn-primary shadow-none">Edit</button>
                                            @if($plan->status == 'on')
                                            <button onclick="document.getElementById('switch{{ $plan->id }}').submit()"
                                                class="btn btn-sm btn-danger shadow-none">Off</button>
                                            @elseif($plan->status == 'off')
                                            <button onclick="document.getElementById('switch{{ $plan->id }}').submit()"
                                                class="btn btn-sm btn-success shadow-none">On</button>
                                            @endif

                                            <form id="switch{{ $plan->id }}" method="post"
                                                action="{{ route('admin.company.plans.switch') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $plan->id }}">
                                            </form>

                                            <div class="modal fade" ref="modal" id="plan_{{ $plan->id}}" tabindex="-1"
                                                role="dialog" data-bs-backdrop="static" data-bs-keyboard="false"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-0">
                                                            <h3 class="modal-title" id="example-Modal3">Edit
                                                                {{ ucwords($plan->name) }}
                                                                Plan</h3>
                                                        </div>
                                                        <div class="modal-body" style="text-align: left !important;">
                                                            <form method="post"
                                                                action="{{ route('admin.company.plans.edit') }}">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $plan->id }}">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name"
                                                                                class="form-control-label">Plan
                                                                                name:</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-lg"
                                                                                name="name" value="{{ $plan->name}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="message-text"
                                                                                class="form-control-label">Minimum
                                                                                Deposit</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-lg"
                                                                                name="min_amount"
                                                                                value="{{ $plan->min_amount }}"
                                                                                inputmode="numeric">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="message-text"
                                                                                class="form-control-label">Maximum
                                                                                Deposit</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-lg"
                                                                                name="max_amount"
                                                                                value="{{ $plan->max_amount }}"
                                                                                inputmode="numeric">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="message-text"
                                                                                class="form-control-label">Profits
                                                                                (%)</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-lg"
                                                                                name="interest"
                                                                                value="{{ $plan->interest }}"
                                                                                inputmode="numeric">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="message-text"
                                                                                class="form-control-label">Duration
                                                                                (Days)</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-lg"
                                                                                name="duration"
                                                                                value="{{ $plan->duration }}"
                                                                                inputmode="numeric">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="message-text"
                                                                                class="form-control-label">Referral
                                                                                Bonus (%)</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-lg"
                                                                                value="{{ $plan->referral_bonus }}"
                                                                                name="ref_bonus" inputmode="numeric">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label for="message-text"
                                                                                class="form-control-label">Mining
                                                                                Duration (Days)</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-lg"
                                                                                value="{{ $plan->mining_duration }}"
                                                                                name="mining_duration"
                                                                                inputmode="numeric">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3 btn-list">
                                                                    <button type="submit"
                                                                        class="btn btn-primary shadow-none">Confirm</button>
                                                                    <button type="button"
                                                                        class="btn btn-danger shadow-none" ref="close"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center p-5">
                        <h4 class="text-muted">No plan recorded yet</h4>
                    </div>
                    @endif

                    <div class="modal fade" ref="modal" id="new_plan" tabindex="-1" role="dialog"
                        data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h3 class="modal-title" id="example-Modal3">Add New Plan</h3>
                                </div>
                                <div class="modal-body" style="text-align: left !important;">
                                    <form method="post" action="{{ route('admin.company.plans.new') }}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="form-control-label">Plan
                                                        name:</label>
                                                    <input type="text" class="form-control form-control-lg" name="name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="message-text" class="form-control-label">Minimum
                                                        Deposit</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="min_amount" inputmode="numeric">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="message-text" class="form-control-label">Maximum
                                                        Deposit</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="max_amount" inputmode="numeric">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="message-text" class="form-control-label">Profits
                                                        (%)</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="interest" inputmode="numeric">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="message-text" class="form-control-label">Duration
                                                        (Days)</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="duration" inputmode="numeric">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="message-text" class="form-control-label">Referral Bonus
                                                        (%)</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="ref_bonus" inputmode="numeric">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="message-text" class="form-control-label">Mining Duration
                                                        (Days)</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="mining_duration" inputmode="numeric">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 btn-list">
                                            <button type="submit" class="btn btn-primary shadow-none">Add Plan</button>
                                            <button type="button" class="btn btn-danger shadow-none" ref="close"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
</div>
<!-- ROW-5 END -->
@endsection