@extends('admin.layouts.master')
@section('title', 'تفاصيل المستخدم')
@section('users-active', 'active')
@section('users-collapse', 'show')
@section('css')
    {{--    <!-- DataTables CSS --> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-12 col-lg-8">
                    <div class="card" style="background-color: #F2F2F8">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title"> تفاصيل المستخدم </h4>
                            <div class="buttons">
                                @if ($user->block_status == 0)
                                    <form action="{{ route('admin.user.ban', $user->id) }}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="btn-ban btn {{ $user->block_status == 0 ? 'active' : '' }}"> <i
                                                class="ti ti-ban"></i> حظر </button>
                                        <button type="button" class="btn-unban btn"> <i class="ti ti-check"></i> رفع حظر
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.user.unban', $user->id) }}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="btn-unban btn {{ $user->block_status == 1 ? 'active' : '' }}"> <i
                                                class="ti ti-check"></i> رفع حظر </button>
                                        <button type="button"
                                            class="btn-ban btn {{ $user->block_status == 0 ? 'active' : '' }}"> <i
                                                class="ti ti-ban"></i> حظر </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 person_info">
                                    <img src="{{ asset('assets/admin/images/avatar.png') }}" alt="">
                                    <h3> {{ $user->name }} </h3>
                                    <p>
                                        {{ $user->person_info }}
                                    </p>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="mb-3">
                                        <label for="api_key" class="form-label"> رقم الهاتف </label>
                                        <input disabled readonly type="text" id="api_key" name="api_key"
                                            class="form-control" placeholder="" value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="mb-3">
                                        <label for="api_url" class="form-label"> البريد الالكتروني </label>
                                        <input disabled readonly type="text" id="api_url" name="api_url"
                                            class="form-control" placeholder="" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="mb-3">
                                        <label for="account_status" class="form-label"> حالة الحساب </label>
                                        <input disabled readonly type="text" id="account_status" name="account_status"
                                            class="form-control" placeholder=""
                                            value="{{ $user->block_status == 1 ? 'محظور' : 'مفعل' }}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                    <div class="mb-3">
                                        <label for="api_key" class="form-label"> الرصيد الحالي </label>
                                        <input disabled readonly type="text" id="api_key" name="api_key"
                                            class="form-control" placeholder=""
                                            value="{{ number_format($user->balance, 2) }} دولار">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="mb-3">
                                        <label for="api_key" class="form-label"> عدد الطلبات </label>
                                        <input disabled readonly type="text" id="api_key" name="api_key"
                                            class="form-control" placeholder="" value="{{ $user->orders->count() }}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                    <div class="mb-3">
                                        <label for="api_key" class="form-label"> انفاق الحساب </label>
                                        <input disabled readonly type="text" id="api_key" name="api_key"
                                            class="form-control" placeholder=""
                                            value="{{ number_format($user->getTotalSpendAttribute(), 2) }} دولار">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="mb-3">
                                        <label for="api_key" class="form-label"> الجنس </label>
                                        <input disabled readonly type="text" id="api_key" name="api_key"
                                            class="form-control" placeholder="" value="{{ $user->sex }}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                    <div class="mb-3">
                                        <label for="api_key" class="form-label"> المدينة </label>
                                        <input disabled readonly type="text" id="api_key" name="api_key"
                                            class="form-control" placeholder="" value="{{ $user->city }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="mb-3">
                                        <label for="api_key" class="form-label"> تاريخ الميلاد </label>
                                        <input disabled readonly type="text" id="api_key" name="api_key"
                                            class="form-control" placeholder="" value="{{ $user->birthday }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="mb-3">
                                        <label for="api_key" class="form-label"> تاريخ التسجيل في الموقع </label>
                                        <input disabled readonly type="text" id="api_key" name="api_key"
                                            class="form-control" placeholder=""
                                            value="{{ $user->created_at->format('Y-m-d') }}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                    <div class="mb-3">
                                        <label for="api_key" class="form-label"> اخر ظهور </label>
                                        <input disabled readonly type="text" id="api_key" name="api_key"
                                            class="form-control" placeholder="" value="{{ $user->last_seen }}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                    <div class="mb-3">
                                        <label for="api_key" class="form-label"> اولوية الدعم الفني </label>
                                        <select disabled name="" id="" class="form-select" readonly>
                                            <option value="عادي">عادي</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="gap-1">
                            <form action="#" method="get" class="d-flex"
                                style="justify-content: flex-start;align-items: center">
                                <ul class="list-unstyled orders-tabs" style="justify-content: flex-start">
                                    <li>
                                        <a href="{{ url('admin/user/show/' . $user->id) }}"
                                            class="all {{ request()->routeIs('admin.user.show') ? 'active' : '' }}"> سجل
                                            الطلبات </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/user/show/transactions/' . $user->id) }}"
                                            class="complete {{ request()->routeIs('admin.user.show.transactions') ? 'active' : '' }}">
                                            سجل المدفوعات </a>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div>
                            <div class="table-responsive">
                                @if (request()->routeIs('admin.user.show.transactions'))
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
                                                            <span class="badge badge-warning bg-warning">
                                                                {{ $transaction->payment_status }} </span>
                                                        @else
                                                            <span class="badge badge-success bg-success">
                                                                {{ $transaction->payment_status == 'completed' ? 'مكتملة' : 'قيد الانتظار' }}
                                                            </span>
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
                                @else
                                    @if (isset($orders_with_status))
                                        <table id="table-search"
                                            class="table mb-0 align-middle table-bordered gridjs-table table-hover table-centered">
                                            <thead class="bg-light-subtle table-primary-custome">
                                                <tr>
                                                    <th> # </th>
                                                    <th> رقم الطلب عند المزود</th>
                                                    <th> رقم الخدمة عند المزود </th>
                                                    <th> رقم الطلب </th>
                                                    <th>السعر </th>
                                                    <th> التاريخ / الوقت </th>
                                                    <th> الخدمة </th>
                                                    <th> الرابط </th>
                                                    <th> الكمية </th>
                                                    <th>عدد البدء </th>
                                                    <th> العدد المتبقي </th>
                                                    <th>حالة الطلب </th>
                                                    <th> إجراءات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders_with_status as $order)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td> {{ $order['order_number'] }} </td>
                                                        <td> {{ $order['main_service_id'] }} </td>
                                                        <td> {{ $order['id'] }} </td>
                                                        <td> {{ number_format($order['total_price'], 5) }} $ </td>
                                                        <td> {{ $order['created_at']->format('Y-m-d H:i A') }} </td>
                                                        <td> {{ str()->limit($order['name'], 40, '...') }} </td>
                                                        <td> <a href="{{ $order['page_link'] }}" target="_blank">
                                                                {{ str()->limit($order['page_link'], 10, '...') }} </a>
                                                        </td>
                                                        <td> {{ $order['quantity'] }} </td>
                                                        <td>
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
                                                            <div class="gap-2 d-flex">
                                                                <a href="{{ url('admin/order/show/' . $order['id']) }}"
                                                                    class="btn-sm color-success">
                                                                    <i class="bi bi-eye"></i>
                                                                </a>
                                                                <button type="button" class="btn-sm color-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#delete_order_{{ $order['id'] }}">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @include('admin.orders.delete')
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                @endif

                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Container Fluid -->

    </div>

@endsection




@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
