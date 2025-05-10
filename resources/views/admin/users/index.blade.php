@extends('admin.layouts.master')
@section('title')
    المستخدمين
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

                @if ($users->isEmpty())
                    <div class="empty-data">
                        <div class="row">
                            <div class="empty-image">
                                <img src="{{ asset('assets/admin/images/empty.png') }}" alt="">
                            </div>
                            <div class="empty-info">
                                <h4> لا توجد مستخدمين في الوقت الحالي </h4>
                                <p> هذه الصفحة لا تحتوي على أي مستخدمين في الوقت الحالي، ولكننا نعمل على إثرائها بأفضل
                                    المحتوى قريبًا. نحن نسعى لتقديم قائمة مستخدمين مميزة ومفيدة تلبي اهتماماتك. </br> ترقب
                                    جديدنا قريبًا ونتمنى لك تجربة ممتعة معنا! </p>
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
                                                <th style="width: 20px;">
                                                </th>
                                                <th> الاسم </th>
                                                <th> البريد الالكتروني </th>
                                                <th> رقم الهاتف </th>
                                                <th> الرصيد الكلي</th>
                                                <th> اجمالي المدفوعات </th>
                                                <th> عدد الطلبات </th>
                                                <th> حالة الحساب </th>
                                                <th> العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td> {{ $user['name'] }} </td>
                                                    <td> {{ $user['email'] }} </td>
                                                    <td> {{ $user['phone'] }} </td>
                                                    <td> {{ $user['balance'] }} دولار </td>
                                                    <td> {{ $user['balance'] }} دولار </td>
                                                    <td> {{ $user['total_orders'] }} </td>
                                                    <td>
                                                        @if ($user['account_status'] == 'مفعل')
                                                            <span class="badge bg-success">مفعل</span>
                                                        @else
                                                            <span class="badge bg-danger">غير مفعل</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="gap-2 d-flex">
                                                            <a href="{{ url('admin/user/show/' . $user['id']) }}"
                                                                class="btn btn-success btn-sm">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <button type="button" class="btn btn-primary btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#add_balance_{{ $user['id'] }}">
                                                                <i class="fa fa-add"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete_balance_{{ $user['id'] }}">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Modal -->
                                                @include('admin.users.add_balance')
                                                @include('admin.users.delete_balance')
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
