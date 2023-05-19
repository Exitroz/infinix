@extends('layouts.admin')

@section('title', 'Company Profile')

@section('content')
<div class="my-5">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.company.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="form-control-label">Company Name:</label>
                                    <input type="text" class="form-control form-control-lg" name="name"
                                        value="{{ $company->name }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="message-text" class="form-control-label">Email:</label>
                                    <input class="form-control form-control-lg" name="email" type="email"
                                        value="{{ $company->email }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="message-text" class="form-control-label">Phone:</label>
                                    <input class="form-control form-control-lg" name="phone" type="phone"
                                        value="{{ $company->phone }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="form-control-label">Minimum Deposit:</label>
                                    <input type="number" class="form-control form-control-lg" name="min_deposit"
                                        value="{{ $company->min_deposit }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="recipient-name" class="form-control-label">Bitcoin Address:</label>
                                    <input type="text" class="form-control form-control-lg" name="btc"
                                        value="{{ $company->btc }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="recipient-name" class="form-control-label">Ethereum Address:</label>
                                    <input type="text" class="form-control form-control-lg" name="eth"
                                        value="{{ $company->eth }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="recipient-name" class="form-control-label">USDT Address:</label>
                                    <input type="text" class="form-control form-control-lg" name="usdt"
                                        value="{{ $company->usdt }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="recipient-name" class="form-control-label">USDT Network:</label>
                                    <input type="text" class="form-control form-control-lg" name="usdt_network"
                                        value="{{ $company->usdt_network }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="recipient-name" class="form-control-label">Company Address:</label>
                                    <textarea class="form-control form-control-lg"
                                        name="address">{{ $company->address }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-block btn-primary shadow-none">Update
                                Information</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>

@endsection