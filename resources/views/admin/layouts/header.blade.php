<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <!-- Title Meta -->
    <meta charset="utf-8" />
    <title> @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully responsive premium admin dashboard template" />
    <meta name="author" content="Techzaa" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    @php

        $publicsetting = \App\Models\admin\PublicSetting::select('website_logo')->first();

    @endphp
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/uploads/PublicSetting/' . $publicsetting['website_logo']) }}">

    <!-- Vendor css (Require in all Page) -->
    <link href="{{ asset('assets/admin/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons css (Require in all Page) -->
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css (Require in all Page) -->
    <link href="{{ asset('assets/admin/css/app-rtl.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Theme Config js (Require in all Page) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="{{ asset('assets/admin/js/config.js') }}"></script>
    <!-------- File Input --------->
    <link rel="stylesheet" href="{{ asset('vendor/fileinput/css/fileinput.css') }}">
    @yield('css')
    @toastifyCss
</head>

<body>
    <!-- START Wrapper -->
    <div class="wrapper">

        <!-- ========== Topbar Start ========== -->
        <header class="topbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <div class="d-flex align-items-center">
                        <!-- Menu Toggle Button -->
                        <div class="topbar-item">
                            <button type="button" class="button-toggle-menu me-2">
                                <iconify-icon icon="solar:hamburger-menu-broken"
                                    class="align-middle fs-24"></iconify-icon>
                            </button>
                        </div>

                        <!-- Menu Toggle Button -->
                        <div class="topbar-item">
                            <h4 class="mb-0 fw-bold topbar-button pe-none text-uppercase"> @yield('title') </h4>
                        </div>
                    </div>

                    <div class="gap-1 d-flex align-items-center">
                        <!-- Theme Color (Light/Dark) -->
                        {{-- <div class="topbar-item">
                            <button type="button" class="topbar-button" id="light-dark-mode">
                                <iconify-icon icon="solar:moon-bold-duotone" class="align-middle fs-24"></iconify-icon>
                            </button>
                        </div> --}}
                        <div class="topbar-item">
                            <button type="button" class="topbar-button" style="background-color: #dddbdb">
                               <img src="{{ asset('assets/admin/images/world.svg') }}" alt="">
                            </button>
                        </div>
                        <div class="topbar-item">
                            <button type="button" class="topbar-button" style="background-color: #dddbdb">
                               <img src="{{ asset('assets/admin/images/dollar.svg') }}" alt="">
                            </button>
                        </div>

                        @php

                            $unreadNotificationsUsers = \Illuminate\Support\Facades\Auth::guard('admin')->user()
                                ->unreadNotifications;
                        @endphp

                        <!-- Notification -->
                        <div class="dropdown topbar-item">
                            <button type="button" class="topbar-button position-relative" style="background-color: #dddbdb"
                                id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img src="{{ asset('assets/admin/images/bell.svg') }}" alt="">
                                <span
                                    class="position-absolute topbar-badge fs-10 translate-middle badge bg-danger rounded-pill">
                                    @if ($unreadNotificationsUsers->count() > 0)
                                        {{ $unreadNotificationsUsers->count() }}
                                    @else
                                        0
                                    @endif
                                </span>
                            </button>
                            <div class="py-0 dropdown-menu dropdown-lg dropdown-menu-end"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3 border border-dashed border-top-0 border-start-0 border-end-0">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 fs-16 fw-semibold"> الاشعارات </h6>
                                        </div>

                                    </div>
                                </div>
                                @if ($unreadNotificationsUsers->count() > 0)
                                    @foreach ($unreadNotificationsUsers as $notification)
                                        <div data-simplebar style="max-height: 280px;">
                                            <!-- Item -->
                                            <a href="{{ url('admin/order/update/' . $notification['data']['order_id']) }}"
                                                class="py-3 dropdown-item border-bottom">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="mb-0 fw-semibold"> رقم
                                                            الطلب {{ $notification['data']['order_id'] }} </p>
                                                        <p class="mb-0 text-wrap">
                                                            لديك طلب جديد علي الموقع
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                    <div data-simplebar style="max-height: 280px;">
                                        <a class="py-3 dropdown-item border-bottom">
                                            لا يوجد اشعاارات جديدة
                                        </a>
                                    </div>
                                @endif

                            </div>
                        </div>

                        @php

                            $publicsetting = \App\Models\admin\PublicSetting::first();

                        @endphp
                        <!-- User -->
                        <div class="dropdown topbar-item">
                            <a type="button" class="topbar-button" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle" width="32"
                                        src="{{ asset('assets/uploads/PublicSetting/' . $publicsetting['website_logo']) }}"
                                        alt="avatar-3">
                                {{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->name }} <i
                                    class="align-middle bx bx-chevron-down fs-18 ms-1"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">
                                    مرحبا {{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->name }} ! </h6>
                                <a class="dropdown-item" href="{{ url('admin/update_admin_details') }}">
                                    <i class="align-middle bx bx-user-circle text-muted fs-18 me-1"></i><span
                                        class="align-middle"> حسابي </span>
                                </a>
                                <a class="dropdown-item" href="{{ url('admin/update_admin_password') }}">
                                    <i class="align-middle bx bx-message-dots text-muted fs-18 me-1"></i><span
                                        class="align-middle"> تغير كلمة المرور </span>
                                </a>
                                <div class="my-1 dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                                    <i class="align-middle bx bx-log-out fs-18 me-1"></i><span class="align-middle">
                                        تسجيل خروج </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
