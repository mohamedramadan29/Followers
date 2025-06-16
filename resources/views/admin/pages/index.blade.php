@extends('admin.layouts.master')
@section('title', 'الصفحات التعريفية ')
@section('page-active', 'active')
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
                @if ($pages->isEmpty())
                    <div class="empty-data">
                        <div class="row">
                            <div class="empty-image">
                                <img src="{{ asset('assets/admin/images/empty.png') }}" alt="">
                            </div>
                            <div class="empty-info">
                                <h4> لا توجد صفحات تعريفية في الوقت الحالي </h4>
                                <p>
                                    نعمل على تحديث المقالات بشكل مستمر. تابعنا لتحصل على آخر التحديثات قريبًا! , "نحن نعد
                                    العدة لتقديم محتوى المقالات مميز وشامل."
                                    <br>
                                    "ترقبوا آخر البيانات قريبًا!"
                                </p>
                                <a href="{{ url('admin/page/store') }}" class="btn btn-sm btn-primary">
                                    اضافة صفحة جديدة
                                    <i class="ti ti-plus"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="gap-1 card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">  الصفحات التعريفية  </h4>

                                <a href="{{ url('admin/page/store') }}" class="btn btn-sm btn-primary">
                                    اضافة صفحة جديدة
                                    <i class="ti ti-plus"></i>
                                </a>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table id="table-search"
                                        class="table mb-0 align-middle table-bordered gridjs-table table-hover table-centered">
                                        <thead class="bg-light-subtle table-primary-custome">
                                            <tr>
                                                <th> # </th>
                                                <th> اسم الصغحة </th>
                                                <th> تاريخ اخر تعديل </th>
                                                <th> حالة العرض </th>
                                                <th> اجراءت متقدمة </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pages as $page)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td> {{ $page['title'] }} </td>
                                                    <td> {{ $page['updated_at']->format('Y-m-d') }} </td>
                                                    <td>
                                                        @if ($page['status'] == 1)
                                                            <span class="badge bg-success">نشط</span>
                                                        @else
                                                            <span class="badge bg-danger"> غير نشطة </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="gap-2 d-flex">
                                                            <a href="{{ url('admin/page/update/' . $page['id']) }}"
                                                                class="color-primary">
                                                                <i class="ti ti-edit"></i>
                                                            </a>
                                                            <button type="button" class="color-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete_page_{{ $page['id'] }}">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Modal -->
                                                @include('admin.pages._delete')
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
