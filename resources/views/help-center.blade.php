@extends('layouts.app')

@section('title', 'Help Center/Knowledge base')

@section('content')
<!-- section content begin -->
<div class="uk-section">
   <div class="uk-container">
      <div class="uk-grid">
         <div class="uk-width-1-1 in-content-10">
            <div
               class="uk-card uk-card-primary uk-card-body uk-border-rounded uk-background-bottom-left uk-background-contain"
               style="background-image: url(landing/img/in-content-10-image.png);">
               <div class="uk-grid uk-flex uk-flex-center">
                  <div class="uk-width-3-5@m uk-text-center">
                     <h2 class="uk-margin-small-top">Hi, we're here to help.</h2>
                     <form class="uk-search uk-search-default uk-width-1-1 uk-margin-bottom">
                        <span data-uk-search-icon></span>
                        <input class="uk-search-input uk-border-pill" type="search"
                           placeholder="Search for articles...">
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- section content end -->
<!-- section content begin -->
<div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-3-5@m">
                        <div class="uk-grid-small uk-child-width-1-2@s uk-child-width-1-1@m in-content-11" data-uk-grid>
                            <div>
                                <a href="#" class="uk-card uk-card-small uk-card-default uk-card-body uk-border-rounded uk-display-block">
                                    <div class="uk-grid" data-uk-grid>
                                        <div class="uk-width-auto@m uk-flex uk-flex-middle">
                                            <i class="fas fa-book fa-lg in-icon-wrap circle in-margin-remove-left@s uk-margin-left"></i>
                                        </div>
                                        <div class="uk-width-expand@m in-margin-small-top@s">
                                            <h4 class="uk-margin-small-bottom">What is Bitcoin</h4>
                                            <p class="uk-text-small uk-margin-remove-bottom">Bitcoin is a form of digital currency which is based on an open source code that was created and is held electronically. Bitcoin is a decentralized form of currency, meaning that it does not belong to any form of government and is not controlled by anyone.</p>
                                            
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#" class="uk-card uk-card-small uk-card-default uk-card-body uk-border-rounded uk-display-block">
                                    <div class="uk-grid" data-uk-grid>
                                        <div class="uk-width-auto@m uk-flex uk-flex-middle">
                                            <i class="fas fa-book fa-lg in-icon-wrap circle in-margin-remove-left@s uk-margin-left"></i>
                                        </div>
                                        <div class="uk-width-expand@m in-margin-small-top@s">
                                            <h4 class="uk-margin-small-bottom">What is Bitcoin Mining</h4>
                                            <p class="uk-text-small uk-margin-remove-bottom">Bitcoin mining is analogous to the mining of gold, but its digital form. The process involves specialized computers solving algorithmic equations or hash functions. These problems help miners to confirm blocks of transactions held within the network. Bitcoin mining provides a reward for miners by paying out in Bitcoin in turn the miners confirm transactions on the blockchain. Miners introduce new Bitcoin into the network and also secure the system with transaction confirmation. They are also rewarded network fees for when they harvest new coin and a time when the last bitcoin is found mining will continue.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#" class="uk-card uk-card-small uk-card-default uk-card-body uk-border-rounded uk-display-block">
                                    <div class="uk-grid" data-uk-grid>
                                        <div class="uk-width-auto@m uk-flex uk-flex-middle">
                                            <i class="fas fa-book fa-lg in-icon-wrap circle in-margin-remove-left@s uk-margin-left"></i>
                                        </div>
                                        <div class="uk-width-expand@m in-margin-small-top@s">
                                            <h4 class="uk-margin-small-bottom">How do I make a Deposit</h4>
                                            <p class="uk-text-small uk-margin-remove-bottom">To deposit funds in your trading account is quick and simple For your convenience you may choose one of the several available deposit methods. To make a successful deposit please follow the steps below:</p>
                                               <ul>
                                                  <li>Login to your account and Click on Pricing button in the side menu.</li>
                                                  <li>Choose the deposit option And follow the steps to complete your transaction.</li>
                                                
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#" class="uk-card uk-card-small uk-card-default uk-card-body uk-border-rounded uk-display-block">
                                    <div class="uk-grid" data-uk-grid>
                                        <div class="uk-width-auto@m uk-flex uk-flex-middle">
                                            <i class="fas fa-book fa-lg in-icon-wrap circle in-margin-remove-left@s uk-margin-left"></i>
                                        </div>
                                        <div class="uk-width-expand@m in-margin-small-top@s">
                                            <h4 class="uk-margin-small-bottom">How do I make a Withdrawal and how long does it take</h4>
                                            <p class="uk-text-small uk-margin-remove-bottom">To make a withdrawal request click the WITHDRAW button beside an active or completed trade and input the required details to withdraw. Once we receive your withdrawal request we process immediately and send to your bitcoin wallet</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
@endsection