<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>SMM PANEL | Cheapest provider from Russia</title>
    <meta name="description"
        content="SMM Reseller Panel Best and Cheapest. WIQ - Main provider Instagram followers, Instagram likes, Tiktok, Telegram." />
    <meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=0.9" />
    <link rel="icon" type="image/png" href="https://wiq.ru/favicon.png" />
    <meta property="og:image" content="https://wiq.ru/img/other/wiq.jpg" />
    <link rel="stylesheet" href="https://wiq.ru/theme/css/bootstrap.min.css?v=1">
    <link rel="stylesheet" href="https://wiq.ru/theme/css/style.css?v=2261">
    <link rel="stylesheet" href="https://wiq.ru/theme/css/style-responsive.css">
    <link rel="stylesheet" href="https://wiq.ru/theme/css/animate.min.css">
    <link rel="stylesheet" href="https://wiq.ru/theme/css/vertical-rhythm.min.css">
    <link rel="stylesheet" href="https://wiq.ru/theme/css/owl.carousel.css">
    <script>
        window.base_url = 'https://wiq.ru/';
        window.user_id = null;
        window.user_email = '';
        window.myModalActive = false;
        window.usd = 86.21;
        window.lang = 'en';
    </script>
    <style>
        .main-nav .inner-nav .mn-sub-multi li a i {
            width: 19px;
        }
    </style>

    @stack('css')
</head>

<body class="appear-animate">
    <div class="page" id="top">

        @section('nav')
            @include('client.nav')
        @show

        @yield('content')

        @section('footer')
            @include('client.footer')
        @show
    </div>
    <script type="text/javascript" src="https://wiq.ru/theme/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/jquery.localScroll.min.js"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/jquery.viewport.mini.js"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/jquery.appear.js"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/jquery.sticky.js"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/jquery.fitvids.js"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/wow.min.js"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/all.js?v=161"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/contact-form.js"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/main.js?1361"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/clipboard.min.js?2"></script>
    <script type="text/javascript" src="https://wiq.ru/theme/js/main_functions.js?v=10961"></script>
    @stack('js')

</body>

</html>
