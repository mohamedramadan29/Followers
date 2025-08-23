@extends('front.layouts.master')
@section('title', $meta['title'])
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
                        <a href="{{ url('user/orders') }}" class="nav-link"> <i class="bi bi-cart"></i> طلباتي </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/balance') }}" class="nav-link"> <i class="bi bi-currency-dollar"></i>
                            شحن رصيد </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/wishlist') }}" class="nav-link"> <i class="bi bi-heart"></i> المفضلة </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/alerts') }}" class="nav-link"> <i class="bi bi-bell"></i> الاشعارات
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/tickets') }}" class="nav-link active"> <i class="bi bi-chat-dots"></i> الدعم
                            الفني
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/setting') }}" class="nav-link"> <i class="bi bi-gear-fill"></i> الاعدادات
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    <!-- ======================== Breadcrumb Three Section End ===================== -->
    <!-- ===================== orders Section Start ============================== -->
    <section class="pt-5 profile padding-b-120">
        <div class="container container-two">
            <div class="ticket-header">
                <h2> إضافة تذكرة جديدة </h2>
                <a href="{{ url('user/tickets') }}" class="btn-md"> <i class="bi bi-list-ul"></i> سجل التذاكر السابقة </a>
            </div>
            <div class="tab-content" id="pills-tabb">
                <div class="tab-pane fade show active" id="pills-Followingg" role="tabpanel"
                    aria-labelledby="pills-Followingg-tab" tabindex="0">
                    <!-- ================== Setting Section Start ====================== -->
                    <div class="row gy-4 add-support-section">
                        <div class="col-12">
                            <div class="border card common-card border-gray-five">
                                <div class="card-body">
                                    <form action="{{ route('store_ticket') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gy-3">
                                            <div class="col-sm-12 col-xs-12 support-type">
                                                <div class="form-check">
                                                    <input value="orders" class="form-check-input" type="radio" name="support_type"
                                                        id="radioSupportType1" checked>
                                                    <label class="form-check-label" for="radioSupportType1">
                                                        <i class="bi bi-card-list"></i>      الطلبات
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input value="payments" class="form-check-input" type="radio" name="support_type"
                                                        id="radioSupportType2">
                                                    <label class="form-check-label" for="radioSupportType2">
                                                        <i class="bi bi-wallet2"></i>
                                                        المدفوعات
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12">
                                                <label for="title" class="form-label"> عنوان التذكرة </label>
                                                <input name="title" type="text"
                                                    class="common-input common-input--md border--color-dark bg--white"
                                                    id="name" placeholder=" عنوان التذكرة ">
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="aboutProfile" class="form-label"> التذكرة </label>
                                                <textarea name="message" class="common-input common-input--md border--color-dark bg--white" id="aboutProfile"
                                                    placeholder="  اكتب محتوى الرسالة هنا...  "></textarea>
                                            </div>
                                            <div class="col-sm-12 col-xs-12">
                                                <label for="image" class="form-label"> ارفاق صورة  </label>
                                                <input name="image" type="file"
                                                    class="common-input common-input--md border--color-dark bg--white" accept="image/*"
                                                    id="image">
                                            </div>

                                            <button type="submit" type="button" class="btn send-ticket btn-md">
                                                ارسال التذكرة  <i class="bi bi-book-half"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ========================= Orders section End =========================== -->
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== Profile Section End ============================== -->
@endsection
