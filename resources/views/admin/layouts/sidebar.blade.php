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
            @can('admins')
                <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarorders" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarorders">
                        <span class="nav-icon">
                            <i class="bi bi-list-check"></i>
                        </span>
                        <span class="nav-text"> سجل الطلبات </span>
                    </a>
                    <div class="collapse" id="sidebarorders">
                        <ul class="nav sub-navbar-nav">

                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{ url('admin/orders') }}"> جميع الطلبات </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarCustomers" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarCustomers">
                        <span class="nav-icon">
                            <i class="bi bi-people"></i>
                        </span>
                        <span class="nav-text"> المستخدمين </span>
                    </a>
                    <div class="collapse" id="sidebarCustomers">
                        <ul class="nav sub-navbar-nav">
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{ url('admin/users') }}"> جميع المستخدمين </a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{ url('admin/user/add') }}"> اضافة مستخدم </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @can('support')
                <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarSupport" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarSupport">
                        <span class="nav-icon">
                            <i class="bi bi-people"></i>
                        </span>
                        <span class="nav-text"> خدمة العملاء </span>
                    </a>
                    <div class="collapse" id="sidebarSupport">
                        <ul class="nav sub-navbar-nav">
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{ url('admin/support/tickets') }}"> جميع التذاكر </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan
                @can('reviews')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/reviews') }}">
                        <span class="nav-icon">
                            <i class="bi bi-person-raised-hand"></i>
                        </span>
                        <span class="nav-text"> التقيمات  </span>
                    </a>
                </li>
                @endcan

                <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarProviders" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarProviders">
                        <span class="nav-icon">
                            <i class="bi bi-server"></i>
                        </span>
                        <span class="nav-text"> مزودي الخدمات </span>
                    </a>
                    <div class="collapse" id="sidebarProviders">
                        <ul class="nav sub-navbar-nav">
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{ url('admin/providers') }}"> مزودي الخدمات </a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{ url('admin/provider/add') }}"> اضافة مزود جديد </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarProducts" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarProducts">
                        <span class="nav-icon">
                            <i class="bi bi-hdd-stack-fill"></i>
                        </span>
                        <span class="nav-text"> الخدمات </span>
                    </a>
                    <div class="collapse" id="sidebarProducts">
                        <ul class="nav sub-navbar-nav">

                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{ url('admin/products') }}"> جميع الخدمات </a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{ url('admin/product/add') }}"> اضف خدمة جديدة </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarCategory" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarCategory">
                        <span class="nav-icon">
                            <i class="bi bi-tags-fill"></i>
                        </span>
                        <span class="nav-text"> التصنيفات </span>
                    </a>
                    <div class="collapse" id="sidebarCategory">
                        <ul class="nav sub-navbar-nav">
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{ url('admin/main-categories') }}"> التصنيفات الرئيسية
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarPermissions" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarPermissions">
                        <span class="nav-icon">
                            <i class="bi bi-ui-checks"></i>
                        </span>
                        <span class="nav-text"> الصلاحيات </span>
                    </a>
                    <div class="collapse" id="sidebarPermissions">
                        <ul class="nav sub-navbar-nav">
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{ url('admin/roles') }}"> جميع الصلاحيات
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarEmployess" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarEmployess">
                        <span class="nav-icon">
                            <i class="bi bi-people"></i>
                        </span>
                        <span class="nav-text"> الموظفين </span>
                    </a>
                    <div class="collapse" id="sidebarEmployess">
                        <ul class="nav sub-navbar-nav">
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="{{ url('admin/employees') }}"> جميع الموظفين </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarfaqs" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarfaqs">
                    <span class="nav-icon">
                        <i class="bi bi-patch-question-fill"></i>
                    </span>
                    <span class="nav-text">الاسئلة الشائعة للمتجر </span>
                </a>
                <div class="collapse" id="sidebarfaqs">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ url('admin/faqs') }}"> الاسئلة الشائعة للمتجر </a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ url('admin/faq/add') }}"> اضافة سوال جديد </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarlastnews" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarlastnews">
                    <span class="nav-icon">
                        <i class="bi bi-brush"></i>
                    </span>
                    <span class="nav-text"> احدث الاخبار </span>
                </a>
                <div class="collapse" id="sidebarlastnews">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ url('admin/news') }}"> احدث الاخبار </a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ url('admin/news/add') }}"> اضافة خبر جديد </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarchatboot" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarchatboot">
                    <span class="nav-icon">
                        <i class="bi bi-robot"></i>
                    </span>
                    <span class="nav-text"> اسئلة وتدريب البوت </span>
                </a>
                <div class="collapse" id="sidebarchatboot">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ url('admin/bootfaqs') }}"> الاسئلة </a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ url('admin/bootfaqs/add') }}"> اضافة سوال </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebaradvs" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarBrands">
                    <span class="nav-icon">
                        <i class="bi bi-diagram-3-fill"></i>
                    </span>
                    <span class="nav-text"> المدونة </span>
                </a>
                <div class="collapse" id="sidebaradvs">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ url('admin/blog_category') }}"> اقسام المدونة </a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ url('admin/blogs') }}"> التدوينات </a>
                        </li>

                    </ul>
                </div>
            </li>

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
            </li>



            <li class="mt-2 menu-title"> اعدادات الموقع</li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/public-setting/update') }}">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:settings-bold-duotone"></iconify-icon>
                    </span>
                    <span class="nav-text"> الاعدادات العامة </span>
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
            </li>




        </ul>
    </div>
</div>
<!-- ========== App Menu End ========== -->
