<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="manifest.json">
    <link rel="apple-touch-icon" href="{{ asset('clients_assets/images/favicon.ico') }}">
    <link rel="icon" href="{{ asset('clients_assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('clients_assets/images/favicon.ico') }}" type="image/x-icon">
    <meta name="theme-color" content="#e87316">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="MK Computer">
    <meta name="msapplication-TileImage" content="assets/images/favicon.ico">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shion House</title>

    {{-- Boostrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,700;1,700&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('clients_assets/css/vendors/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('clients_assets/css/vendors/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('clients_assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('clients_assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('clients_assets/css/vendors/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('clients_assets/css/vendors/slick/slick-theme.css') }}">
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('clients_assets/css/demo4.css') }}">
	<link rel="stylesheet" href="{{ asset('clients_assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('clients_assets/css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('clients_assets/css/jquery.fancybox.min.css') }}">
	<link rel="stylesheet" href="{{ asset('clients_assets/fonts/icomoon/style.css') }}">
	<link rel="stylesheet" href="{{ asset('clients_assets/fonts/flaticon/font/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('clients_assets/css/aos.css') }}">
	<link rel="stylesheet" href="{{ asset('clients_assets/css/style.css') }}">
</head>

<body class="theme-color4 light ltr">
    @include('clients.layouts.header')
    @yield('contents')
    @include('clients.layouts.footer')
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <div class="bg-overlay"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('clients_assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('clients_assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('clients_assets/js/feather/feather.min.js') }}"></script>
    <script src="{{ asset('clients_assets/js/lazysizes.min.js') }}"></script>
    <script src="{{ asset('clients_assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('clients_assets/js/slick/slick-animation.min.js') }}"></script>
    <script src="{{ asset('clients_assets/js/slick/custom_slick.js') }}"></script>
    <script src="{{ asset('clients_assets/js/price-filter.js') }}"></script>
    <script src="{{ asset('clients_assets/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('clients_assets/js/filter.js') }}"></script>
    <script src="{{ asset('clients_assets/js/newsletter.js') }}"></script>
    <script src="{{ asset('clients_assets/js/cart_modal_resize.js') }}"></script>
    <script src="{{ asset('clients_assets/js/bootstrap/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('clients_assets/js/theme-setting.js') }}"></script>
    <script src="{{ asset('clients_assets/js/script.js') }}"></script>
	<script src="{{ asset('clients_assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('clients_assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('clients_assets/js/jquery.animateNumber.min.js') }}"></script>
	<script src="{{ asset('clients_assets/js/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('clients_assets/js/jquery.fancybox.min.js') }}"></script>
	<script src="{{ asset('clients_assets/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('clients_assets/js/aos.js') }}"></script>
	<script src="{{ asset('clients_assets/js/custom.js') }}"></script>
    <script>
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
    </script>
    @stack('scripts')
</body>

</html>
