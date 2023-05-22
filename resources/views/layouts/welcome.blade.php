<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta name="description" content="Premium HTML5 Template by Indonez">
    <meta name="keywords" content="investing, cryptocurrency, real estate, forex, finance">
    <meta name="author" content="Indonez">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f2f3f5" />
    <!-- Site Properties -->
    <title>{{ $company->name }}-@yield('title')</title>
    <!-- Critical preload -->
    <link rel="preload" href="landing/js/vendors/uikit.min.js" as="script">
    <link rel="preload" href="landing/css/vendors/uikit.min.css" as="style">
    <link rel="preload" href="landing/css/style.css" as="style">
    <!-- Icon preload -->
    <link rel="preload" href="landing/fonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="landing/fonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin>
    <!-- Font preload -->
    <link rel="preload" href="landing/fonts/inter-v2-latin-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="landing/fonts/inter-v2-latin-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="landing/fonts/inter-v2-latin-700.woff2" as="font" type="font/woff2" crossorigin>
    <!-- Favicon and apple icon -->
    <link rel="shortcut icon" href="{{ asset('assets/auth/images/logo/favicon.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="landing/apple-touch-icon.png">
    <!-- CSS -->
    <link rel="stylesheet" href="landing/css/vendors/uikit.min.css">
    <link rel="stylesheet" href="landing/css/style.css">
</head>

<body>

    <header>
        <!-- header content begin -->
        <div class="uk-section uk-padding-remove-vertical">
            <nav class="uk-navbar-container" data-uk-sticky="show-on-up: true; animation: uk-animation-slide-top;">
                <div class="uk-container" data-uk-navbar>
                    <div class="uk-navbar-left">
                        <div class="uk-navbar-item">
                            <!-- logo begin -->
                            <!-- <a class="uk-logo" href="/">
                                <svg width="160" height="50" viewBox="0 0 356 110" class="css-1j8o68f">
                                    <defs id="SvgjsDefs4290">
                                        <linearGradient id="SvgjsLinearGradient4299">
                                            <stop id="SvgjsStop4300" stop-color="#8f5e25" offset="0"></stop>
                                            <stop id="SvgjsStop4301" stop-color="#fbf4a1" offset="0.5"></stop>
                                            <stop id="SvgjsStop4302" stop-color="#8f5e25" offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient4303">
                                            <stop id="SvgjsStop4304" stop-color="#8f5e25" offset="0"></stop>
                                            <stop id="SvgjsStop4305" stop-color="#fbf4a1" offset="0.5"></stop>
                                            <stop id="SvgjsStop4306" stop-color="#8f5e25" offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient4307">
                                            <stop id="SvgjsStop4308" stop-color="#8f5e25" offset="0"></stop>
                                            <stop id="SvgjsStop4309" stop-color="#fbf4a1" offset="0.5"></stop>
                                            <stop id="SvgjsStop4310" stop-color="#8f5e25" offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient4311">
                                            <stop id="SvgjsStop4312" stop-color="#8f5e25" offset="0"></stop>
                                            <stop id="SvgjsStop4313" stop-color="#fbf4a1" offset="0.5"></stop>
                                            <stop id="SvgjsStop4314" stop-color="#8f5e25" offset="1"></stop>
                                        </linearGradient>
                                    </defs>
                                    <g id="SvgjsG4291" featurekey="symbolFeature-0"
                                        transform="matrix(0.32353908792151015,0,0,0.32353908792151015,-3.882469055058122,1.08749023004372)"
                                        fill="url(#SvgjsLinearGradient4299)">
                                        <defs xmlns="http://www.w3.org/2000/svg"></defs>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                            <path class="fil0"
                                                d="M256 177c-4,-2 -7,-4 -11,-4 -9,-1 -39,11 -39,11 1,0 18,2 21,3 2,1 4,2 6,2 2,0 12,-6 23,-12zm-208 -16l-36 9 20 75 36 -9 -20 -75zm235 -83c19,0 35,16 35,35 0,19 -16,35 -35,35 -20,0 -35,-16 -35,-35 0,-19 15,-35 35,-35zm-12 40l6 -1c0,4 2,6 6,6 2,0 5,-1 5,-4 0,-3 -4,-4 -7,-4 -4,-1 -9,-3 -9,-9 0,-5 4,-7 8,-8l0 -3 5 0 0 3c5,1 8,4 8,9l-5 0c-1,-3 -3,-4 -6,-4 -1,0 -4,1 -4,3 0,2 4,3 6,4 5,1 10,2 10,9 0,6 -4,8 -9,9l0 3 -5 0 0 -3c-5,-1 -8,-4 -9,-10zm12 -35c16,0 29,14 29,30 0,16 -13,30 -29,30 -17,0 -30,-14 -30,-30 0,-16 13,-30 30,-30zm0 6c-14,0 -24,11 -24,24 0,13 10,24 24,24 13,0 23,-11 23,-24 0,-13 -10,-24 -23,-24zm-82 -12c25,0 45,20 45,45 0,25 -20,45 -45,45 -25,0 -46,-20 -46,-45 0,-25 21,-45 46,-45zm-15 52l7 -1c1,4 3,7 8,7 3,0 7,-1 7,-5 0,-4 -6,-5 -9,-6 -6,-1 -12,-4 -12,-11 0,-6 5,-9 10,-10l0 -4 7 0 0 4c6,1 10,4 10,11l-7 1c-1,-4 -3,-6 -7,-6 -2,0 -6,1 -6,4 0,3 6,4 8,5 7,1 13,3 13,12 0,7 -5,10 -11,11l0 4 -7 0 0 -4c-6,-1 -10,-5 -11,-12zm15 -45c21,0 38,17 38,38 0,21 -17,38 -38,38 -21,0 -39,-17 -39,-38 0,-21 18,-38 39,-38zm0 7c-17,0 -31,14 -31,31 0,17 14,31 31,31 17,0 30,-14 30,-31 0,-17 -13,-31 -30,-31zm-118 134c3,-2 9,-5 15,-7 5,-2 9,-3 22,4 14,7 36,21 50,28 14,6 22,9 37,5 40,-11 72,-32 101,-49 31,-18 -1,-28 -15,-19 -7,5 -45,26 -46,26 -5,3 -11,7 -16,8 -24,6 -71,-1 -84,-23 -2,-2 -1,-2 2,-1 13,5 22,11 36,14 9,1 25,7 41,4 13,-2 18,-17 1,-22 -13,-3 -23,-2 -37,-8 -18,-6 -23,-12 -36,-23 -6,-5 -11,-9 -20,-9 -9,-1 -22,1 -34,4 -12,2 -24,6 -30,7 -6,2 -6,2 -4,12 2,10 8,29 10,39 3,10 3,11 7,10zm205 -45c-3,-11 -15,-4 -23,-1 -10,5 -21,11 -26,14 5,4 7,9 7,13 6,-3 44,-21 42,-26z"
                                                style="fill: url(#SvgjsLinearGradient4299);"></path>
                                        </g>
                                    </g>
                                    <g id="SvgjsG4292" featurekey="textGroupContainer" transform="matrix(1,0,0,1,355,0)"
                                        fill="url(#SvgjsLinearGradient4303)">
                                        <rect xmlns="http://www.w3.org/2000/svg" y="0" height="1" width="1" opacity="0">
                                        </rect>
                                        <rect xmlns="http://www.w3.org/2000/svg" y="0" x="-235" width="5" height="110">
                                        </rect>
                                    </g>
                                    <g id="SvgjsG4293" featurekey="nameFeature-0"
                                        transform="matrix(1.8702075503465831,0,0,1.8702075503465831,135.7557512962979,17.152794067707127)"
                                        fill="url(#SvgjsLinearGradient4307)">
                                        <path
                                            d="M4.12 17.32 l5.92 0 l0 2.68 l-6.32 0 l-2.52 0 l0 -14 l2.92 0 l5.74 0 l0 2.68 l-5.74 0 l0 2.96 l4.34 0 l0 2.64 l-4.34 0 l0 3.04 z M24.14 20 l-3.44 0 l-3.02 -4.5 l-3 4.5 l-3.44 0 l4.7 -7.08 l-4.64 -6.92 l3.44 0 l2.92 4.34 l2.88 -4.34 l3.44 0 l-4.6 6.92 z M37.8 18.5 c-1.24 1.12 -2.9 1.7 -4.76 1.7 c-3.92 0 -7.3 -2.94 -7.3 -7.2 s3.38 -7.2 7.3 -7.2 c1.84 0 3.48 0.6 4.68 1.66 l-1.76 1.98 c-0.74 -0.52 -1.74 -0.9 -2.76 -0.9 c-2.52 0 -4.42 1.86 -4.42 4.46 s1.9 4.46 4.42 4.46 c1.06 0 2.1 -0.4 2.86 -1 z M48.26 6 l2.92 0 l0 14 l-2.92 0 l0 -5.66 l-5.64 0 l0 5.66 l-2.92 0 l0 -14 l2.92 0 l0 5.66 l5.64 0 l0 -5.66 z M64.76 20 l-1.06 -2.5 l-6.76 0 l-1.06 2.5 l-3.1 0 l6.22 -14 l2.64 0 l6.24 14 l-3.12 0 z M57.96 15.120000000000001 l4.72 0 l-2.36 -5.54 z M78.64 6 l2.92 0 l0 14 l-2.22 0 l-6.94 -8.68 l0 8.68 l-2.92 0 l0 -14 l2.26 0 l6.9 8.7 l0 -8.7 z M97.14 12.559999999999999 c0.62 4.7 -2.44 7.64 -6.22 7.64 c-3.98 0 -7.26 -2.94 -7.26 -7.2 s3.36 -7.2 7.26 -7.2 c1.86 0 3.5 0.6 4.7 1.66 l-1.76 1.98 c-0.74 -0.52 -1.74 -0.9 -2.76 -0.9 c-2.54 0 -4.4 1.86 -4.4 4.46 s1.8 4.46 4.22 4.46 c1.84 0 3.12 -0.66 3.52 -2.42 l-3.3 0 l0 -2.48 l6 0 z M102.22000000000001 17.32 l5.92 0 l0 2.68 l-6.32 0 l-2.52 0 l0 -14 l2.92 0 l5.74 0 l0 2.68 l-5.74 0 l0 2.96 l4.34 0 l0 2.64 l-4.34 0 l0 3.04 z">
                                        </path>
                                    </g>
                                    <g id="SvgjsG4294" featurekey="sloganFeature-0"
                                        transform="matrix(1.1244799241744738,0,0,1.1244799241744738,136.98796809505268,59.78241383815852)"
                                        fill="url(#SvgjsLinearGradient4311)">
                                        <path
                                            d="M5.18 7.279999999999999 l0 10.54 l3.38 0 q1.4 0 2.52 -0.72 q1.06 -0.7 1.66 -1.88 t0.6 -2.58 q0 -1.46 -0.57 -2.68 t-1.63 -1.94 q-1.14 -0.74 -2.62 -0.74 l-3.34 0 z M1.86 7.279999999999999 l-0.96 -2.2 l7.6 0 q1.98 0 3.62 1.02 q1.58 0.98 2.5 2.68 t0.92 3.7 q0 1.5 -0.59 2.97 t-1.63 2.57 q-1 1.08 -2.14 1.54 q-1.1 0.44 -2.62 0.44 l-5.52 0 l0 -12.72 l-1.18 0 z M21.080000000000002 20 l-2.14 0 l0 -14.92 l2.14 0 l0 14.92 z M38.260000000000005 7 l-1.4 1.64 q-0.82 -0.84 -1.96 -1.32 t-2.4 -0.48 q-1.64 0 -2.99 0.74 t-2.11 2.02 q-0.78 1.34 -0.78 2.98 q0 1.56 0.84 2.88 q0.8 1.24 2.15 1.97 t2.91 0.73 q1.1 0 2.11 -0.38 t1.81 -1.06 l0 -2.72 l-1.92 0 l-0.94 -2.16 l5.02 0 l0 5.8 q-1.14 1.28 -2.73 1.99 t-3.37 0.71 q-2.22 0 -4.08 -1.08 q-1.82 -1.04 -2.86 -2.86 q-1.08 -1.86 -1.08 -4.08 q0 -2.14 1.14 -3.94 q1.08 -1.72 2.93 -2.73 t3.97 -1.01 q1.66 0 3.16 0.64 q1.46 0.6 2.58 1.72 z M44.44 20 l-2.14 0 l0 -14.92 l2.14 0 l0 14.92 z M59.94 7.279999999999999 l-5.26 0 l0 12.72 l-2.12 0 l0 -12.72 l-5.32 0 l0 -2.2 l12.7 0 l0 2.2 z M67.4 6.66 l-0.82 -1.84 l2.4 0 l7.18 15.18 l-2.44 0 l-0.98 -2.18 l-4.54 0 q-1.28 0 -2.3 0.24 q-0.9 0.22 -1.5 0.58 q-0.54 0.32 -0.72 0.66 l-0.38 0.7 l-2.36 0 z M69 15.620000000000001 l2.76 0 l-3.26 -6.3 l-3.3 7.14 q0.44 -0.38 1.34 -0.6 q1.02 -0.24 2.46 -0.24 z M89.41999999999999 20 l-10.46 0 l0 -14.92 l2.18 0 l0 12.74 l8.28 0 l0 2.18 z M110.17999999999999 9.74 l-5.1 6.1 l-5.06 -6.1 l0 10.26 l-2.14 0 l0 -12.82 l-1.74 -2.1 l2.82 0 l6.1 7.32 l6.18 -7.32 l2.82 0 l-1.74 2.1 l0 12.82 l-2.14 0 l0 -10.26 z M119.3 20 l-2.14 0 l0 -14.92 l2.14 0 l0 14.92 z M124.14 7.18 l-1.74 -2.1 l2.82 0 l9.58 11.4 l0 -11.4 l2.2 0 l0 14.92 l-2.16 0 l-8.56 -10.26 l0 10.26 l-2.14 0 l0 -12.82 z M143.54 20 l-2.14 0 l0 -14.92 l2.14 0 l0 14.92 z M148.37999999999997 7.18 l-1.74 -2.1 l2.82 0 l9.58 11.4 l0 -11.4 l2.2 0 l0 14.92 l-2.16 0 l-8.56 -10.26 l0 10.26 l-2.14 0 l0 -12.82 z M178.41999999999996 7 l-1.4 1.64 q-0.82 -0.84 -1.96 -1.32 t-2.4 -0.48 q-1.64 0 -2.99 0.74 t-2.11 2.02 q-0.78 1.34 -0.78 2.98 q0 1.56 0.84 2.88 q0.8 1.24 2.15 1.97 t2.91 0.73 q1.1 0 2.11 -0.38 t1.81 -1.06 l0 -2.72 l-1.92 0 l-0.94 -2.16 l5.02 0 l0 5.8 q-1.14 1.28 -2.73 1.99 t-3.37 0.71 q-2.22 0 -4.08 -1.08 q-1.82 -1.04 -2.86 -2.86 q-1.08 -1.86 -1.08 -4.08 q0 -2.14 1.14 -3.94 q1.08 -1.72 2.93 -2.73 t3.97 -1.01 q1.66 0 3.16 0.64 q1.46 0.6 2.58 1.72 z">
                                        </path>
                                    </g>
                                </svg>
                            </a> -->
                            <a class="uk-logo" href="/">
                                <img width="200" class="in-slide-img uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-right" src="landing/img/web.jpg" data-src="landing/img/web.jpg" alt="image-slide" width="500" height="400" data-uk-img="">
                            </a>
                            <!-- logo end -->
                            <!-- navigation begin -->
                            <ul class="uk-navbar-nav uk-visible@m">
                                <li><a href="/">Home</a></li>
                                <li><a href="/about-us">About</a></li>
                                <li><a href="/pricing">Pricing</a></li>
                                <li><a href="/contact-us">Contact Us</a></li>
                            </ul>
                            <!-- navigation end -->
                        </div>
                    </div>
                    <div class="uk-navbar-right">
                        <div class="uk-navbar-item uk-visible@m in-optional-nav">
                            <a href="/register"
                                class="uk-button uk-button-primary uk-border-rounded uk-margin-small-right">Create
                                Account</a>
                            <a href="/login" class="uk-button uk-button-secondary uk-border-rounded">Login</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- header content end -->
    </header>

    <main>
        @yield('content')
    </main>
    <footer>
        <!-- footer content begin -->
        <div class="uk-section uk-section-secondary in-footer-feature uk-margin-medium-top">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-5-6@m">
                        <div class="uk-grid uk-child-width-1-3@s" data-uk-grid>
                            <div class="uk-flex uk-flex-middle">
                                <div class="uk-margin-right">
                                    <i class="fas fa-history in-icon-wrap"></i>
                                </div>
                                <div>
                                    <h6 class="uk-margin-remove">25 years of Excellence</h6>
                                </div>
                            </div>
                            <div class="uk-flex uk-flex-middle uk-flex-center@m">
                                <div class="uk-margin-right">
                                    <i class="fas fa-trophy in-icon-wrap"></i>
                                </div>
                                <div>
                                    <h6 class="uk-margin-remove">15+ Global Awards</h6>
                                </div>
                            </div>
                            <div class="uk-flex uk-flex-middle uk-flex-right@m">
                                <div class="uk-margin-right">
                                    <i class="fas fa-phone-alt in-icon-wrap"></i>
                                </div>
                                <div>
                                    <h6 class="uk-margin-remove">24/7 Customer Support</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-section uk-background-secondary uk-light">
            <div class="uk-container uk-text-small">
                <div class="uk-child-width-1-2@m" data-uk-grid>
                    <div class="in-footer-logo">
                        <!-- <svg width="160" height="50" viewBox="0 0 356 110" class="css-1j8o68f">
                                    <defs id="SvgjsDefs4290">
                                        <linearGradient id="SvgjsLinearGradient4299">
                                            <stop id="SvgjsStop4300" stop-color="#8f5e25" offset="0"></stop>
                                            <stop id="SvgjsStop4301" stop-color="#fbf4a1" offset="0.5"></stop>
                                            <stop id="SvgjsStop4302" stop-color="#8f5e25" offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient4303">
                                            <stop id="SvgjsStop4304" stop-color="#8f5e25" offset="0"></stop>
                                            <stop id="SvgjsStop4305" stop-color="#fbf4a1" offset="0.5"></stop>
                                            <stop id="SvgjsStop4306" stop-color="#8f5e25" offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient4307">
                                            <stop id="SvgjsStop4308" stop-color="#8f5e25" offset="0"></stop>
                                            <stop id="SvgjsStop4309" stop-color="#fbf4a1" offset="0.5"></stop>
                                            <stop id="SvgjsStop4310" stop-color="#8f5e25" offset="1"></stop>
                                        </linearGradient>
                                        <linearGradient id="SvgjsLinearGradient4311">
                                            <stop id="SvgjsStop4312" stop-color="#8f5e25" offset="0"></stop>
                                            <stop id="SvgjsStop4313" stop-color="#fbf4a1" offset="0.5"></stop>
                                            <stop id="SvgjsStop4314" stop-color="#8f5e25" offset="1"></stop>
                                        </linearGradient>
                                    </defs>
                                    <g id="SvgjsG4291" featurekey="symbolFeature-0"
                                        transform="matrix(0.32353908792151015,0,0,0.32353908792151015,-3.882469055058122,1.08749023004372)"
                                        fill="url(#SvgjsLinearGradient4299)">
                                        <defs xmlns="http://www.w3.org/2000/svg"></defs>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                            <path class="fil0"
                                                d="M256 177c-4,-2 -7,-4 -11,-4 -9,-1 -39,11 -39,11 1,0 18,2 21,3 2,1 4,2 6,2 2,0 12,-6 23,-12zm-208 -16l-36 9 20 75 36 -9 -20 -75zm235 -83c19,0 35,16 35,35 0,19 -16,35 -35,35 -20,0 -35,-16 -35,-35 0,-19 15,-35 35,-35zm-12 40l6 -1c0,4 2,6 6,6 2,0 5,-1 5,-4 0,-3 -4,-4 -7,-4 -4,-1 -9,-3 -9,-9 0,-5 4,-7 8,-8l0 -3 5 0 0 3c5,1 8,4 8,9l-5 0c-1,-3 -3,-4 -6,-4 -1,0 -4,1 -4,3 0,2 4,3 6,4 5,1 10,2 10,9 0,6 -4,8 -9,9l0 3 -5 0 0 -3c-5,-1 -8,-4 -9,-10zm12 -35c16,0 29,14 29,30 0,16 -13,30 -29,30 -17,0 -30,-14 -30,-30 0,-16 13,-30 30,-30zm0 6c-14,0 -24,11 -24,24 0,13 10,24 24,24 13,0 23,-11 23,-24 0,-13 -10,-24 -23,-24zm-82 -12c25,0 45,20 45,45 0,25 -20,45 -45,45 -25,0 -46,-20 -46,-45 0,-25 21,-45 46,-45zm-15 52l7 -1c1,4 3,7 8,7 3,0 7,-1 7,-5 0,-4 -6,-5 -9,-6 -6,-1 -12,-4 -12,-11 0,-6 5,-9 10,-10l0 -4 7 0 0 4c6,1 10,4 10,11l-7 1c-1,-4 -3,-6 -7,-6 -2,0 -6,1 -6,4 0,3 6,4 8,5 7,1 13,3 13,12 0,7 -5,10 -11,11l0 4 -7 0 0 -4c-6,-1 -10,-5 -11,-12zm15 -45c21,0 38,17 38,38 0,21 -17,38 -38,38 -21,0 -39,-17 -39,-38 0,-21 18,-38 39,-38zm0 7c-17,0 -31,14 -31,31 0,17 14,31 31,31 17,0 30,-14 30,-31 0,-17 -13,-31 -30,-31zm-118 134c3,-2 9,-5 15,-7 5,-2 9,-3 22,4 14,7 36,21 50,28 14,6 22,9 37,5 40,-11 72,-32 101,-49 31,-18 -1,-28 -15,-19 -7,5 -45,26 -46,26 -5,3 -11,7 -16,8 -24,6 -71,-1 -84,-23 -2,-2 -1,-2 2,-1 13,5 22,11 36,14 9,1 25,7 41,4 13,-2 18,-17 1,-22 -13,-3 -23,-2 -37,-8 -18,-6 -23,-12 -36,-23 -6,-5 -11,-9 -20,-9 -9,-1 -22,1 -34,4 -12,2 -24,6 -30,7 -6,2 -6,2 -4,12 2,10 8,29 10,39 3,10 3,11 7,10zm205 -45c-3,-11 -15,-4 -23,-1 -10,5 -21,11 -26,14 5,4 7,9 7,13 6,-3 44,-21 42,-26z"
                                                style="fill: url(#SvgjsLinearGradient4299);"></path>
                                        </g>
                                    </g>
                                    <g id="SvgjsG4292" featurekey="textGroupContainer" transform="matrix(1,0,0,1,355,0)"
                                        fill="url(#SvgjsLinearGradient4303)">
                                        <rect xmlns="http://www.w3.org/2000/svg" y="0" height="1" width="1" opacity="0">
                                        </rect>
                                        <rect xmlns="http://www.w3.org/2000/svg" y="0" x="-235" width="5" height="110">
                                        </rect>
                                    </g>
                                    <g id="SvgjsG4293" featurekey="nameFeature-0"
                                        transform="matrix(1.8702075503465831,0,0,1.8702075503465831,135.7557512962979,17.152794067707127)"
                                        fill="url(#SvgjsLinearGradient4307)">
                                        <path
                                            d="M4.12 17.32 l5.92 0 l0 2.68 l-6.32 0 l-2.52 0 l0 -14 l2.92 0 l5.74 0 l0 2.68 l-5.74 0 l0 2.96 l4.34 0 l0 2.64 l-4.34 0 l0 3.04 z M24.14 20 l-3.44 0 l-3.02 -4.5 l-3 4.5 l-3.44 0 l4.7 -7.08 l-4.64 -6.92 l3.44 0 l2.92 4.34 l2.88 -4.34 l3.44 0 l-4.6 6.92 z M37.8 18.5 c-1.24 1.12 -2.9 1.7 -4.76 1.7 c-3.92 0 -7.3 -2.94 -7.3 -7.2 s3.38 -7.2 7.3 -7.2 c1.84 0 3.48 0.6 4.68 1.66 l-1.76 1.98 c-0.74 -0.52 -1.74 -0.9 -2.76 -0.9 c-2.52 0 -4.42 1.86 -4.42 4.46 s1.9 4.46 4.42 4.46 c1.06 0 2.1 -0.4 2.86 -1 z M48.26 6 l2.92 0 l0 14 l-2.92 0 l0 -5.66 l-5.64 0 l0 5.66 l-2.92 0 l0 -14 l2.92 0 l0 5.66 l5.64 0 l0 -5.66 z M64.76 20 l-1.06 -2.5 l-6.76 0 l-1.06 2.5 l-3.1 0 l6.22 -14 l2.64 0 l6.24 14 l-3.12 0 z M57.96 15.120000000000001 l4.72 0 l-2.36 -5.54 z M78.64 6 l2.92 0 l0 14 l-2.22 0 l-6.94 -8.68 l0 8.68 l-2.92 0 l0 -14 l2.26 0 l6.9 8.7 l0 -8.7 z M97.14 12.559999999999999 c0.62 4.7 -2.44 7.64 -6.22 7.64 c-3.98 0 -7.26 -2.94 -7.26 -7.2 s3.36 -7.2 7.26 -7.2 c1.86 0 3.5 0.6 4.7 1.66 l-1.76 1.98 c-0.74 -0.52 -1.74 -0.9 -2.76 -0.9 c-2.54 0 -4.4 1.86 -4.4 4.46 s1.8 4.46 4.22 4.46 c1.84 0 3.12 -0.66 3.52 -2.42 l-3.3 0 l0 -2.48 l6 0 z M102.22000000000001 17.32 l5.92 0 l0 2.68 l-6.32 0 l-2.52 0 l0 -14 l2.92 0 l5.74 0 l0 2.68 l-5.74 0 l0 2.96 l4.34 0 l0 2.64 l-4.34 0 l0 3.04 z">
                                        </path>
                                    </g>
                                    <g id="SvgjsG4294" featurekey="sloganFeature-0"
                                        transform="matrix(1.1244799241744738,0,0,1.1244799241744738,136.98796809505268,59.78241383815852)"
                                        fill="url(#SvgjsLinearGradient4311)">
                                        <path
                                            d="M5.18 7.279999999999999 l0 10.54 l3.38 0 q1.4 0 2.52 -0.72 q1.06 -0.7 1.66 -1.88 t0.6 -2.58 q0 -1.46 -0.57 -2.68 t-1.63 -1.94 q-1.14 -0.74 -2.62 -0.74 l-3.34 0 z M1.86 7.279999999999999 l-0.96 -2.2 l7.6 0 q1.98 0 3.62 1.02 q1.58 0.98 2.5 2.68 t0.92 3.7 q0 1.5 -0.59 2.97 t-1.63 2.57 q-1 1.08 -2.14 1.54 q-1.1 0.44 -2.62 0.44 l-5.52 0 l0 -12.72 l-1.18 0 z M21.080000000000002 20 l-2.14 0 l0 -14.92 l2.14 0 l0 14.92 z M38.260000000000005 7 l-1.4 1.64 q-0.82 -0.84 -1.96 -1.32 t-2.4 -0.48 q-1.64 0 -2.99 0.74 t-2.11 2.02 q-0.78 1.34 -0.78 2.98 q0 1.56 0.84 2.88 q0.8 1.24 2.15 1.97 t2.91 0.73 q1.1 0 2.11 -0.38 t1.81 -1.06 l0 -2.72 l-1.92 0 l-0.94 -2.16 l5.02 0 l0 5.8 q-1.14 1.28 -2.73 1.99 t-3.37 0.71 q-2.22 0 -4.08 -1.08 q-1.82 -1.04 -2.86 -2.86 q-1.08 -1.86 -1.08 -4.08 q0 -2.14 1.14 -3.94 q1.08 -1.72 2.93 -2.73 t3.97 -1.01 q1.66 0 3.16 0.64 q1.46 0.6 2.58 1.72 z M44.44 20 l-2.14 0 l0 -14.92 l2.14 0 l0 14.92 z M59.94 7.279999999999999 l-5.26 0 l0 12.72 l-2.12 0 l0 -12.72 l-5.32 0 l0 -2.2 l12.7 0 l0 2.2 z M67.4 6.66 l-0.82 -1.84 l2.4 0 l7.18 15.18 l-2.44 0 l-0.98 -2.18 l-4.54 0 q-1.28 0 -2.3 0.24 q-0.9 0.22 -1.5 0.58 q-0.54 0.32 -0.72 0.66 l-0.38 0.7 l-2.36 0 z M69 15.620000000000001 l2.76 0 l-3.26 -6.3 l-3.3 7.14 q0.44 -0.38 1.34 -0.6 q1.02 -0.24 2.46 -0.24 z M89.41999999999999 20 l-10.46 0 l0 -14.92 l2.18 0 l0 12.74 l8.28 0 l0 2.18 z M110.17999999999999 9.74 l-5.1 6.1 l-5.06 -6.1 l0 10.26 l-2.14 0 l0 -12.82 l-1.74 -2.1 l2.82 0 l6.1 7.32 l6.18 -7.32 l2.82 0 l-1.74 2.1 l0 12.82 l-2.14 0 l0 -10.26 z M119.3 20 l-2.14 0 l0 -14.92 l2.14 0 l0 14.92 z M124.14 7.18 l-1.74 -2.1 l2.82 0 l9.58 11.4 l0 -11.4 l2.2 0 l0 14.92 l-2.16 0 l-8.56 -10.26 l0 10.26 l-2.14 0 l0 -12.82 z M143.54 20 l-2.14 0 l0 -14.92 l2.14 0 l0 14.92 z M148.37999999999997 7.18 l-1.74 -2.1 l2.82 0 l9.58 11.4 l0 -11.4 l2.2 0 l0 14.92 l-2.16 0 l-8.56 -10.26 l0 10.26 l-2.14 0 l0 -12.82 z M178.41999999999996 7 l-1.4 1.64 q-0.82 -0.84 -1.96 -1.32 t-2.4 -0.48 q-1.64 0 -2.99 0.74 t-2.11 2.02 q-0.78 1.34 -0.78 2.98 q0 1.56 0.84 2.88 q0.8 1.24 2.15 1.97 t2.91 0.73 q1.1 0 2.11 -0.38 t1.81 -1.06 l0 -2.72 l-1.92 0 l-0.94 -2.16 l5.02 0 l0 5.8 q-1.14 1.28 -2.73 1.99 t-3.37 0.71 q-2.22 0 -4.08 -1.08 q-1.82 -1.04 -2.86 -2.86 q-1.08 -1.86 -1.08 -4.08 q0 -2.14 1.14 -3.94 q1.08 -1.72 2.93 -2.73 t3.97 -1.01 q1.66 0 3.16 0.64 q1.46 0.6 2.58 1.72 z">
                                        </path>
                                    </g>
                        </svg> -->
                        <a class="uk-logo" href="/">
                            <img width="200" class="in-slide-img uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-right" src="landing/img/web.jpg" data-src="landing/img/web.jpg" alt="image-slide" width="500" height="400" data-uk-img="">
                        </a>

                    </div>
                    <div class="uk-flex uk-flex-right@m">
                        <div class="in-footer-socials">
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-telegram-plane"></i></a>
                        </div>
                    </div>
                </div>
                <div class="uk-grid uk-margin-large-top">
                    <div class="uk-width-1-1">
                        <p class="uk-heading-line uk-margin-large-bottom"><span>Copyright &copy;{{ date('Y') }}
                                {{ ucwords($company->name) }}. All Rights Reserved.</span></p>
                        <p class="in-trading-risk">Trading derivatives and leveraged products carries a high level of
                            risk, including the risk of losing substantially more than your initial investment. It is
                            not suitable for everyone. Before you make any decision in relation to a financial product
                            you should obtain and consider our Product Disclosure Statement (PDS) and Financial Services
                            Guide (FSG) available on our website and seek independent advice if necessary</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer content end -->
        <!-- totop begin -->
        <div class="uk-visible@m">
            <a href="#" class="in-totop fas fa-chevron-up" data-uk-scroll></a>
        </div>
        <!-- totop end -->
    </footer>
    <!-- Javascript -->
    <script src="landing/js/vendors/uikit.min.js"></script>
    <script src="landing/js/vendors/blockit.min.js"></script>
    <script src="landing/js/config-theme.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = '23f5c67e072b5256469481cb7452e3f57e28ffcb';
    window.smartsupp || (function(d) {
        var s, c, o = smartsupp = function() {
            o._.push(arguments)
        };
        o._ = [];
        s = d.getElementsByTagName('script')[0];
        c = d.createElement('script');
        c.type = 'text/javascript';
        c.charset = 'utf-8';
        c.async = true;
        c.src = 'https://www.smartsuppchat.com/loader.js?';
        s.parentNode.insertBefore(c, s);
    })(document);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,es,zh,de,pt,ko,sw,ru,ar,ja',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            },
            'google_translate_element'
        );
    }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <script>
    @if(session()->has('error'))
    toastr.options = {};

    toastr.error("{{ session('error') }}");
    @endif

    @if(session()->has('success'))
    toastr.options = {};

    toastr.success("{{ session('success') }}");
    @endif

    @if($errors->any())
    toastr.options = {};
    @foreach($errors->all() as $error)
    toastr.error("{{ $error }}");
    @endforeach

    @endif
    </script>
</body>

</html>