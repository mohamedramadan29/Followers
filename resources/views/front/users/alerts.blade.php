@extends('front.layouts.master')
@section('title', ' الاشعارات ')
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
                    <div class="dashboard-card-value">{{ number_format(Auth::user()->balance, 2) }} <img
                            src="{{ asset('assets/front/images/icons/riyal-white.svg') }}" alt=""> </div>
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
                    <div class="dashboard-card-value">{{ number_format(Auth::user()->balance, 2) }} <img
                            src="{{ asset('assets/front/images/icons/riyal-maincolor.svg') }}" alt=""> </div>
                    <div class="dashboard-card-label"> جار استخدامه </div>
                    <i class="bi bi-arrow-left"></i>
                </div>
            </div>
            <div class="dashboard-card-item">
                <div class="">
                    <img src="{{ asset('assets/front/uploads/spend.png') }}" alt=" أنفقت معنا  " class="dashboard-card-img">
                </div>
                <div class="dashboard-card-info">
                    <div class="dashboard-card-value">{{ number_format(Auth::user()->balance, 2) }} <img
                            src="{{ asset('assets/front/images/icons/riyal-maincolor.svg') }}" alt=""> </div>
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
                        <a href="{{ url('user/alerts') }}" class="nav-link active"> <i class="bi bi-bell"></i> الاشعارات
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/tickets') }}" class="nav-link"> <i class="bi bi-chat-dots"></i> الدعم الفني
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
            <div class="tab-content" id="pills-tabb">
                <div class="tab-pane fade show active" id="pills-Followingg" role="tabpanel"
                    aria-labelledby="pills-Followingg-tab" tabindex="0">
                    <!-- ================== Setting Balance  Start ====================== -->
                    <div class="row gy-4">
                        <div class="col-12">
                            <div class="border card common-card border-gray-five">
                                <div class="card-body">
                                    @if ($notifications->count() > 0)
                                        <div class="notification-section">
                                            <h5> كل الاشعارات </h5>
                                            <div class="notifications-header">
                                                <div class="right-section">
                                                    <a href="{{ route('alerts') }}" class="active"> الكل </a>
                                                    <a href="{{ route('alerts.unread') }}"> الغير مقروءة
                                                        ({{ $unreadNotifications->count() }})</a>
                                                </div>
                                                <div class="left-section">
                                                    <a href="{{ route('notifications.markAllRead') }}"> تعين الكل مقروءة
                                                    </a>
                                                </div>
                                            </div>
                                            @if (isset($_GET['unread']))
                                                @foreach ($unreadNotifications as $notification)
                                                    <div
                                                        class="notifications-body {{ $notification->read_at ? 'read' : 'no-read' }}">
                                                        <div>
                                                            <i class="bi bi-bell-fill"></i>
                                                        </div>
                                                        <div>
                                                            <h3> {{ $notification->data['title'] }} </h3>
                                                            <p> {{ $notification->data['message'] }} </p>
                                                            <span> {{ $notification->created_at->diffForHumans() }} </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                @foreach ($notifications as $notification)
                                                    <div
                                                        class="notifications-body {{ $notification->read_at ? 'read' : 'no-read' }}">
                                                        <div>
                                                            <i class="bi bi-bell-fill"></i>
                                                        </div>
                                                        <div>
                                                            <h3> {{ $notification->data['title'] }} </h3>
                                                            <p> {{ $notification->data['message'] }} </p>
                                                            <span> {{ $notification->created_at->diffForHumans() }} </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    @else
                                        <div class="no_tickets no-orders">
                                            <img src="{{ asset('assets/front/uploads/empty-alert.svg') }}"
                                                alt="">
                                            <h6> لا توجد أى اشعارات حاليا </h6>
                                        </div>
                                    @endif

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
