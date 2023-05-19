@extends('layouts.welcome')

@section('title', 'Home')
    
@section('content')
    <main>
        <!-- slideshow content begin -->
        <div class="uk-section uk-padding-remove-vertical">
            <div class="uk-light in-slideshow uk-background-cover uk-background-top-center" style="background-image: url(landing/img/in-liquid-slide-bg.png);" data-uk-slideshow>
                <ul class="uk-slideshow-items">
                    <li>
                        <div class="uk-container">
                            <div class="uk-grid-medium" data-uk-grid>
                                <div class="uk-width-1-2@s">
                                    <div class="uk-overlay">
                                        <h1>Award-winning trading platforms.</h1>
                                        <p class="uk-text-lead uk-visible@m">Explore endless trading opportunities with tight spreads and no commission</p>
                                        <a href="/pricing" class="uk-button uk-button-default uk-border-rounded uk-visible@s">View Pricing</a>
                                    </div>
                                </div>
                                <div class="uk-width-1-2@s">
                                    <img class="in-slide-img uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-right" src="landing/img/handshake-2998302_1280.jpg
" data-src="landing/img/handshake-2998302_1280.jpg
" alt="image-slide" width="500" height="400" data-uk-img>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-container">
                            <div class="uk-grid-medium uk-grid uk-grid-stack" data-uk-grid="">
                                <div class="uk-width-1-2@s uk-first-column">
                                    <div class="uk-overlay">
                                        <h1>Multi-regulated global broker.</h1>
                                        <p class="uk-text-lead uk-visible@m">A trusted destination for traders worldwide, Authorised by FCA, ASIC &amp; FSCA</p>
                                        <a href="/pricing" class="uk-button uk-button-default uk-border-rounded uk-visible@s">View Pricing</a>
                                    </div>
                                </div>
                                <div class="uk-width-1-2@s">
                                    <img class="in-slide-img uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-right" src="landing/img/finance-5771541_1280.jpg" data-src="landing/img/finance-5771541_1280.jpg" alt="image-slide" width="500" height="400" data-uk-img="">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-container">
                            <div class="uk-grid-medium" data-uk-grid>
                                <div class="uk-width-1-2@s">
                                    <div class="uk-overlay">
                                        <h1>Learn forex with our courses.</h1>
                                        <p class="uk-text-lead uk-visible@m">Weekly educational workshops are a great resource for any skill level trader</p>
                                        <a href="/register" class="uk-button uk-button-default uk-border-rounded uk-visible@s">Get Started</a>
                                    </div>
                                </div>
                                <div class="uk-width-1-2@s">
                                    <img class="in-slide-img uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-right" src="landing/img/entrepreneur-2411763_1920.jpg" data-src="landing/img/entrepreneur-2411763_1920.jpg" alt="image-slide" width="500" height="400" data-uk-img>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-previous data-uk-slideshow-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-next data-uk-slideshow-item="next"></a>
                <div class="uk-section uk-padding-remove-vertical in-slideshow-features uk-visible@m">
                    <div class="uk-container">
                        <div class="uk-grid uk-flex uk-flex-center">
                            <div class="uk-width-5-6@m">
                                <div class="uk-grid uk-child-width-1-6@m uk-text-center" data-uk-grid>
                                    <div class="slide-icons-1">
                                        <img src="landing/img/in-lazy.gif" data-src="landing/img/in-liquid-icon-7.svg" alt="sample-icon" width="48" height="48" data-uk-img>
                                        <a class="uk-button uk-button-text uk-align-center" href="#">Crypto<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                                    </div>
                                    <div class="slide-icons-1">
                                        <img src="landing/img/in-lazy.gif" data-src="landing/img/in-liquid-icon-5.svg" alt="sample-icon" width="48" height="48" data-uk-img>
                                        <a class="uk-button uk-button-text uk-align-center" href="#">Forex<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                                    </div>
                                    <div class="slide-icons-1">
                                        <img src="landing/img/in-lazy.gif" data-src="landing/img/in-liquid-icon-6.svg" alt="sample-icon" width="48" height="48" data-uk-img>
                                        <a class="uk-button uk-button-text uk-align-center" href="#">Indices<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                                    </div>
                                    <div class="slide-icons-1">
                                        <img src="landing/img/in-lazy.gif" data-src="landing/img/in-liquid-icon-8.svg" alt="sample-icon" width="48" height="48" data-uk-img>
                                        <a class="uk-button uk-button-text uk-align-center" href="#">Stock<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                                    </div>
                                    <div class="slide-icons-1">
                                        <img src="landing/img/in-lazy.gif" data-src="landing/img/in-liquid-icon-9.svg" alt="sample-icon" width="48" height="48" data-uk-img>
                                        <a class="uk-button uk-button-text uk-align-center" href="#">BonD<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                                    </div>
                                    <div class="slide-icons-1">
                                        <img src="landing/img/in-lazy.gif" data-src="landing/img/in-liquid-icon-15.svg" alt="sample-icon" width="48" height="48" data-uk-img>
                                        <a class="uk-button uk-button-text uk-align-center" href="#">Real Estate<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slideshow content end -->
        <div class="uk-section uk-section-secondary in-liquid-1">
            <div class="uk-container uk-light">
                <div class="uk-grid uk-flex uk-flex-middle">
                    <div class="uk-width-1-2@m">
                        <h2>Save time. Get <span class="in-highlight">higher return</span>. Multiply wealth.</h2>
                    </div>
                    <div class="uk-width-1-2@m">
                        <a class="uk-button uk-button-default uk-border-rounded uk-align-right@m" href="/about-us">Find out more<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                    </div>
                </div>
                <div class="uk-child-width-1-3@m uk-grid" data-uk-grid="">
                    <div class="uk-first-column">
                        <div class="uk-card uk-card-secondary uk-border-rounded uk-cover-container">
                            <div class="uk-card-body">
                                <h3>Profitable Plans</h3>
                                <p>Our investment plans are designed to generate maximum profits with minimum investment so that clients can increase the level of their financial status in today’s world.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-secondary uk-border-rounded uk-cover-container">
                            <div class="uk-card-body">
                                <h3>Fast Payments</h3>
                                <p>We have a system where we process payments very fast ( within 24 business hours ) so that our clients enjoy payouts without any unnecessary waiting time. Our payouts are also 7 days a week.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-secondary uk-border-rounded uk-cover-container">
                            <div class="uk-card-body">
                                <h3>24/7 Customer Support</h3>
                                <p>We understand how important having reliable support service is to you. Please don't hesitate to contact us, through our chat app or email should you have any questions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content begin -->
        <div class="uk-section in-liquid-6">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-middle" data-uk-grid>
                    <div class="uk-width-expand@m">
                        <h2>Discover a World of <span class="in-highlight">Opportunities</span>.</h2>
                        <p>
                            Our mission is to provide our clients with wide-ranging and best-in-class financial services, and to become the primary firm of choice for aspiring investors across the World.
                        </p>
                        <div class="uk-margin-medium-top">
                            <a class="uk-button uk-button-primary uk-border-rounded uk-margin-small-right" href="/about-us">Discover<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                        </div>
                        <div class="uk-grid-medium uk-child-width-1-3@s uk-child-width-1-3@m uk-margin-medium" data-uk-grid>
                            <div>
                                <div class="in-count-wrap">
                                    <p class="uk-text-lead uk-margin-remove-bottom count" data-counter-end="1700" data-counter-append="+">0+</p>
                                    <p class="uk-text-muted uk-margin-remove-top">Markets</p>
                                </div>
                            </div>
                            <div>
                                <div class="in-count-wrap">
                                    <p class="uk-text-lead uk-margin-remove-bottom count" data-counter-end="43">0</p>
                                    <p class="uk-text-muted uk-margin-remove-top">Countries</p>
                                </div>
                            </div>
                            <div>
                                <div class="in-count-wrap">
                                    <p class="uk-text-lead uk-margin-remove-bottom count" data-counter-end="23">0</p>
                                    <p class="uk-text-muted uk-margin-remove-top">Currencies</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-3-5@m uk-inline uk-dark">
                        <img src="landing/img/in-lazy.gif" data-src="landing/img/in-liquid-object-4.svg" alt="sample-image" data-width data-height data-uk-img>
                        <span class="uk-position-absolute uk-transform-center dot-pulse one" style="left: 24%; top: 42%"></span>
                        <span class="uk-position-absolute uk-transform-center dot-pulse two" style="left: 26%; top: 32%"></span>
                        <span class="uk-position-absolute uk-transform-center dot-pulse one" style="left: 34%; top: 30%"></span>
                        <span class="uk-position-absolute uk-transform-center dot-pulse one" style="left: 48%; top: 27%"></span>
                        <span class="uk-position-absolute uk-transform-center dot-pulse one" style="left: 54%; top: 30%"></span>
                        <span class="uk-position-absolute uk-transform-center dot-pulse two" style="left: 70%; top: 47%"></span>
                        <span class="uk-position-absolute uk-transform-center dot-pulse two" style="left: 59%; top: 38%"></span>
                        <span class="uk-position-absolute uk-transform-center dot-pulse two" style="left: 76%; top: 53%"></span>
                        <span class="uk-position-absolute uk-transform-center dot-pulse one" style="left: 86%; top: 35%"></span>
                        <span class="uk-position-absolute uk-transform-center dot-pulse two" style="left: 80%; top: 43%"></span>
                        <span class="uk-position-absolute uk-transform-center dot-pulse one" style="left: 89%; top: 72%"></span>
                        <p class="uk-text-small uk-text-muted uk-text-center uk-margin-top">Graphic is for illustration purpose only and should not be relied upon for investment decisions.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <div class="uk-section in-liquid-6">
            <div class="uk-container">
                <div class="uk-grid-match uk-grid-medium uk-child-width-1-2@s uk-child-width-1-2@m in-card-10 uk-grid uk-grid-stack" data-uk-grid="">
                    <div class="uk-width-1-1 uk-first-column">
                        <h2 class="uk-margin-remove">Our <span class="in-highlight">Services</span>.</h2>
                    </div>
                    <div class="uk-grid-margin uk-first-column">
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-light in-card-green">
                            <div>
                                <img class="uk-width-1-1" src="landing/img/mining.jpg" data-src="landing/img/mining.jpg" alt="Certificate" data-width="" data-height="" data-uk-img="">
                            </div>
                            <h4 class="uk-margin-top">
                                <a href="#">Crypto Mining/Investment<i class="fas fa-chevron-right uk-float-right"></i></a>
                            </h4>
                            <hr>
                            <p>Bitcoin mining is the process of creating new bitcoin by solving a computational puzzle. Bitcoin mining is necessary to maintain the ledger of transaction upon which bitcoin is based. Miners have become very sophisticated over the last few years... Exchange Digital Mining have through the years been part of the bitcoin mining sector. Exchange Digital Mining having a pool of professional crypto miners uses complex machinery to speed up mining process</p>
                        </div>
                    </div>
                    <div class="uk-grid-margin uk-first-column">
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-light in-card-blue">
                            <div>
                            <img class="uk-width-1-1" src="landing/img/realestate.jpg" data-src="landing/img/realestate.jpg" alt="Certificate" data-width="" data-height="" data-uk-img="">
                            </div>
                            <h4 class="uk-margin-top">
                                <a href="#">Real Estate/Property Investment<i class="fas fa-chevron-right uk-float-right"></i></a>
                            </h4>
                            <hr>
                            <p>Real estate is a $217 trillion-dollar market making up almost 60% of all global wealth. It's the largest source of wealth, yet it is illiquid for 99% of the world today. In the past, you only had access to real estate if you were rich or had rich friends-meaning that most people weren't able to benefit from the passive income and capital appreciation it provides.. Today, Exchange Digital Miners cut out the expensive middle man and provide access for investors, by investing in shares of real estate using crypto currencies.</p>
                        </div>
                    </div>
                    <div class="uk-grid-margin uk-first-column">
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-light in-card-purple">
                            <div>
                                <img class="uk-width-1-1" src="landing/img/chart-1905225_640.jpg" data-src="landing/img/chart-1905225_640.jpg" alt="Certificate" data-width="" data-height="" data-uk-img="">
                            </div>
                            <h4 class="uk-margin-top">
                                <a href="#">Forex Trading<i class="fas fa-chevron-right uk-float-right"></i></a>
                            </h4>
                            <hr>
                            <p>Forex trading covers about 5trillion dollars daily by just the act of trading foreign currencies and precious assets. It comes with a lot of strategies . Exchange Digital Mining has successfully secured 0.04% of the daily forex revenue by effective use of Technical and fundamental Analysis, Fibonacci etC. This serves as a high way of generating a lot of revenue for investors.</p>
                        </div>
                    </div>
                    <div class="uk-grid-margin uk-first-column">
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-light in-card-navy">
                            <div>
                                <img class="uk-width-1-1" src="landing/img/stock-624712_640.jpg" data-src="landing/img/stock-624712_640.jpg" alt="Certificate" data-width="" data-height="" data-uk-img="">
                            </div>
                            <h4 class="uk-margin-top">
                                <a href="#">Bonds &amp; Stock<i class="fas fa-chevron-right uk-float-right"></i></a>
                            </h4>
                            <hr>
                            <p>Stocks represent partial ownership, or equity, in a company. When you buy stock, you're actually purchasing a tiny slice of the company — one or more "shares." And the more shares you buy, the more of the company you own. Let’s say a company has a stock price of $50 per share, and you invest $2,500 (that's 50 shares for $50 each).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-section in-liquid-2">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-5-6@m uk-margin-medium-top">
                        <div class="uk-card uk-card-default uk-card-body uk-background-contain uk-background-top-left" style="background-image: url(img/in-liquid-card-bg.png);" data-uk-img="">
                            <div class="uk-grid uk-child-width-1-3@s uk-child-width-1-3@m uk-text-center uk-grid-stack" data-uk-grid="">
                                <div class="uk-width-1-1 uk-first-column">
                                    <h4><span>Simple steps to start trade.</span></h4>
                                </div>
                                <div class="uk-first-column">
                                    <span class="in-icon-wrap circle">1</span>
                                    <p>Register account</p>
                                </div>
                                <div class="uk-first-column">
                                    <span class="in-icon-wrap circle">2</span>
                                    <p>Fund your account</p>
                                </div>
                                <div class="uk-first-column">
                                    <span class="in-icon-wrap circle">3</span>
                                    <p>Start your trade</p>
                                </div>
                                <div class="uk-width-1-1 uk-first-column">
                                    <a href="/pricing" class="uk-button uk-button-primary uk-button-large uk-border-rounded">View Pricing</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content begin -->
        <div class="uk-section in-liquid-7 in-offset-top-10">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-5-6@m uk-background-contain uk-background-center-center" style="background-image: url(img/in-liquid-7-bg.png);" data-uk-img>
                        <div class="uk-text-center">
                            <h2 class="uk-margin-remove">Exchange Digital Trading platform.</h2>
                            <p class="uk-text-lead uk-text-muted uk-margin-small-top">Improve your trading results with our industry-leading technology</p>
                        </div>
                        <div class="uk-grid-medium uk-child-width-1-3@s uk-child-width-1-3@m uk-text-center uk-margin-top" data-uk-grid>
                            <div>
                                <img src="landing/img/in-lazy.gif" data-src="landing/img/in-liquid-award.svg" alt="wave-award" width="71" height="58" data-uk-img>
                                <h6 class="uk-margin-small-top uk-margin-remove-bottom">Best CFD Broker</h6>
                                <p class="uk-text-small uk-margin-remove-top">TradeON Summit 2020</p>
                            </div>
                            <div>
                                <img src="landing/img/in-lazy.gif" data-src="landing/img/in-liquid-award.svg" alt="wave-award" width="71" height="58" data-uk-img>
                                <h6 class="uk-margin-small-top uk-margin-remove-bottom">Best Execution Broker</h6>
                                <p class="uk-text-small uk-margin-remove-top">Forex EXPO Dubai 2020</p>
                            </div>
                            <div>
                                <img src="landing/img/in-lazy.gif" data-src="landing/img/in-liquid-award.svg" alt="wave-award" width="71" height="58" data-uk-img>
                                <h6 class="uk-margin-small-top uk-margin-remove-bottom">Best Trading Platform</h6>
                                <p class="uk-text-small uk-margin-remove-top">London Summit 2020</p>
                            </div>
                        </div>
                        <img class="uk-align-center" src="landing/img/in-liquid-7-mockup.png" data-src="landing/img/in-liquid-7-mockup.png" alt="sample-images" width="691" height="420" data-uk-img>
                        <div class="uk-grid-divider uk-child-width-1-2@s uk-child-width-1-4@m uk-text-center in-offset-top-10" data-uk-grid>
                            <div>
                                <h2 class="uk-margin-small-bottom">~30ms</h2>
                                <p class="uk-text-small uk-text-uppercase uk-margin-remove-top">executions speed*</p>
                            </div>
                            <div>
                                <h2 class="uk-margin-small-bottom">24/7</h2>
                                <p class="uk-text-small uk-text-uppercase uk-margin-remove-top">support</p>
                            </div>
                            <div>
                                <h2 class="uk-margin-small-bottom">0.0</h2>
                                <p class="uk-text-small uk-text-uppercase uk-margin-remove-top">spread from 0.0 pips</p>
                            </div>
                            <div>
                                <h2 class="uk-margin-small-bottom">150+</h2>
                                <p class="uk-text-small uk-text-uppercase uk-margin-remove-top">trading instruments</p>
                            </div>
                        </div>
                        <div class="uk-text-center uk-margin-medium-top">
                            <a class="uk-button uk-button-primary uk-border-rounded uk-margin-small-right" href="/register">Create account<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                            <a class="uk-button uk-button-secondary uk-border-rounded" href="/login">Account Login<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <div class="uk-section uk-section-muted uk-padding-large in-liquid-12 uk-background-contain uk-background-bottom-center" data-src="img/in-liquid-12-bg.png" data-uk-img="" style="background-image: url(&quot;landing/img/in-liquid-12-bg.png&quot;);">
            <div class="uk-container">
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: fade; finite: true; min-height: 300; max-height: 400;">

            <ul class="uk-slideshow-items">
                <li>
                    <blockquote>
                        <p class="uk-margin-bottom">Great platform for trading. Exchange Digital Mining has been making my trading experience enjoyable and secure.</p>
                        <footer><span>Nina van Adrichem</span></footer>
                    </blockquote>
                </li>
                <li>
                <blockquote>
                                        <p class="uk-margin-bottom">I know nothing about trading, but has made it possible for me to accomplish such tasks without my direct involvement with excellent weekly returns.</p>
                                        <footer><span>Adrian C. Welch</span></footer>
                                    </blockquote>
                </li>
                <li>
                <blockquote>
                                        <p class="uk-margin-bottom">At first I was sceptical on joining these guys but after several successfull trades I belive they are the best platform any trader can ask for.</p>
                                        <footer><span>Richie Chenoweth</span></footer>
                                    </blockquote>
                </li>
                <li>
                <blockquote>
                                        <p class="uk-margin-bottom">
                                Recommended investment company for you who are always looking for good investment with good daily returns, swift withdrawal, and excellent support .</p>
                                        <footer><span>Henry Arrora</span></footer>
                                    </blockquote>
                </li>
                <li>
                <blockquote>
                                        <p class="uk-margin-bottom">
I am happy to look back on investing with you these last six years. You have always been outstanding – extremely conscientious and ethical
<footer><span>Zenny Joya</span></footer>
                                    </blockquote>
                </li>
                <li>
                <blockquote>
                                        <p class="uk-margin-bottom">I highly recommend Exchangedigitalmining if you really want your money to work for you. Great people to deal with: very professional and offer a fantastic level of personal customer service.</p>
                                        <footer><span>Mona Margo</span></footer>
                                    </blockquote>
                </li>
                <li>
                <blockquote>
                                        <p class="uk-margin-bottom">I am a CPA who has clients who prefer real estate over the stock market.  My clients and I have several investments with them. Exchangedigitalmining is a reputable company whose deals live up to the prospectus.  I continue to seek syndicators such as Exchangedigitalmining for my clients to invest with.</p>
                                        <footer><span>Stephen Rayes</span></footer>
                                    </blockquote>
                </li>
                <li>
                <blockquote>
                                        <p class="uk-margin-bottom uk-margin-remove-top">I feel very fortunate to have the opportunity to do business with this company.</p>
                                        <footer><span>Marlum Kayum</span></footer>
                                    </blockquote>
                </li>
            </ul>

            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

            </div>
            </div>
        </div>
        
        <div class="uk-section in-liquid-14">
            <div class="uk-container">
                <div class="uk-grid-large uk-flex uk-flex-middle uk-grid" data-uk-grid="">
                    <div class="uk-width-expand@m uk-first-column">
                        <h2>A broker you can <span class="in-highlight">Trust</span>.</h2>
                    </div>
                    <div class="uk-width-1-3@m">
                        <img class="uk-width-1-1" src="landing/img/cert.png" data-src="landing/img/cert.png" alt="Certificate" data-width="" data-height="" data-uk-img="">
                    </div>
                    <div class="uk-width-1-3@m">
                        <img class="uk-width-1-1" src="landing/img/cert_2.png" data-src="landing/img/cert_2.png" alt="Certificate" data-width="" data-height="" data-uk-img="">
                    </div>
                </div>
            </div>
        </div>
        <!-- section content begin -->
        <div class="uk-section in-liquid-9">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-5-6@m uk-text-center">
                        <h2 class="uk-margin-remove">Choose the best account type for you.</h2>
                        <div class="uk-grid-medium uk-child-width-1-3@s uk-child-width-1-5@m uk-margin-medium-top in-offset-bottom-20" data-uk-grid>
                            <div>
                                <img src="landing/img/in-lazy.gif" data-src="landing/img/in-liquid-icon-11.svg" alt="sample-icon" width="82" height="82" data-uk-img>
                                <p>Individual accounts</p>
                            </div>
                            <div>
                                <img src="landing/img/in-lazy.gif" data-src="landing/img/in-liquid-icon-12.svg" alt="sample-icon" width="82" height="82" data-uk-img>
                                <p>Joint accounts</p>
                            </div>
                            <div>
                                <img src="landing/img/in-lazy.gif" data-src="landing/img/in-liquid-icon-13.svg" alt="sample-icon" width="82" height="82" data-uk-img>
                                <p>Trust accounts</p>
                            </div>
                            <div>
                                <img src="landing/img/in-lazy.gif" data-src="landing/img/in-liquid-icon-14.svg" alt="sample-icon" width="82" height="82" data-uk-img>
                                <p>Family account</p>
                            </div>
                            <div>
                                <img src="landing/img/in-lazy.gif" data-src="landing/img/in-liquid-icon-15.svg" alt="sample-icon" width="82" height="82" data-uk-img>
                                <p>Institutional</p>
                            </div>
                        </div>
                        <p class="uk-text-small uk-margin-medium-top in-text-devices"><span>Trade anywhere, anytime using our various platforms.</span></p>
                        <div class="uk-card uk-card-default uk-card-body uk-box-shadow-small">
                            <div class="uk-grid-divider uk-child-width-1-2@s uk-child-width-1-4@m" data-uk-grid>
                                <div>
                                    <i class="fab fa-apple"></i>
                                    <p class="uk-text-small">MacOS/iPhone</p>
                                </div>
                                <div>
                                    <i class="fab fa-android"></i>
                                    <p class="uk-text-small">Android app</p>
                                </div>
                                <div>
                                    <i class="fab fa-windows"></i>
                                    <p class="uk-text-small">Windows 10</p>
                                </div>
                                <div>
                                    <i class="fab fa-chrome"></i>
                                    <p class="uk-text-small">WebTrader</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <div class="uk-card uk-card-primary uk-box-shadow-small uk-border-rounded uk-background-cover" style="background-image: url(landing/img/in-card-background-1.jpg);">
                            <div class="uk-card-body">
                                <h2 class="uk-margin-remove-bottom">10% Referral Commission</h2>
                                <p class="uk-margin-small-top">At Exchange Digital Mining we know that the best way to find trustfull investors is through connections to other good investors like you. We also want to provide professionals with opportunities to profit from both What and Who they know. Marrying these two concepts, ultimate digital mining hub has developed a unique Referral Commission system to reward users for introducing new investors and professionals. This referral commission is given anytime a referral make an investment deposit in the website. Reinvestment from account balance does not attract a referral commision.</p>
                                <a class="uk-button uk-button-primary uk-border-rounded" href="/register">Open an Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection