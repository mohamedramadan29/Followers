@extends('front.layouts.master')
@section('title', ' تذاكر الدعم ')
@section('content')


    <!-- ======================== Breadcrumb Three Section Start ===================== -->
    <section class="breadcrumb-three section-bg position-relative z-index-1 overflow-hidden">

        <img src="{{ asset('assets/front/') }}/images/gradients/breadcrumb-gradient-bg.png" alt=""
            class="bg--gradient">

        <img src="{{ asset('assets/front/') }}/images/shapes/element-moon3.png" alt="" class="element one">
        <img src="{{ asset('assets/front/') }}/images/shapes/element-moon1.png" alt="" class="element three">

        <div class="container container-two">
            <div class="breadcrumb-three-content border-bottom border-color">
                <div class="breadcrumb-three-content__inner">
                    <div class="breadcrumb-three-content__left">
                        <div class="flx-between align-items-end gap-3">
                            <div class="author-profile d-flex gap-2 flex-column">
                                <div class="author-profile__thumb flex-shrink-0">
                                    @if (Auth::user()->image != '')
                                        <img style="border-radius: 50%;height:95%;width:95%"
                                            src="{{ asset('assets/uploads/Users/' . Auth::user()->image) }}" alt="">
                                    @else
                                        <img style="border-radius: 50%;height:95%;width:95%"
                                            src="{{ asset('assets/uploads/Users/user_avatar.png') }}" alt="">
                                    @endif

                                </div>

                                <div class="d-flex align-items-end flex-wrap gap-4">
                                    <div class="author-profile__info">
                                        <h5 class="author-profile__name mb-2"> {{ Auth::user()->name }} </h5>
                                        <span class="author-profile__membership font-14"> عضو
                                            {{ \Carbon\Carbon::parse(Auth::user()->created_at)->diffForHumans() }} </span>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="breadcrumb-three-content__right flex-shrink-0  d-flex align-items-center gap-4 gap-lg-5">

                                <div class="sales">
                                    <span class="sales__text mb-1 text-heading fw-500">الرصيد الحالي </span>
                                    <h5 class="sales__amount mb-0"> {{ number_format(Auth::user()->balance, 2) }} دولار </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav tab-bordered nav-pills mt-4" id="pills-tabbs" role="tablist">

                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/orders') }}" class="nav-link"> طلباتي </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/balance') }}" class="nav-link"> الرصيد </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/tickets') }}" class="nav-link active"> تذاكر الدعم  </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/setting') }}" class="nav-link"> الاعدادات </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/alerts') }}" class="nav-link"> التنبيهات </a>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    <!-- ======================== Breadcrumb Three Section End ===================== -->

    <!-- ===================== orders Section Start ============================== -->
    <section class="profile pt-5 padding-b-120">
        <div class="container container-two">
            <div class="tab-content" id="pills-tabb">
                <div class="tab-pane fade show active" id="pills-Followingg" role="tabpanel"
                    aria-labelledby="pills-Followingg-tab" tabindex="0">
                    <!-- ================== Setting Section Start ====================== -->
                    <div class="row gy-4">
                        <div class="col-lg-12">

                            <div class="search_button">
                                <a href="{{ url('user/ticket/add') }}" class="btn btn-main btn-sm pill"> اضافة تذكرة جديدة
                                </a>
                            </div>

                        </div>
                        <div class="col-12">
                            <div class="card common-card border border-gray-five">
                                <div class="card-body tickets_page">
                                    <div class="tickets">
                                        @forelse ($tickets as $ticket)
                                            <a href="{{ url('user/ticket/' . $ticket['id']) }}">
                                                <div class="ticket">
                                                    <div class="ticket_logo">
                                                        <i class="bi bi-ticket"></i>
                                                    </div>
                                                    <div>
                                                        <h4> {{ $ticket['title'] }} </h4>
                                                        <div class="ticket_details">
                                                            <p>
                                                                <i class="bi bi-ticket-fill"></i>
                                                                {{ $ticket['id'] }}
                                                            </p>
                                                            <p>
                                                                <i class="bi bi-clock-fill"></i>
                                                                {{ $ticket->created_at->diffForHumans() }}
                                                            </p>
                                                            <p>
                                                                <i class="bi bi-check-circle-fill"></i>
                                                                @if ($ticket['status'] == 0)
                                                                    لا يتوفر رد
                                                                @elseif($ticket['status'] == 1)
                                                                    يتوفر رد
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </a>
                                        @empty
                                            <div class="no_tickets">
                                                <i class="fa fa-comments"></i>
                                                <h6> تواصل معنا في أي وقت اذا احتجت أي مساعدة </h6>
                                                <a href="{{ url('user/ticket/add') }}" class="btn btn-main btn-lg pill">
                                                    اضافة
                                                    تذكرة جديدة
                                                </a>
                                            </div>
                                        @endforelse
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
