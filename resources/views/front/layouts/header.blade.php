<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title> @yield('title') </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ $setting['website_logo'] }}">

    <!-- Bootstrap -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/front/') }}/css/bootstrap.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/front/') }}/css/fontawesome-all.min.css">
    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('assets/front/') }}/css/slick.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('assets/front/') }}/css/magnific-popup.css">
    <!-- line awesome -->
    <link rel="stylesheet" href="{{ asset('assets/front/') }}/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/front/') }}/css/main.css">
    <link rel="stylesheet" href="{{ asset('assets/front/') }}/css/new-custome.css">
    @yield('css')
    @toastifyCss
</head>

<body>

    <!--==================== Preloader Start ====================-->
    <div class="loader-mask">
        <div class="loader">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--==================== Preloader End ====================-->

    <!--==================== Overlay Start ====================-->
    <div class="overlay"></div>
    <!--==================== Overlay End ====================-->

    <!--==================== Sidebar Overlay End ====================-->
    <div class="side-overlay"></div>
    <!--==================== Sidebar Overlay End ====================-->

    <!-- ==================== Scroll to Top End Here ==================== -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- ==================== Scroll to Top End Here ==================== -->
