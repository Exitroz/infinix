<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="investing, cryptocurrency, real estate, forex, finance">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/auth/images/logo/favicon.png') }}" />

    <!-- TITLE -->
    <title>{{ $company->name }} - Admin Portal | @yield('title')</title>

    <!-- BOOTSTRAP CSS -->
    <link href="{{ asset('assets/auth/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/auth/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/auth/css/skin-modes.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/auth/css/dark-style.css') }}" rel="stylesheet" />


    <!-- SIDE-MENU CSS -->
    <link href="{{ asset('assets/auth/css/sidemenu.css') }}" rel="stylesheet" id="sidemenu">

    <!-- P-scroll bar css-->
    <link href="{{ asset('assets/auth/plugins/p-scroll/perfect-scrollbar.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/auth/css/icons.css') }}" rel="stylesheet" />

    <!-- SIDEBAR CSS -->
    <link href="{{ asset('assets/auth/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/auth/colors/color1.css') }}" />

    <!-- SWITCHER SKIN CSS -->
    <link href="{{ asset('assets/auth/switcher/css/switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/auth/switcher/demo.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body class="app sidebar-mini">
    <div id="app">
        <!-- GLOBAL-LOADER -->
        <!--div id="global-loader">
         <img src="{{ asset('assets/auth/images/loader.svg') }}" class="loader-img" alt="Loader">
      </div-->
        <!-- /GLOBAL-LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">
                <!--APP-SIDEBAR-->
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <aside class="app-sidebar shadow-none">
                    <div class="app-sidebar__user">
                        <div class="dropdown user-pro-body text-center">
                            <div class="user-pic">
                                <img src="{{ asset('assets/auth/images/users/user.png') }}" alt="user-img"
                                    class="avatar-xl rounded-circle">
                            </div>
                            <div class="user-info">
                                <h6 class=" mb-0 text-light">
                                    {{ ucwords(Auth::user()->account->first_name . " " . Auth::user()->account->middle_name . " " . Auth::user()->account->last_name) }}
                                </h6>
                                <span class="text-muted app-sidebar__user-name text-sm">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="post">
                        @csrf
                    </form>
                    <ul class="side-menu">
                        <li>
                            <h3>Main</h3>
                        </li>
                        <li>
                            <a class="side-menu__item" href="/admin/dashboard"><i
                                    class="side-menu__icon ti-home"></i><span
                                    class="side-menu__label">Dashboard</span></a>
                        </li>
                        <li>
                            <a class="side-menu__item" href="/admin/portfolios"><i
                                    class="side-menu__icon ti-briefcase"></i><span
                                    class="side-menu__label">Portfolios</span></a>
                        </li>
                        <li>
                            <a class="side-menu__item" href="/admin/transactions/deposit"><i
                                    class="side-menu__icon ti-wallet"></i><span
                                    class="side-menu__label">Deposits</span></a>
                        </li>
                        <li>
                            <a class="side-menu__item" href="/admin/transactions/withdrawal"><i
                                    class="side-menu__icon ti-package"></i><span
                                    class="side-menu__label">Withdrawals</span></a>
                        </li>
                        <li>
                            <a class="side-menu__item" href="/admin/users"><i class="side-menu__icon ti-user"></i><span
                                    class="side-menu__label">All Users</span></a>
                        </li>
                        <li>
                            <h3>Account</h3>
                        </li>
                        <li>
                            <a class="side-menu__item" href="/admin/comapany-info"><i
                                    class="side-menu__icon ti-home"></i><span class="side-menu__label">Company
                                    Profile</span></a>
                        </li>
                        <li>
                            <a class="side-menu__item" href="/admin/company/plans"><i
                                    class="side-menu__icon ti-briefcase"></i><span
                                    class="side-menu__label">Plans</span></a>
                        </li>
                        <li>
                            <a class="side-menu__item" href="/account/dashboard"><i
                                    class="side-menu__icon ti-user"></i><span class="side-menu__label">Switch to user
                                    account</span></a>
                        </li>
                        <li>
                            <a class="side-menu__item" href="javascript:void(0)"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i
                                    class="side-menu__icon fe fe-power"></i><span
                                    class="side-menu__label">Logout</span></a>
                        </li>
                    </ul>
                </aside>
                <!--/APP-SIDEBAR-->
                <!-- Mobile Header -->
                <div class="mobile-header">
                    <div class="container-fluid">
                        <div class="d-flex">
                            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                                href="#"></a>
                            <!-- sidebar-toggle-->
                            <a class="header-brand" href="/">
                                <img src="{{ asset('assets/auth/images/logo/ts.png') }}"
                                    class="header-brand-img desktop-logo" alt="logo">
                                <img src="{{ asset('assets/auth/images/logo/ts.png') }}"
                                    class="header-brand-img desktop-logo mobile-light" alt="logo">
                            </a>
                            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                                <button class="navbar-toggler navresponsive-toggler d-md-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                    aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon fe fe-more-vertical text-white"></span>
                                </button>
                                <div class="dropdown profile-1">
                                    <a href="#" data-bs-toggle="dropdown" class="nav-link pe-2 leading-none d-flex">
                                        <span>
                                            <img src="{{ asset('assets/auth/images/users/user.png') }}"
                                                alt="profile-user" class="avatar  profile-user brround cover-image">
                                        </span>
                                    </a>
                                </div>
                                <div class="dropdown d-md-flex header-settings">
                                    <a href="#" class="nav-link icon " data-bs-toggle="sidebar-right"
                                        data-bs-target=".sidebar-right">
                                        <i class="fe fe-bell"></i>
                                    </a>
                                </div><!-- SIDE-MENU -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-1 navbar navbar-expand-lg  responsive-navbar navbar-dark d-md-none bg-white">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2 ms-auto">
                            <div class="dropdown d-sm-flex">
                                <a href="#" class="nav-link icon" data-bs-toggle="dropdown">
                                    <i class="fe fe-search"></i>
                                </a>
                                <div class="dropdown-menu header-search dropdown-menu-start">
                                    <div class="input-group w-100 p-2">
                                        <input type="text" class="form-control " placeholder="Search....">
                                        <div class=" ">
                                            <button type="button" class="btn btn-primary ">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- SEARCH -->
                            <div class="dropdown d-md-flex">
                                <a class="nav-link icon full-screen-link nav-link-bg">
                                    <i class="fe fe-maximize fullscreen-button"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Mobile Header -->
                <!--app-content open-->
                <div class="app-content">
                    <div class="side-app">
                        <div class="page-header bg-transparent shadow-none border-bottom">
                            <div>
                                <h1 class="page-title">@yield('title')</h1>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                                </ol>
                            </div>

                            <div class="d-flex  ms-auto header-right-icons header-search-icon">
                                <div class="dropdown profile-1">
                                    <a href="#" data-bs-toggle="dropdown" class="nav-link pe-2 leading-none d-flex">
                                        <span>
                                            <img src="{{ asset('assets/auth/images/users/user.png') }}"
                                                alt="profile-user" class="avatar  profile-user brround cover-image">
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 text-center">
                            Copyright &copy; 2015 - {{ date('Y') }} <a href="/">{{ $company->name }}</a> | All rights
                            reserved.
                        </div>
                    </div>
                </div>
            </footer>
            <!-- FOOTER CLOSED -->
        </div>
    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/auth/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/auth/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/auth/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- RATING STAR JS-->
    <script src="{{ asset('assets/auth/plugins/rating/jquery.rating-stars.js') }}"></script>

    <!-- INPUT MASK JS-->
    <script src="{{ asset('assets/auth/plugins/input-mask/jquery.mask.min.js') }}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{ asset('assets/auth/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('assets/auth/plugins/sidebar/sidebar.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/auth/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/auth/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('assets/auth/plugins/p-scroll/pscroll-1.js') }}"></script>


    <!-- SPARKLINE JS-->
    <script src="{{ asset('assets/auth/js/jquery.sparkline.min.js') }}"></script>

    <!-- CHARTJS CHART JS-->
    <script src="{{ asset('assets/auth/plugins/chart/Chart.bundle.js') }}"></script>
    <script src="{{ asset('assets/auth/plugins/chart/utils.js') }}"></script>

    <!-- ECHART JS-->
    <script src="{{ asset('assets/auth/plugins/echarts/echarts.js') }}"></script>

    <!-- APEXCHART JS -->
    <script src="{{ asset('assets/auth/js/apexcharts.js') }}"></script>

    <!-- INDEX JS -->
    <script src="{{ asset('assets/auth/js/index1.js') }}"></script>


    <!-- CUSTOM JS-->
    <script src="{{ asset('assets/auth/js/custom.js') }}"></script>

    <!-- Color Change JS -->
    <script src="{{ asset('assets/auth/js/color-change.js') }}"></script>
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

    $('#refBtn').on('click', function() {
        const value = document.getElementById('refText');
        value.select();
        document.execCommand('copy');
        toastr.success("Referral link copied to clipboard");
    });
    </script>
</body>

</html>