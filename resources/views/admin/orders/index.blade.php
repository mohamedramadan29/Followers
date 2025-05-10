@extends('admin.layouts.master')
@section('title')
    سجل الطلبات
@endsection
@section('css')
    {{--    <!-- DataTables CSS --> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <div class="row">
                @if (Session::has('Success_message'))
                    @php
                        toastify()->success(\Illuminate\Support\Facades\Session::get('Success_message'));
                    @endphp
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        @php
                            toastify()->error($error);
                        @endphp
                    @endforeach
                @endif
                @if ($orders_with_status->isEmpty())
                    <div class="empty-data">
                        <div class="row">
                            <div class="empty-image">
                                <img src="{{ asset('assets/admin/images/empty.png') }}" alt="">
                            </div>
                            <div class="empty-info">
                                <h4> لا توجد طلبات جديدة في الوقت الحالي </h4>
                                <p> هذه الصفحة لا تحتوي على أي طلبات في الوقت الحالي، ولكننا نعمل على إثرائها بأفضل المحتوى
                                    قريبًا. نحن نسعى لتقديم طلبات مميزة ومفيدة تلبي اهتماماتك. </br> ترقب جديدنا قريبًا
                                    ونتمنى لك تجربة ممتعة معنا! </p>
                            </div>
                        </div>
                    </div>
                    {{-- @else --}}
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="gap-1">
                                <form action="#" method="get" class="d-flex" style="justify-content: space-between;align-items: center">
                                    <ul class="list-unstyled orders-tabs" style="widows: 90%">
                                        <li>
                                            <a href="" class="all active"> جميع الطلبات </a>
                                        </li>
                                        <li>
                                            <a href="#" class="complete"> المكتملة </a>
                                        </li>
                                        <li>
                                            <a href="#" class="pending"> قيد الانتظار </a>
                                        </li>
                                        <li> <a href="#" class="inprogress"> قيد التنفيذ </a> </li>
                                        <li> <a href="#" class="partial"> مكتملة جزئيا </a> </li>
                                        <li> <a href="#" class="processing"> قيد المعالجة </a> </li>
                                        <li> <a href="#" class="cancelled"> الملغية </a> </li>
                                    </ul>
                                    <select name="period" class="form-select" id="" style="width: 10%">
                                        <option value="1"> اليوم </option>
                                        <option value="2"> الاسبوع </option>
                                        <option value="3"> الشهر </option>
                                        <option value="4"> السنة </option>
                                    </select>
                                </form>


                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table id="table-search"
                                        class="table mb-0 align-middle table-bordered gridjs-table table-hover table-centered">
                                        <thead class="bg-light-subtle table-primary-custome">
                                            <tr>
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
                                                    <td data-label="Order ID"># {{ $order['order_number'] }} </td>
                                                    <td data-label="Order ID"># {{ $order['order_number'] }} </td>
                                                    <td data-label="Order ID"># {{ $order['order_number'] }} </td>
                                                    <td data-label="Price"> {{ $order['total_price'] }} $ </td>
                                                    <td data-label="Date"> {{ $order['created_at'] }} </td>
                                                    <td data-label="Type"> {{ $order['name'] }} </td>
                                                    <td data-label="Date"> {{ $order['quantity'] }} </td>
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
                                                        $current_status = $order->provider_details->status ?? 'Unknown';
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
                                                            <a href="{{ url('admin/provider/update/' . $order['id']) }}"
                                                                class="btn-sm color-success">
                                                                <iconify-icon icon="solar:pen-2-broken"
                                                                    class="align-middle fs-18"></iconify-icon>
                                                            </a>
                                                            <button type="button" class="btn-sm color-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete_category_{{ $order['id'] }}">
                                                                <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                                    class="align-middle fs-18"></iconify-icon>
                                                            </button>
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>
                        </div>
                    </div>
                @endif

            </div>

        </div>
        <!-- End Container Fluid -->

    </div>
    <!-- ==================================================== -->
    <!-- End Page Content -->
    <!-- ==================================================== -->

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
