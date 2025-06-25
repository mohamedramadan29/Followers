@extends('front.layouts.master')
@section('title', ' تذاكر الدعم ')
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
            <div class="tab-content" id="pills-tabb">
                <div class="tab-pane fade show active" id="pills-Followingg" role="tabpanel"
                    aria-labelledby="pills-Followingg-tab" tabindex="0">
                    <!-- ================== Setting Section Start ====================== -->
                    <div class="row gy-4">
                        <div class="col-12">
                            <div class="card common-card" style="background-color: #F7F7F7">
                                <div class="card-body">
                                    <div class="messages-container margin-top-0">
                                        <div class="messages-headline">
                                            <h4> {{ $ticket['title'] }} </h4>
                                        </div>
                                        <div class="messages-container-inner">
                                            <!-- Message Content -->
                                            <div class="dash-msg-content">
                                                @foreach ($messages as $message)
                                                    <div
                                                        class="message-plunch {{ $message['sender_type'] == 'user' ? 'me' : '' }}">
                                                        <div class="dash-msg-avatar">
                                                            @if ($message['sender_type'] == 'user' && Auth::user()->image != '')
                                                                <img src="{{ asset('assets/uploads/Users/' . Auth::user()->image) }}"
                                                                    class="rounded img-fluid" alt="">
                                                            @else
                                                            @if($message['sender_type'] == 'support')
                                                                <img src="{{ asset('assets/uploads/PublicSetting/' . $setting['website_logo']) }}"
                                                                    class="rounded img-fluid" alt="">
                                                            @else
                                                                <img src="{{ asset('assets/uploads/Users/user_avatar.png') }}"
                                                                    class="rounded img-fluid" alt="">
                                                            @endif
                                                            @endif
                                                        </div>

                                                        <div class="dash-msg-text">
                                                            <h6 class="user_name">
                                                                {{ $message['sender_type'] == 'user' ? Auth::user()->name : ' الدعم  ' }}
                                                            </h6>
                                                            <p> {{ $message['message'] }} </p>
                                                            <span> <i><i class="bi bi-clock"></i> {{ $message['created_at']->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class="clearfix"></div>
                                                <form method="POST"
                                                    action="{{ url('user/message/create/' . $ticket_id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="message-reply">

                                                        <textarea name="message" required class="form-control with-light" placeholder=" اكتب رسالتك  "></textarea>
                                                        <button type="submit" class="btn btn-main btn-sm pill"> ارسال <i
                                                                class="bi bi-send"></i> </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
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
