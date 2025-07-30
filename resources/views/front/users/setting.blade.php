@extends('front.layouts.master')
@section('title', ' حسابي ')
@section('content')

<!-- ======================== Dashboard Cards Section Start ===================== -->
<section class="dashboard-cards-section">
    <div class="dashboard-cards-row">
        <div class="dashboard-card-item active">
            <div class="">
                <img src="{{ asset('assets/front/uploads/balance-now.png') }}" alt="الرصيد الحالي"
                    class="dashboard-card-img">
            </div>
            <div class="dashboard-card-info">
                <div class="dashboard-card-value">{{ number_format(Auth::user()->balance, 4) }}
                     {{-- <img
                        src="{{ asset('assets/front/images/icons/riyal-white.svg') }}" alt=""> --}}
                     $ </div>
                <div class="dashboard-card-label">رصيدك الآن</div>
                <i class="bi bi-arrow-left"></i>
            </div>
        </div>
        <div class="dashboard-card-item">
            <div class="">
                <img src="{{ asset('assets/front/uploads/current-used.png') }}" alt=" جار استخدامه "
                    class="dashboard-card-img">
            </div>
            <div class="dashboard-card-info">
                <div class="dashboard-card-value">{{ number_format(Auth::user()->getTotalUsedNowAttribute(), 4) }}
                     {{-- <img  src="{{ asset('assets/front/images/icons/riyal-maincolor.svg') }}" alt=""> --}}
                        $ </div>
                <div class="dashboard-card-label"> جار استخدامه </div>
                <i class="bi bi-arrow-left"></i>
            </div>
        </div>
        <div class="dashboard-card-item">
            <div class="">
                <img src="{{ asset('assets/front/uploads/spend.png') }}" alt=" أنفقت معنا  " class="dashboard-card-img">
            </div>
            <div class="dashboard-card-info">
                <div class="dashboard-card-value">{{ number_format(Auth::user()->getTotalSpendAttribute(), 4) }}
                    {{-- <img  src="{{ asset('assets/front/images/icons/riyal-maincolor.svg') }}" alt="">  --}}
               $
                </div>
                <div class="dashboard-card-label"> أنفقت معنا </div>
                <i class="bi bi-arrow-left"></i>
            </div>
        </div>
        <div class="dashboard-card-item">
            <div class="">
                <img src="{{ asset('assets/front/uploads/add-balance.png') }}" alt=" شحن رصيد الآن  "
                    class="dashboard-card-img">
            </div>
            <div class="dashboard-card-info">
                <i class="bi bi-plus"></i>
                <div class="dashboard-card-label"> شحن رصيد الآن </div>
            </div>
        </div>
    </div>
</section>
    <!-- ======================== Dashboard Cards Section End ===================== -->
    <!-- ======================== Breadcrumb Three Section Start ===================== -->
    <section class="overflow-hidden position-relative z-index-1">
        <div class="container container-two">
            <div class="breadcrumb-three-content border-bottom border-color">
                <ul class="mt-4 nav tab-bordered nav-pills" id="pills-tabbs" role="tablist">

                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/orders') }}" class="nav-link"> <i class="bi bi-cart"></i> طلباتي  </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/balance') }}" class="nav-link"> <i class="bi bi-currency-dollar"></i>  شحن رصيد   </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/wishlist') }}" class="nav-link"> <i class="bi bi-heart"></i> المفضلة   </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/alerts') }}" class="nav-link"> <i class="bi bi-bell"></i> الاشعارات  </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/tickets') }}" class="nav-link"> <i class="bi bi-chat-dots"></i>  الدعم الفني  </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/setting') }}" class="nav-link active"> <i class="bi bi-gear-fill"></i>  الاعدادات </a>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    <!-- ======================== Breadcrumb Three Section End ===================== -->

    <!-- ===================== orders Section Start ============================== -->
    <section class="pt-5 profile padding-b-120">
        <div class="container container-two">
            <div class="tab-content" id="pills-tabb">
                <div class="tab-pane fade show active" id="pills-Followingg" role="tabpanel"
                    aria-labelledby="pills-Followingg-tab" tabindex="0">
                    <!-- ================== Setting Section Start ====================== -->
                    <div class="row gy-4">
                        <div class="col-lg-12">
                            <!-- <form action="#"> -->
                            <div class="setting-content">
                                <div class="settings-card">
                                    <div class="settings-card-header">
                                        <h3 class="settings-title">البيانات الأساسية</h3>
                                    </div>
                                    <div class="settings-card-body">
                                        <form action="{{ route('update_setting') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="settings-form">
                                                <div class="form-grid">
                                                    <div class="form-group">
                                                        <div class="form-group-header">
                                                            <label for="name">اسم المستخدم</label>
                                                        </div>
                                                        <input type="text" id="name" name="name" class="form-control"
                                                            value="{{ Auth::user()->name }}" placeholder="Naif">
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-group-header">
                                                            <label for="phone">رقم الجوال</label>
                                                        </div>
                                                        <input type="text" id="phone" name="phone" class="form-control"
                                                            placeholder="أدخل رقم الجوال" value="{{ Auth::user()->phone }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-group-header">
                                                            <label for="gender">الجنس</label>
                                                        </div>
                                                        <select id="gender" name="gender" class="form-select">
                                                            <option value="male" {{ Auth::user()->sex == 'male' ? 'selected' : '' }}>ذكر</option>
                                                            <option value="female" {{ Auth::user()->sex == 'female' ? 'selected' : '' }}>أنثى</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-group-header">
                                                            <label for="city">المدينة</label>
                                                        </div>
                                                        <input type="text" id="city" name="city" class="form-control"
                                                            placeholder="القصيم" value="{{ Auth::user()->city }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-group-header">
                                                            <label for="birth_date">تاريخ الميلاد</label>
                                                        </div>
                                                        <input type="date" id="birth_date" name="birth_date" class="form-control"
                                                            value="{{ Auth::user()->birthday }}">
                                                    </div>

                                                    <div class="form-group full-width">
                                                        <div class="form-group-header">
                                                            <label for="bio">النبذة</label>
                                                        </div>
                                                        <textarea id="bio" name="bio" class="form-control"
                                                            placeholder="اكتب النبذة هنا...." rows="4">{{ Auth::user()->person_info }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                    <button type="submit" class="btn-save">
                                                        <i class="bi bi-shield-lock"></i>
                                                        حفظ البيانات
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Password Section -->
                                <div class="mt-4 settings-card">
                                    <div class="settings-card-header">
                                        <h3 class="settings-title">تغيير كلمة المرور</h3>
                                    </div>
                                    <div class="settings-card-body">
                                        <p class="alert alert-info" style="background-color: #5D5FED14;border-color: #5D5FED14;color:#5D5FED">
                                            يفضل إستخدام كلمة مرور مكونة من أحرف وأرقام وعلامات خاصة مثل ( % $ # @ )
                                        </p>
                                        <form action="{{ route('update_password') }}" method="POST" autocomplete="off">
                                            @csrf
                                            <div class="settings-form password-form">
                                                <div class="form-grid">
                                                    <div class="form-group w-100">
                                                        <div class="form-group-header">
                                                            <label for="current-password">كلمة المرور الحالية</label>
                                                        </div>
                                                        <div class="position-relative">
                                                            <input type="password" id="current-password" name="old_password"
                                                                class="form-control" required placeholder="************">
                                                            <span class="input-icon password-show-hide fas fa-eye toggle-password"
                                                                id="#current-password"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-group-header">
                                                            <label for="new-password">كلمة المرور الجديدة</label>
                                                        </div>
                                                        <div class="position-relative">
                                                            <input type="password" id="new-password" name="new_password"
                                                                class="form-control" required placeholder="************">
                                                            <span class="input-icon password-show-hide fas fa-eye toggle-password"
                                                                id="#new-password"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-group-header">
                                                            <label for="confirm-password">تأكيد كلمة المرور الجديدة</label>
                                                        </div>
                                                        <div class="position-relative">
                                                            <input type="password" id="confirm-password" name="confirm_password"
                                                                class="form-control" required placeholder="************">
                                                            <span class="input-icon password-show-hide fas fa-eye toggle-password"
                                                                id="#confirm-password"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                    <button type="submit" class="btn-save">
                                                        <i class="bi bi-lock"></i>
                                                        تغيير كلمة المرور
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ================== Setting Section End ====================== -->
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== Profile Section End ============================== -->


@endsection
