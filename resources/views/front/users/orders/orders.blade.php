@extends('front.layouts.master')
@section('title', ' طلباتي ')
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
                    <img src="{{ asset('assets/front/uploads/spend.png') }}" alt=" أنفقت معنا  "
                        class="dashboard-card-img">
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
                        <a href="{{ url('user/orders') }}" class="nav-link active"> <i class="bi bi-cart"></i> طلباتي  </a>
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
                        <a href="{{ url('user/setting') }}" class="nav-link"> <i class="bi bi-gear-fill"></i>  الاعدادات </a>
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
                <div class="tab-pane fade show active" id="pills-orders" role="tabpanel" aria-labelledby="pills-orders-tab"
                    tabindex="0">
                    <!-- ========================= Orders section start =========================== -->
                    <div class="row gy-4">
                        <div class="col-12">
                            <div class="border card common-card border-gray-five">
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
                                            <div class="no_tickets no-orders">
                                                <img src="{{ asset('assets/front/uploads/empty.svg') }}" alt="">
                                                <h6> لا توجد طلبات بعد في حسابك </h6>
                                                <a href="{{ url('/') }}" class="btn btn-primary"> <i class="bi bi-eye"></i>  عرض الخدمات   </io> </a>

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
