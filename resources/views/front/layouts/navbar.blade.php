@php
    $maincategories = \App\Models\admin\MainCategory::where('status', 1)->get();
@endphp

<!-- ==================== Mobile Menu Start Here ==================== -->
<div class="mobile-menu d-lg-none d-block">
    <button type="button" class="close-button"> <i class="las la-times"></i> </button>
    <div class="mobile-menu__inner">
        <a href="{{ url('/') }}" class="mobile-menu__logo">
            <img width="60px" src="{{ asset('assets/uploads/PublicSetting/' . $setting['website_logo']) }}" alt="{{ $setting['website_name'] }}"
                class="white-version">
            <img width="60px" src="{{ asset('assets/uploads/PublicSetting/' . $setting['website_logo']) }}" alt="{{ $setting['website_name'] }}"
                class="dark-version">
        </a>
        <div class="mobile-menu__menu">
            <ul class="nav-menu flx-align nav-menu--mobile">
                <li class="nav-menu__item">
                    <a href="{{ url('/') }}" class="nav-menu__link {{ request()->is('/') ? 'active' : '' }}">الرئيسية </a>
                </li>
                @foreach ($maincategories as $category)
                <li class="nav-menu__item">
                    <a href="{{ route('category', $category->meta_url ?: $category->slug) }}"
                       class="nav-menu__link {{ request()->route('url') == ($category->meta_url ?: $category->slug) ? 'active' : '' }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
                <li class="nav-menu__item">
                    <a href="{{ url('contact') }}" class="nav-menu__link {{ request()->is('contact') ? 'active' : '' }}"> اتصل بنا </a>
                </li>

            </ul>
            @if (!Auth::check())
                <div class="gap-1 my-3 header-right__inner d-lg-none d-flex flx-align">
                    <a href="{{ url('login') }}" class="btn btn-main pill">
                        <span class="icon-left icon">
                            <img src="{{ asset('assets/front/') }}/images/icons/user.svg" alt="">
                        </span> سجل الان
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
<!-- ==================== Mobile Menu End Here ==================== -->
<main class="change-gradient">
    <!-- ==================== Header Start Here ==================== -->
    <header class="header">
        <div class="container container-full">
            <nav class="header-inner flx-between">
                <!-- Logo Start -->
                <div class="logo">
                    <a href="{{ url('/') }}" class="link white-version">
                        <img src="{{ asset('assets/uploads/PublicSetting/' . $setting['website_logo']) }}" alt="{{ $setting['website_name'] }}">
                    </a>
                    <a href="{{ url('/') }}" class="link dark-version">
                        <img src="{{ asset('assets/uploads/PublicSetting/' . $setting['website_logo']) }}" alt="{{ $setting['website_name'] }}">
                    </a>
                </div>
                <!-- Logo End  -->

                <!-- Menu Start  -->
                <div class="header-menu d-lg-block d-none">

                    <ul class="nav-menu flx-align">
                        <li class="nav-menu__item">
                            <a href="{{ url('/') }}" class="nav-menu__link {{ request()->is('/') ? 'active' : '' }}">الرئيسية </a>
                        </li>
                        @foreach ($maincategories as $category)
                            <li class="nav-menu__item">
                                <a  href="{{ route('category', $category->meta_url ?: $category->slug) }}" class="nav-menu__link {{ request()->route('url') == ($category->meta_url ?: $category->slug) ? 'active' : '' }}">
                                    {{ $category['name'] }} </a>
                            </li>
                        @endforeach
                        <li class="nav-menu__item">
                            <a href="{{ url('contact') }}" class="nav-menu__link {{ request()->is('contact') ? 'active' : '' }}"> اتصل بنا </a>
                        </li>
                    </ul>
                </div>
                <!-- Menu End  -->

                <!-- Header Right start -->
                <div class="header-right flx-align">
                    @if (Auth::check())
                        @php
                            $unreadNotificationsUsers = Auth::user()->unreadNotifications->take(5); // إظهار آخر 5 إشعارات
                        @endphp
                        <!-- ############# Start User Notifications ############# -->
                        <div class="notifications dropdown">
                            {{-- <a href="#" class="header-right__button cart-btn position-relative dropdown-toggle"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-bell"></i>
                                @if ($unreadNotificationsUsers->count() > 0)
                                    <span class="qty-badge font-12">{{ $unreadNotificationsUsers->count() }}</span>
                                @endif
                            </a> --}}
                            <ul class="p-2 dropdown-menu dropdown-menu-end" style="width: 300px;">
                                <li class="px-2 d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">الإشعارات</span>
                                    <div>
                                        <a href="{{ route('notifications.markAllRead') }}"
                                            class="text-primary font-12">جعل الكل مقروء</a>
                                    </div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                @if ($unreadNotificationsUsers->count() > 0)
                                    @foreach ($unreadNotificationsUsers as $notification)
                                        <li>
                                            <a class="py-2 dropdown-item d-flex align-items-center" href="#">
                                                <i class="bi bi-dot text-danger me-2"></i>
                                                <span>{{ $notification->data['message'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="py-2 text-center text-muted">لا يوجد إشعارات جديدة</li>
                                @endif

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="text-center">
                                    <a href="{{ url('user/alerts') }}" class="text-primary font-12">عرض جميع
                                        الإشعارات</a>
                                </li>
                            </ul>
                        </div>
                        <!---------------- End User Notifications --------------->
                    @endif


                    @if (!Auth::check())
                        <div class="gap-3 header-right__inner flx-align d-lg-flex d-none">
                            <a href="{{ url('login') }}" class="btn btn-main pill">
                                <span class="icon-left icon">
                                    <img src="{{ asset('assets/front/') }}/images/icons/user.svg" alt="">
                                </span>سجل الان
                            </a>
                        </div>
                    @else
                        <div class="user-profile">
                            <span style="color: #000;margin-left:20px"> رصيدك الحالي <br>
                                <strong style="color: #D9272A;font-weight: bold">
                                    {{ number_format(Auth::user()->balance, 4) }} $</strong>
                            </span>
                            <button class="user-profile__button flex-align">
                                <span class="user-profile__thumb">
                                    @if (Auth::user()->image != '')
                                        <img src="{{ asset('assets/uploads/Users/' . Auth::user()->image) }}"
                                            alt="">
                                    @else
                                        <img src="{{ asset('assets/uploads/Users/user_avatar.png') }}"
                                            class="cover-img" alt="">
                                    @endif
                                </span>
                            </button>
                            <ul class="user-profile-dropdown">
                                <li class="sidebar-list__item">
                                    <a href="{{ url('user/orders') }}" class="sidebar-list__link">
                                        <span class="sidebar-list__icon">
                                            <img src="{{ asset('assets/front/') }}/images/icons/sidebar-icon2.svg"
                                                alt="" class="icon">
                                            <img src="{{ asset('assets/front/') }}/images/icons/sidebar-icon-active2.svg"
                                                alt="" class="icon icon-active">
                                        </span>
                                        <span class="text"> حسابي </span>
                                    </a>
                                </li>
                                <li class="sidebar-list__item">
                                    <a href="{{ url('user/setting') }}" class="sidebar-list__link">
                                        <span class="sidebar-list__icon">
                                            <img src="{{ asset('assets/front/') }}/images/icons/sidebar-icon10.svg"
                                                alt="" class="icon">
                                            <img src="{{ asset('assets/front/') }}/images/icons/sidebar-icon-active10.svg"
                                                alt="" class="icon icon-active">
                                        </span>
                                        <span class="text"> تعديل الملف الشخصي </span>
                                    </a>
                                </li>

                                <li class="sidebar-list__item">
                                    <a href="{{ url('user/balance') }}" class="sidebar-list__link">
                                        <span class="sidebar-list__icon">
                                            <img src="{{ asset('assets/front/') }}/images/icons/sidebar-icon2.svg"
                                                alt="" class="icon">
                                            <img src="{{ asset('assets/front/') }}/images/icons/sidebar-icon-active2.svg"
                                                alt="" class="icon icon-active">
                                        </span>
                                        <span class="text"> الرصيد </span>
                                    </a>
                                </li>

                                <li class="sidebar-list__item">
                                    <a href="{{ url('user/alerts') }}" class="sidebar-list__link">
                                        <span class="sidebar-list__icon">
                                            <img src="{{ asset('assets/front/') }}/images/icons/sidebar-icon2.svg"
                                                alt="" class="icon">
                                            <img src="{{ asset('assets/front/') }}/images/icons/sidebar-icon-active2.svg"
                                                alt="" class="icon icon-active">
                                        </span>
                                        <span class="text"> التنبيهات </span>
                                    </a>
                                </li>
                                <li class="sidebar-list__item">
                                    <a href="{{ url('logout') }}" class="sidebar-list__link">
                                        <span class="sidebar-list__icon">
                                            <img src="{{ asset('assets/front/') }}/images/icons/sidebar-icon13.svg"
                                                alt="" class="icon">
                                            <img src="{{ asset('assets/front/') }}/images/icons/sidebar-icon-active13.svg"
                                                alt="" class="icon icon-active">
                                        </span>
                                        <span class="text">تسجيل خروج</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif

                    <button type="button" class="toggle-mobileMenu d-lg-none"> <i class="las la-bars"></i> </button>
                </div>

                <!-- Header Right End  -->
            </nav>
        </div>
    </header>
    <!-- ==================== Header End Here ==================== -->
