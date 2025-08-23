@php
    $publicsetting = \App\Models\admin\PublicSetting::first();
@endphp
<!-- ========== App Menu Start ========== -->
<div class="main-nav">
    <!-- Sidebar Logo -->
    <div class="logo-box">
        <a href="{{ url('admin/dashboard') }}" class="logo-dark">
            <img src="{{ asset('assets/uploads/PublicSetting/' . $publicsetting['website_logo']) }}" class="logo-sm"
                alt="logo sm">
            <img src="{{ asset('assets/uploads/PublicSetting/' . $publicsetting['website_logo']) }}" class="logo-lg"
                alt="logo dark">
        </a>
        <a href="{{ url('admin/dashboard') }}" class="logo-light">
            <img src="{{ asset('assets/uploads/PublicSetting/' . $publicsetting['website_logo']) }}" class="logo-sm"
                alt="logo sm">
            <img style="height: 85px !important;"
                src="{{ asset('assets/uploads/PublicSetting/' . $publicsetting['website_logo']) }}" class="logo-lg"
                alt="logo light">
        </a>
    </div>
    <!-- Menu Toggle Button (sm-hover) -->
    <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
        <iconify-icon icon="solar:double-alt-arrow-right-bold-duotone" class="button-sm-hover-icon"></iconify-icon>
    </button>
    <div class="scrollbar" data-simplebar>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"> العام</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <span class="nav-icon">
                        <i class="bi bi-house-door-fill"></i>
                    </span>
                    <span class="nav-text"> الرئيسية </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @yield('orders-active')" href="{{ url('admin/orders') }}">
                    <span class="nav-icon">
                        <i class="bi bi-list-check"></i>
                    </span>
                    <span class="nav-text"> سجل الطلبات </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('users-active')" href="{{ url('admin/users') }}">
                    <span class="nav-icon">
                        <i class="bi bi-people"></i>
                    </span>
                    <span class="nav-text"> المستخدمين </span>
                </a>
            </li>
            @can('support')
                <li class="nav-item">
                    <a class="nav-link @yield('support-active')" href="{{ url('admin/support/tickets') }}">
                        <span class="nav-icon">
                            <i class="bi bi-people"></i>
                        </span>
                        <span class="nav-text"> خدمة العملاء </span>
                    </a>
                </li>
            @endcan
            @can('reviews')
                <li class="nav-item">
                    <a class="nav-link @yield('reviews-active')" href="{{ url('admin/reviews') }}">
                        <span class="nav-icon">
                            <i class="bi bi-stack"></i>
                        </span>
                        <span class="nav-text"> التقيمات </span>
                    </a>
                </li>
            @endcan

            @can('reports')
                <li class="nav-item">
                    <a class="nav-link @yield('reports-active')" href="{{ url('admin/reports/index') }}">
                        <span class="nav-icon">
                            <i class="bi bi-bar-chart-line"></i>
                        </span>
                        <span class="nav-text"> التقارير </span>
                    </a>

                </li>
            @endcan
            {{-- @can('products') --}}
            <li class="nav-item">
                <a class="nav-link @yield('products-active')" href="{{ url('admin/products') }}">
                    <span class="nav-icon">
                        <i class="bi bi-hdd-stack-fill"></i>
                    </span>
                    <span class="nav-text"> الخدمات </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('providers-active')" href="{{ url('admin/providers') }}">
                    <span class="nav-icon">
                        <i class="bi bi-server"></i>
                    </span>
                    <span class="nav-text"> مزودي الخدمات </span>
                </a>
            </li>
            {{-- @endcan --}}

            {{-- @can('blog') --}}
            <li class="nav-item">
                <a class="nav-link @yield('blog-active')" href="{{ url('admin/blogs') }}"">
                    <span class="nav-icon">
                        <i class="bi bi-brush"></i>
                    </span>
                    <span class="nav-text"> المدونة </span>
                </a>
            </li>
            {{-- @endcan --}}
            {{-- @can('boot') --}}
            <li class="nav-item">
                <a class="nav-link @yield('chatboot-active')" href="{{ url('admin/bootfaqs') }}">
                    <span class="nav-icon">
                        <i class="bi bi-robot"></i>
                    </span>
                    <span class="nav-text"> تدريب البوت </span>
                </a>

            </li>
            {{-- @endcan --}}

            {{-- @can('news') --}}
            <li class="nav-item">
                <a class="nav-link @yield('lastnews-active')" href="{{ url('admin/news') }}">
                    <span class="nav-icon">
                        <i class="bi bi-book-half"></i>
                    </span>
                    <span class="nav-text"> احدث الاخبار </span>
                </a>

            </li>
            {{-- @endcan --}}

            {{-- @can('faqs') --}}
            <li class="nav-item">
                <a class="nav-link @yield('faqs-active')" href="{{ url('admin/faqs') }}">
                    <span class="nav-icon">
                        <i class="bi bi-info-square"></i>
                    </span>
                    <span class="nav-text">الاسئلة الشائعة </span>
                </a>
            </li>
            {{-- @endcan --}}

            {{-- @can('employees') --}}
            <li class="nav-item">
                <a class="nav-link @yield('employees-active')" href="{{ url('admin/employees') }}">
                    <span class="nav-icon">
                        <i class="bi bi-people"></i>
                    </span>
                    <span class="nav-text"> الادراين  </span>
                </a>
            </li>
            {{-- @endcan --}}



            {{-- @can('roles') --}}
            <li class="nav-item">
                <a class="nav-link @yield('roles-active')" href="{{ url('admin/roles') }}">
                    <span class="nav-icon">
                        <i class="bi bi-ui-checks"></i>
                    </span>
                    <span class="nav-text"> الصلاحيات </span>
                </a>

            </li>
            {{-- @endcan --}}

             {{-- @can('wallet') --}}
             <li class="nav-item">
                <a class="nav-link @yield('wallet-active')" href="{{ url('admin/wallet/index') }}">
                    <span class="nav-icon">
                        <i class="bi bi-wallet2"></i>
                    </span>
                    <span class="nav-text"> المحفظة </span>
                </a>
            </li>
            {{-- @endcan --}}

             {{-- @can('wallet') --}}
             <li class="nav-item">
                <a class="nav-link @yield('page-active')" href="{{ url('admin/pages') }}">
                    <span class="nav-icon">
                        <i class="bi bi-browser-edge"></i>
                    </span>
                    <span class="nav-text"> الصفحات التعريفية </span>
                </a>
            </li>
            {{-- @endcan --}}


{{--

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarterms" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarterms">
                    <span class="nav-icon">
                        <i class="bi bi-sliders"></i>
                    </span>
                    <span class="nav-text"> سياسات الموقع </span>
                </a>
                <div class="collapse" id="sidebarterms">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ url('admin/terms') }}"> الشروط والاحكام </a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ url('admin/return-policy') }}"> سياسة الاستبدال و
                                الاسترجاع </a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ url('admin/privacy-policy') }}"> سياسة الاستخدام
                                والخصوصية </a>
                        </li>

                    </ul>
                </div>
            </li> --}}



            <li class="mt-2 menu-title"> اعدادات الموقع</li>
            <li class="nav-item @yield('publicsetting-active')">
                <a class="nav-link" href="{{ url('admin/public-setting/update') }}">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:settings-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> الاعدادات   </span>
                </a>
            </li>


            <li class="mt-2 menu-title"> الاشعارات </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/notifications') }}">
                    <span class="nav-icon">
                        <i class="bi bi-bell"></i>
                    </span>
                    <span class="nav-text"> الاشعارات العامة </span>
                </a>
            </li>

{{--

            <li class="mt-2 menu-title"> المستخدمين</li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebaradminprofile" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarCustomers">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:chat-square-like-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> حسابي </span>
                </a>
                <div class="collapse" id="sidebaradminprofile">
                    <ul class="nav sub-navbar-nav">

                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ url('admin/update_admin_details') }}"> تعديل البيانات
                            </a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ url('admin/update_admin_password') }}"> تعديل كلمة
                                المرور </a>
                        </li>
                    </ul>
                </div>
            </li> --}}




        </ul>
    </div>
</div>
<!-- ========== App Menu End ========== -->
