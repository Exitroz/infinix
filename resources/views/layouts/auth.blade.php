<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>

   <!-- META DATA -->
   <meta charset="UTF-8">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="Volgh - Codeigniter Bootstrap 5 Admin Template">
   <meta name="author" content="PrimeVest">
   <meta name="keywords" content="investing, NFT, cryptocurrency, real estate, forex, finance, DeFi">

   <!-- FAVICON -->
   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/auth/images/logo/favicon.png') }}" />

   <!-- TITLE -->
   <title>{{ $company->name }} - @yield('title')</title>

   <!-- BOOTSTRAP CSS -->
   <link href="{{ asset('assets/auth/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

   <!-- STYLE CSS -->
   <link href="{{ asset('assets/auth/css/style.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/auth/css/skin-modes.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/auth/css/dark-style.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/auth/plugins/single-page/css/main.css') }}" rel="stylesheet" />


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
   <style>
        .goog-te-banner-frame.skiptranslate {
                display: none!important;
            }

            body {
                top: 0px!important;
            }

            .goog-te-gadget-icon {
                background-image: none;
                background-position: 0px 0px;
                height: 32px!important;
                width: 32px!important;
                margin-right: 8px!important;
                display: none;
            }
            .goog-te-gadget-simple  {
                background-color: transparent !important;
                border: 1px solid #ffa800 !important;
                padding: 5px !important;
                border-radius: 5px;
                font-size: 1rem !important;
                line-height:2rem !important;
                display: inline-block;
                cursor: pointer;
                zoom: 1;
            }
            .goog-te-menu2 {
                max-width: 100%;
            }
            .goog-te-menu-value {
                color: #fff !important;
            }
            .goog-te-menu-value:before {
                margin-right: 16px;
                font-size: 2rem;
                vertical-align: -10px;
            }
            .goog-te-menu-value span:nth-child(5) {
                display:none;
            }
            .goog-te-menu-value span:nth-child(3) {
                border:none!important;
                font-family: 'Material Icons';  
            }
    </style>
    <!-- Smartsupp Live Chat script -->
   <script type="text/javascript">
      var _smartsupp = _smartsupp || {};
      _smartsupp.key = '23f5c67e072b5256469481cb7452e3f57e28ffcb';
      window.smartsupp||(function(d) {
      var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
      s=d.getElementsByTagName('script')[0];c=d.createElement('script');
      c.type='text/javascript';c.charset='utf-8';c.async=true;
      c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
      })(document);
   </script>
</head>

<body class="login-img">
<div id="app">
   <!-- PAGE -->
   <div class="page">
      @yield('content')
   </div>
</div>

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

<!-- Perfect SCROLLBAR JS-->
<script src="{{ asset('assets/auth/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

<!-- CUSTOM JS-->
<script src="{{ asset('assets/auth/js/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
<script>
   function googleTranslateElementInit() {
         new google.translate.TranslateElement(
            {pageLanguage: 'en',
               includedLanguages:'en,es,zh,de,pt,ko,sw,ru,ar,ja', 
               layout: google.translate.TranslateElement.InlineLayout.SIMPLE},
            'google_translate_element'
         );
   }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
   @if(session()-> has('error'))
      toastr.options = {
      };
      
      toastr.error("{{ session('error') }}");
   @endif

   @if(session()-> has('success'))
      toastr.options = {
      };
   
      toastr.success("{{ session('success') }}");
   @endif

   @if($errors->any())
      toastr.options = {
      };
      @foreach ($errors->all() as $error)
         toastr.error("{{ $error }}");
      @endforeach
      
   @endif

   $('#refBtn').on('click', function () {
         const value = document.getElementById('refText');
         value.select();
         document.execCommand('copy');
         toastr.success("Referral link copied to clipboard");
     });
</script>
</body>

</html>