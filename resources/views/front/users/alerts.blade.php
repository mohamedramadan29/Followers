@extends('front.layouts.master')
@section('title', ' الاشعارات ')
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
                        <a href="{{ url('user/tickets') }}" class="nav-link"> تذاكر الدعم </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/setting') }}" class="nav-link"> الاعدادات </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/alerts') }}" class="nav-link active"> التنبيهات </a>
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
                    <!-- ================== Setting Balance  Start ====================== -->
                    <div class="row gy-4">
                        <div class="col-12">
                            <div class="card common-card border border-gray-five">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-body mt--24">
                                            <thead>
                                                <tr>
                                                    <th> التاريخ </th>
                                                    <th> الاشعار </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($notifications as $notification)
                                                <tr>
                                                    <td data-label="Date"> {{ $notification->created_at->translatedFormat('d F , Y') }} </td>
                                                    <td data-label="Order ID"> {{ $notification->data['message'] }} </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

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
