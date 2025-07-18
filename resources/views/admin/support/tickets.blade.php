@extends('admin.layouts.master')
@section('title')
    خدمة العملاء
@endsection
@section('support-active', 'active')
@section('support-collapse', 'show')
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

                @if ($tickets->isEmpty())
                    <div class="empty-data">
                        <div class="row">
                            <div class="empty-image">
                                <img src="{{ asset('assets/admin/images/empty.png') }}" alt="">
                            </div>
                            <div class="empty-info">
                                <h4> لا توجد تذاكر في الوقت الحالي </h4>
                                <p> هذه الصفحة لا تحتوي على أي تذاكر في الوقت الحالي، ولكننا نعمل على إثرائها بأفضل المحتوى
                                    قريبًا. </br> نحن نسعى لتقديم قائمة التذاكر مميزة ومفيدة تلبي اهتماماتك. ترقب جديدنا
                                    قريبًا
                                    ونتمنى لك تجربة ممتعة معنا! </p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-xl-12">
                        <div class="card">
                            <div>
                                <div class="table-responsive">
                                    <table id="table-search"
                                        class="table mb-0 align-middle table-bordered gridjs-table table-hover table-centered">
                                        <thead class="bg-light-subtle table-primary-custome">
                                            <tr>
                                                <th>#
                                                </th>
                                                <th> رقم التذكرة </th>
                                                <th> نوع التذكرة </th>
                                                {{-- <th> رقم الطلب </th> --}}
                                                <th> اسم العميل </th>
                                                <th> تاريخ ووقت التذكرة </th>
                                                <th> اخر تحديث </th>
                                                <th> حالة التذكرة </th>
                                                <th> حالة الرد </th>
                                                <th> التفاصيل </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tickets as $ticket)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td> {{ $ticket['id'] }} </td>
                                                    <td>
                                                        @if ($ticket->support_type == 'payments')
                                                            المدفوعات
                                                        @else
                                                            الطلبات
                                                        @endif
                                                    </td>
                                                    <td> {{ $ticket->user->name }} </td>
                                                    <td> {{ $ticket->created_at->format('Y-m-d h:i A') }} </td>
                                                    <td> {{ $ticket->updated_at->format('Y-m-d h:i A') }} </td>
                                                    <td>
                                                        @if ($ticket['status'] == 0)
                                                            <span class="badge bg-warning"> عادية </span>
                                                        @elseif($ticket['status'] == 1)
                                                            <span class="badge bg-info"> عاجلة </span>
                                                        @elseif ($ticket['status'] == 2)
                                                            <span class="badge bg-danger"> مغلقة </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($ticket['support_replay_status'] == 0)
                                                            <span class="badge bg-danger"> لم يتم الرد </span>
                                                        @elseif($ticket['support_replay_status'] == 1)
                                                            <span class="badge bg-success"> تم الرد </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="gap-2 d-flex">
                                                            <a href="{{ route('admin.support.ticket_detail', $ticket['id']) }}"
                                                                class="btn btn-success btn-sm">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
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
