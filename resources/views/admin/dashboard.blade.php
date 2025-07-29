@extends('admin.layouts.master')
@section('title')
    الرئيسية
@endsection
@section('content')
    <!-- ==================================================== -->
    <!-- Start right Content here -->
    <!-- ==================================================== -->
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <!-- Start here.... -->
            <div class="row main-statistics">
                <div class="col-12">
                    <h5> إحصائيات الشهر <span> ( شهر فبراير ) </span> </h5>
                    <p> ملخص الشهر </p>
                </div>
                <div class="stat-details">
                    <div class="info" style="background-color: #B2FFE8">
                        <i class="bi bi-bag-fill" style="background-color: #25FFBD"></i>
                        <h4> {{ $totalVisits }} </h4>
                        <p> الزيارات </p>
                    </div>
                    <div class="info" style="background-color: #FFF4DE">
                        <i class="bi bi-file-text-fill" style="background-color: #FF947A"></i>
                        <h4> {{ $ordersCount }}</h4>
                        <p> الطلبات </p>
                    </div>
                    <div class="info" style="background-color: #E6DBF3">
                        <i class="bi bi-person-add" style="background-color: #BF83FF"></i>
                        <h4> {{ $usersCount }} </h4>
                        <p> عملاء جدد </p>
                    </div>
                    <div class="info" style="background-color: #CAD5FF">
                        <i class="bi bi-person-vcard" style="background-color: #7993FF"></i>
                        <h4> {{ $activeUsers }} </h4>
                        <p> المستخدمين النشطين </p>
                    </div>
                    <div class="info" style="background-color: #D9EFFE">
                        <i class="bi bi-file-earmark-bar-graph-fill" style="background-color: #63BEFC"></i>
                        <h4> {{ number_format($totalSales, 2) }} </h4>
                        <p> إجمالي المبيعات </p>
                    </div>
                    <div class="info" style="background-color: #DFCFFF">
                        <i class="bi bi-cash-coin" style="background-color: #B48FFE"></i>
                        <h4> {{ number_format($mainTotalPrice, 2) }} </h4>
                        <p> صافي الربح </p>
                    </div>
                    <div class="info" style="background-color: #DCFCE7">
                        <i class="bi bi-wallet2" style="background-color: #3CD856"></i>
                        <h4> {{ number_format($UserTotalBalance, 2) }} $ </h4>
                        <p> رصيد العملاء </p>
                    </div>
                </div>
            </div>

            @if (count($transactions) == 0)
                <div class="empty-data">
                    <div class="row">
                        <div class="empty-image">
                            <img src="{{ asset('assets/admin/images/empty.png') }}" alt="">
                        </div>
                        <div class="empty-info">
                            <h4> لا توجد بيانات جديدة في الوقت الحالي </h4>
                            <p> هذه الصفحة لا تحتوي على أي بيانات في الوقت الحالي، ولكننا نعمل على إثرائها بأفضل المحتوى
                                قريبًا.
                                نحن نسعى لتقديم بيانات مميزة ومفيدة تلبي اهتماماتك. </br> ترقب جديدنا قريبًا ونتمنى لك تجربة
                                ممتعة معنا! </p>
                        </div>
                    </div>
                </div>
            @else
                <!--############# Start Last Transactions  ############### -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h5 class="mb-0 card-title"> آخر عمليات الدفع </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-nowrap table-bordered">
                                        <thead class="table-primary-custome">
                                            <tr>
                                                <th> رقم الحوالة </th>
                                                <th> بوابة الدفع </th>
                                                <th> المستخدم </th>
                                                <th> مبلغ الدفع </th>
                                                <th> نسبة الرسوم </th>
                                                <th> تاريخ / وقت البدء </th>
                                                <th> حالة الحوالة </th>
                                                {{-- <th> التفاصيل </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transactions as $transaction)
                                                <tr>
                                                    <td> {{ $transaction->id }} </td>
                                                    <td> {{ $transaction->payment_method }} </td>
                                                    <td> {{ $transaction->user->name }} </td>
                                                    <td> {{ $transaction->amount }} دولار </td>
                                                    <td> 2 % </td>
                                                    <td> {{ $transaction->created_at->format('Y-m-d H:i A') }} </td>
                                                    <td>
                                                        @if ($transaction->payment_status == 'pending')
                                                            <span class="badge badge-warning bg-warning"> {{ $transaction->payment_status }} </span>
                                                        @else
                                                            <span class="badge badge-success bg-success"> {{ $transaction->payment_status == 'completed' ? 'مكتملة' : 'قيد الانتظار' }} </span>
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                        <div class="gap-2 d-flex">
                                                            <a href="#" class="btn-sm">
                                                                <i style="color: #3CD856" class="fa fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--############# End  LastUsers  ############### -->
                </div>
            @endif



        </div>
        <!-- ==================================================== -->
        <!-- End Page Content -->
        <!-- ==================================================== -->
    @endsection

    @section('js')
        <script src="{{ asset('assets/admin/js/components/apexchart-column.js') }}"></script>
    @endsection
