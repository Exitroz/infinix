@extends('layouts.app')

@section('title', 'Our Pricing Plans')
    
@section('content')
<!-- sectio content begin -->
<div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid">
                    <div class="uk-width-1-1 uk-flex uk-flex-center">
                        <div class="uk-width-3-4@m uk-margin-medium-bottom">
                            <h2 class="uk-margin-small-bottom">We offer the best <span class="in-highlight">Pricing Plans.</span></h2>
                        </div>
                    </div>
                    <div class="uk-width-1-1 in-timeline-1">
                        <hr>
                           <div class="uk-grid-medium uk-child-width-1-1 uk-child-width-1-3@m" data-uk-grid>
                              @foreach($plans as $key => $plan)
                              <div>
                                <div class="in-timeline-branch">
                                    <div class="uk-flex">
                                        <i class="fas fa-clipboard-check fa-lg in-icon-wrap circle primary-color"></i>
                                        <div class="in-timeline-title uk-flex uk-flex-middle">
                                            <h4 class="uk-margin-remove-bottom">{{ ucwords($plan->name) }} Plan</h4>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-box-shadow-small uk-width-expand">
                                    <div class="uk-card uk-card-default uk-card-body uk-card-small uk-border-rounded">
                                        <ul class="uk-list uk-list-bullet in-list-check">
                                            <li>Min. Deposit: <strong>&dollar;{{ $plan->min_amount }}</strong></li>
                                            <li>Max. Deposit: <strong>&dollar;{{ $plan->max_amount }}</strong></li>
                                            <li>Return On Investment: <strong>{{ $plan->interest }}%</strong></li>
                                            <li>Contract Duration: <strong>{{ $plan->duration }} Days</strong></li>
                                            <li>Mining Duration: <strong>{{ $plan->mining_duration }} Days</strong></li>
                                            <li><strong>{{ $plan->referral_bonus }}%</strong> Referral Commision</li>
                                            <li>24/Hours Customer Support</li>
                                            <li>Money Back guarantee with 48hrs</li>
                                        </ul>
                                        <div class="uk-text-center">
                                        <a href="/register" class="uk-width-1-1 uk-button uk-button-primary uk-border-rounded uk-visible@s">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                              </div>
                              @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
@endsection