@extends('front.layouts.master')
@section('title', ' طلباتي ')
@section('css')
    {{--    <!-- DataTables CSS --> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection
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
                        <a href="{{ url('user/orders') }}" class="nav-link active"> <i class="bi bi-cart"></i> طلباتي </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/balance') }}" class="nav-link"> <i class="bi bi-currency-dollar"></i> شحن
                            رصيد </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/wishlist') }}" class="nav-link"> <i class="bi bi-heart"></i> المفضلة </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/alerts') }}" class="nav-link"> <i class="bi bi-bell"></i> الاشعارات </a>
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
                <div class="tab-pane fade show active" id="pills-orders" role="tabpanel" aria-labelledby="pills-orders-tab"
                    tabindex="0">
                    <!-- ========================= Orders section start =========================== -->
                    <div class="row gy-4">
                        <div class="col-12">
                            <div class="border card">
                                <div class="card-body">
                                    @if ($orders_with_status->count() > 0)
                                        <div class="table-responsive">
                                            <table id="table-search" class="table table-bordered">
                                                <thead class="table-primary-custome">
                                                    <tr>
                                                        <th> رقم الطلب </th>
                                                        <th>السعر </th>
                                                        <th> التاريخ والوقت </th>
                                                        <th> الخدمة </th>
                                                        <th> الرابط </th>
                                                        <th> الكمية </th>
                                                        <th> عدد البدا </th>
                                                        <th> العدد المتبقي </th>
                                                        <th> التقيم </th>
                                                        <th>حالة الطلب </th>
                                                        <th> العمليات </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders_with_status as $order)
                                                        <tr>
                                                            <td>{{ $order['order_number'] }} </td>
                                                            <td> {{ $order['total_price'] }} $ </td>
                                                            <td>
                                                                {{ \Carbon\Carbon::parse($order['start_time'])->format('Y-m-d A h:i') }}
                                                            </td>
                                                            <td> <a href="#"> {{ str()->limit($order['name'], 30 , '...') }} </a> </td>
                                                            <td> <a target="_blank" href="{{ $order['page_link'] }}">
                                                                    {{ $order['page_link'] }} </a></td>
                                                            <td> {{ $order['quantity'] }} </td>
                                                            <td>
                                                                {{ $order->provider_details->start_count }} </td>
                                                            <td> {{ $order->provider_details->remains }}
                                                            </td>
                                                            <td>

                                                                @if ($order->status == 'Completed')
                                                                    @if (!$order->review)
                                                                        <button type="button"
                                                                            class="btn review_order_button"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#order_rating_{{ $order['id'] }}">
                                                                            قيم الخدمة
                                                                        </button>
                                                                    @else
                                                                        <button type="button"
                                                                            class="btn review_order_success">
                                                                            تم تقيم الخدمة
                                                                        </button>
                                                                    @endif
                                                                @endif
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
                                                            <td>
                                                                <span class="badge {{ $status_details['class'] }}">
                                                                    {{ $status_details['text'] }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    @if ($order['refill'] == 'true' && $order->cancel_status != 1 && $order->refill_status != 1)
                                                                        <form
                                                                            action="{{ url('user/order/refill/' . $order['order_number']) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="provider_id"
                                                                                value="{{ $order['provider_id'] }}">
                                                                            <button class="btn btn-black btn-sm">
                                                                                <i style="color:#5D5FED"
                                                                                    class="bi bi-geo-alt-fill"></i>
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                    @if ($order['cancel'] == 'true' && $order->status != 'Completed' && $order->cancel_status != 1)
                                                                        <form
                                                                            action="{{ url('user/order/cancel/' . $order['order_number']) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="provider_id"
                                                                                value="{{ $order['provider_id'] }}">
                                                                            <button class="" style="color:red"><i
                                                                                    class="bi bi-x-square"></i>
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="no_tickets no-orders">
                                            <img src="{{ asset('assets/front/uploads/empty.svg') }}" alt="">
                                            <h6> لا توجد طلبات بعد في حسابك </h6>
                                            <a href="{{ url('/') }}" class="btn btn-primary"> <i
                                                    class="bi bi-eye"></i> عرض الخدمات </io> </a>

                                        </div>
                                    @endif


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


@section('js')
    {{--    <!-- DataTables JS --> --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // تحقق ما إذا كان الجدول قد تم تهيئته من قبل
            if ($.fn.DataTable.isDataTable('#table-search')) {
                $('#table-search').DataTable().destroy(); // تدمير التهيئة السابقة
            }

            // تهيئة DataTables من جديد
            $('#table-search').DataTable({
                "ordering": false,
                "language": {
                    "search": "بحث:",
                    "lengthMenu": "عرض _MENU_ عناصر لكل صفحة",
                    "zeroRecords": "لم يتم العثور على سجلات",
                    "info": "عرض _PAGE_ من _PAGES_",
                    "infoEmpty": "لا توجد سجلات متاحة",
                    "infoFiltered": "(تمت التصفية من إجمالي _MAX_ سجلات)",
                    "paginate": {
                        "previous": "السابق",
                        "next": "التالي"
                    }
                }
            });
        });
    </script>
@endsection
