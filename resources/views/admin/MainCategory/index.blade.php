@extends('admin.layouts.master')
@section('title')
    الاقسام الرئيسية
@endsection
@section('products-active','active')
@section('products-collapse','show')
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
                <div class="col-xl-12">
                    <div class="card">
                        <div class="gap-1 card-header d-flex justify-content-between align-items-center">
                            <form action="#" method="get" class="d-flex"
                                style="justify-content: space-between;align-items: center">
                                <ul class="list-unstyled orders-tabs" style="widows: 90%">
                                    <li>
                                        <a href="{{ url('admin/products') }}" class=""> جميع الخدمات </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/main-categories') }}" class="categories all active">
                                            التصنيفات </a>
                                    </li>
                                </ul>
                            </form>
                            <a href="{{ url('admin/main-category/add') }}" class="btn btn-sm btn-primary">
                                <i class="ti ti-plus"></i> اضافة قسم جديد
                            </a>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table id="table-search"
                                    class="table mb-0 align-middle table-bordered gridjs-table table-hover table-centered">
                                    <thead class="bg-light-subtle table-primary-custome">
                                        <tr>
                                            <th>
                                            </th>
                                            <th> اسم القسم</th>
                                            <th> الحالة</th>
                                            <th> رئيسية </th>
                                            <th> الصورة</th>
                                            <th> إجراءات متقدمة </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                    {{--                                                <div class="form-check"> --}}
                                                    {{--                                                    <input type="checkbox" class="form-check-input" id="customCheck2"> --}}
                                                    {{--                                                    <label class="form-check-label" for="customCheck2">&nbsp;</label> --}}
                                                    {{--                                                </div> --}}
                                                </td>
                                                <td> {{ $category['name'] }} </td>

                                                <td>
                                                    @if ($category['status'] == 1)
                                                        <span class="badge bg-success"> مفعل </span>
                                                    @else
                                                        <span class="badge bg-danger"> غير مفعل </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($category['main_page'] == 1)
                                                        <span class="badge bg-success"> نعم </span>
                                                    @else
                                                        <span class="badge bg-danger"> لا </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <img class="img-thumbnail"
                                                        src="{{ asset('assets/uploads/category_images/' . $category['image']) }}"
                                                        width="80" height="80px" alt="">
                                                </td>
                                                <td>
                                                    <div class="gap-2 d-flex">
                                                        <a href="{{ url('admin/sub-categories/' . $category['id']) }}"
                                                            class="btn btn-primary btn-sm">
                                                            الاقسام الفرعية
                                                        </a>
                                                        <a href="{{ url('admin/main-category/update/' . $category['id']) }}"
                                                            class="color-primary">
                                                            <i class="ti ti-edit"></i>
                                                        </a>

                                                        <button type="button" class="color-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_category_{{ $category['id'] }}">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            @include('admin.MainCategory.delete')
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->

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
