@extends('layouts.app')

@section('title', 'Contact Us')
    
@section('content')
<!-- section content begin -->
<div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-1-2@m uk-text-center">
                        <h2 class="uk-margin-small-bottom">Do not hesitate to <span class="in-highlight">reach out.</span></h2>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove">Just fill in the contact form here and we’ll be sure to reply as fast as possible</p>
                    </div>
                    <div class="uk-width-1-1@m uk-margin-large-top">
                        <div class="uk-grid uk-grid-large uk-child-width-1-2@m" data-uk-grid>
                            <div>
                                <form id="contact-form" class="uk-form uk-grid-small" data-uk-grid>
                                    <div class="uk-width-1-1">
                                        <input class="uk-input uk-border-rounded" id="name" name="name" type="text" placeholder="Full name">
                                    </div>
                                    <div class="uk-width-1-1">
                                        <input class="uk-input uk-border-rounded" id="email" name="email" type="email" placeholder="Email address">
                                    </div>
                                    <div class="uk-width-1-1">
                                        <input class="uk-input uk-border-rounded" id="subject" name="subject" type="text" placeholder="Subject">
                                    </div>
                                    <div class="uk-width-1-1">
                                        <textarea class="uk-textarea uk-border-rounded" id="message" name="message" rows="6" placeholder="Message"></textarea>
                                    </div>
                                    <div class="uk-width-1-1">
                                        <button class="uk-width-1-1 uk-button uk-button-primary uk-border-rounded" id="sendemail" type="submit" name="submit">Send Message</button>
                                    </div>
                                </form>
                            </div>
                            <div>
                                <h4 class="uk-margin-remove-bottom">Contact Us</h4>
                                <p class="uk-margin-small-top">For enquiries, complants and feedback, please reach out to us.</p>
                                @if($company->address != '') 
                                <div class="uk-flex uk-flex-middle uk-margin">
                                    <div class="uk-margin-small-right">
                                        <i class="fas fa-map-marker fa-sm in-icon-wrap circle small primary-color"></i>
                                    </div>
                                    <div>
                                        <p class="uk-margin-remove">{{ ucfirst($company->address) }}</p>
                                    </div>
                                </div>
                                @endif
                                <div class="uk-flex uk-flex-middle uk-margin">
                                    <div class="uk-margin-small-right">
                                        <i class="fas fa-envelope fa-sm in-icon-wrap circle small primary-color"></i>
                                    </div>
                                    <div>
                                        <p class="uk-margin-remove">{{ $company->email }}</p>
                                    </div>
                                </div>
                                @if($company->phone != '')
                                 <div class="uk-flex uk-flex-middle uk-margin">
                                       <div class="uk-margin-small-right">
                                          <i class="fas fa-phone fa-sm in-icon-wrap circle small primary-color"></i>
                                       </div>
                                       <div>
                                          <p class="uk-margin-remove">{{ $company->phone }}</p>
                                       </div>
                                 </div>
                                 @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
        <!-- section content end -->
@endsection