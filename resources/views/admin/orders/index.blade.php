@extends('admin.layouts.master')
@section('title')
     الطلبات
@endsection
@section('css')

    {{--    <!-- DataTables CSS -->--}}
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
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center gap-1">
                            <h4 class="card-title flex-grow-1">  الطلبات  </h4>
                        </div>


                        <div>
                            <div class="table-responsive">
                                <table id="table-search" class="table table-bordered gridjs-table align-middle mb-0 table-hover table-centered">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th> رقم الطلب </th>
                                            <th>تاريخ الطلب </th>
                                            <th> الكمية </th>
                                            <th>اسم الخدمة </th>
                                            <th>السعر </th>
                                            <th> عدد البدا </th>
                                            <th> العدد المتبقي </th>
                                            <th>حالة الطلب </th>
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

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
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
    {{--    <!-- DataTables JS -->--}}
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
