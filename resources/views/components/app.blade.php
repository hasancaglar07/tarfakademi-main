<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    {!! seo() !!}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />


    <!-- Favicon for older browsers -->
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Favicon for modern browsers -->
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    <!-- Meta Theme Color (TARF Orange) -->
    <meta name="theme-color" content="#FF8C00">


    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- style sheets and font icons  -->
    <link rel="stylesheet" href="/assets/css/vendors.min.css?v={{ config('app.asset_version') }}" />
    <link rel="stylesheet" href="/assets/css/icon.min.css?v={{ config('app.asset_version') }}" />
    <link rel="stylesheet" href="/assets/css/style.css?v={{ config('app.asset_version') }}" />
    <link rel="stylesheet" href="/assets/css/responsive.css?v={{ config('app.asset_version') }}" />
    <link rel="stylesheet" href="/assets/css/accounting/accounting.css?v={{ config('app.asset_version') }}" />


    @stack('css')
</head>

<body data-mobile-nav-style="classic" class="custom-cursor">
    <!-- start cursor -->
    <div class="cursor-page-inner">
        <div class="circle-cursor circle-cursor-inner"></div>
        <div class="circle-cursor circle-cursor-outer"></div>
    </div>
    <!-- end cursor -->
    <!-- start header -->
    @include('layouts.navigation')
    <!-- end header -->

    {{ $slot }}


    @include('layouts.footer')

    <!-- start sticky -->
    <div class="sticky-wrap d-none d-lg-inline-block" data-animation-delay="100" data-shadow-animation="true">
        <span class="fs-16"><i class="bi bi-envelope icon-small me-10px"></i>{{ __('messages.common.get_service') }}
            <a href="{{ localized_route('contact.index') }}" class="text-decoration-line-bottom fw-500"
                style="color:#ed6c1cd2 !important">{{ __('messages.common.send_message') }}</a></span>
    </div>
    <!-- end sticky -->
    <!-- start scroll progress -->
    <div class="scroll-progress d-none d-xxl-block">
        <a href="#" class="scroll-top" aria-label="scroll">
            <span class="scroll-text">{{ __('messages.common.scroll') }}</span><span class="scroll-line"><span
                    class="scroll-point"></span></span>
        </a>
    </div>
    <!-- end scroll progress -->
    <!-- javascript libraries -->
    <script type="text/javascript" src="/assets/js/jquery.js"></script>
    <script type="text/javascript" src="/assets/js/vendors.min.js"></script>
    <script type="text/javascript" src="/assets/js/main.js"></script>
    @stack('js')
</body>

</html>
