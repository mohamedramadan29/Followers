@extends('front.layouts.master')
@section('title', ' طلباتي ')
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
                                    <h5 class="sales__amount mb-0"> {{ number_format(Auth::user()->balance, 2) }} دولار
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav tab-bordered nav-pills mt-4" id="pills-tabbs" role="tablist">

                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/orders') }}" class="nav-link active"> طلباتي </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/balance') }}" class="nav-link"> الرصيد </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/tickets') }}" class="nav-link"> تذاكر الدعم  </a>
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
                <div class="tab-pane fade show active" id="pills-orders" role="tabpanel" aria-labelledby="pills-orders-tab"
                    tabindex="0">
                    <!-- ========================= Orders section start =========================== -->
                    <div class="row gy-4">
                        <div class="col-12">
                            <div class="card common-card border border-gray-five">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        @if ($orders_with_status->count() > 0)
                                            <table class="table text-body mt--24">
                                                <thead>
                                                    <tr>
                                                        <th> رقم الطلب </th>
                                                        <th>تاريخ الطلب </th>
                                                        <th> الكمية </th>
                                                        <th>اسم الخدمة </th>
                                                        <th>السعر </th>
                                                        <th> عدد البدا </th>
                                                        <th> العدد المتبقي </th>
                                                        <th>حالة الطلب </th>
                                                        <th> العمليات </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders_with_status as $order)
                                                        <tr>
                                                            <td data-label="Order ID"># {{ $order['order_number'] }} </td>
                                                            <td data-label="Date"> {{ $order['created_at'] }} </td>
                                                            <td data-label="Date"> {{ $order['quantity'] }} </td>
                                                            <td data-label="Type"> {{ $order['name'] }} </td>
                                                            <td data-label="Price"> {{ $order['total_price'] }} $ </td>
                                                            <td data-label="Date">
                                                                {{ $order->provider_details->start_count }} </td>
                                                            <td data-label="Date"> {{ $order->provider_details->remains }}
                                                            </td>
                                                            @php
                                                                // مصفوفة الحالات والألوان
                                                                $statuses = [
                                                                    'Partial' => [
                                                                        'text' => 'مكتمل جزئياً',
                                                                        'class' => 'bg-warning',
                                                                    ], // اللون الأصفر
                                                                    'Completed' => [
                                                                        'text' => 'مكتمل',
                                                                        'class' => 'bg-success',
                                                                    ], // اللون الأخضر
                                                                    'Pending' => [
                                                                        'text' => 'قيد التنفيذ',
                                                                        'class' => 'bg-primary',
                                                                    ], // اللون الأزرق
                                                                    'Processing' => [
                                                                        'text' => 'جاري المعالجة',
                                                                        'class' => 'bg-info',
                                                                    ], // اللون السماوي
                                                                    'Canceled' => [
                                                                        'text' => 'ملغي',
                                                                        'class' => 'bg-danger',
                                                                    ], // اللون الأحمر
                                                                    'Refunded' => [
                                                                        'text' => 'تم الاسترداد',
                                                                        'class' => 'bg-dark',
                                                                    ], // اللون الرمادي الداكن
                                                                ];
                                                                // الحالة الحالية
                                                                $current_status =
                                                                    $order->provider_details->status ?? 'Unknown';
                                                                $status_details = $statuses[$current_status] ?? [
                                                                    'text' => 'غير معروف',
                                                                    'class' => 'bg-secondary',
                                                                ]; // لون رمادي فاتح للحالة غير المعروفة
                                                            @endphp
                                                            <td data-label="status">
                                                                <span class="badge {{ $status_details['class'] }}">
                                                                    {{ $status_details['text'] }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    @if ($order['refill'] == 'true')
                                                                        <form
                                                                            action="{{ url('user/order/refill/' . $order['order_number']) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="provider_id"
                                                                                value="{{ $order['provider_id'] }}">
                                                                            <button class="btn btn-black btn-sm"> تعويض
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                    @if ($order['cancel'] == 'true')
                                                                        <form
                                                                            action="{{ url('user/order/cancel/' . $order['order_number']) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="provider_id"
                                                                                value="{{ $order['provider_id'] }}">
                                                                            <button class="btn btn-danger btn-sm"> الغاء
                                                                                الطلب <i class="bi bx-shield-x"></i>
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        @else
                                            <div class="no_tickets">
                                                <i class="fa fa-shopping-bag"></i>
                                                <h6> لا يوجد طلبات متوفرة حتي الان </h6>

                                            </div>
                                        @endif

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
