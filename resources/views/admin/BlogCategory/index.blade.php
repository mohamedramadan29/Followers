@extends('admin.layouts.master')
@section('title')
    اقسام المدونة
@endsection
@section('blog-active', 'active')
@section('blog-collapse', 'show')
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
                <div class="col-xl-12">
                    <div class="card">
                        <div class="gap-1 card-header d-flex justify-content-between align-items-center">

                            <form action="#" method="get" class="d-flex"
                                style="justify-content: space-between;align-items: center">
                                <ul class="list-unstyled orders-tabs" style="widows: 90%">
                                    <li>
                                        <a href="{{ url('admin/blogs') }}" class="all"> المقالات </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/blog/schedule') }}" class="categories"> المقالات
                                            المجدولة </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/blog/archived') }}" class="categories"> الارشيف </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/blog_category') }}" class="categories all active"> اقسام
                                            المدومة
                                        </a>
                                    </li>
                                </ul>
                            </form>

                            <a href="{{ url('admin/blog_category/add') }}" class="btn btn-sm btn-primary">
                                اضافة قسم جديد
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
                                            <th> اسم القسم </th>
                                            <th> الصورة </th>
                                            <th> تاريخ النشر </th>
                                            <th> الحالة  </th>
                                            <th> العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php

                                            $i = 1;
                                        @endphp
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td> {{ $category['name'] }} </td>
                                                <td> <img width="60px" height="60px"
                                                        src="{{ $category->Image() }}">
                                                </td>
                                                <td>{{ $category['created_at']->format('Y-m-d') }}</td>
                                                <td>
                                                    @if ($category['status'] == 1)
                                                        <span class="badge bg-success">نشط</span>
                                                    @else
                                                        <span class="badge bg-danger">غير نشط</span>
                                                    @endif
                                                </td>
                                                <td>


                                                    <div class="gap-2 d-flex">
                                                        <a href="{{ url('admin/blog_category/update/' . $category['id']) }}"
                                                            class="color-success">
                                                            <i class="ti ti-eye"></i>
                                                        </a>
                                                        <a href="{{ url('admin/blog_category/update/' . $category['id']) }}"
                                                            class="color-primary">
                                                            <i class="ti ti-edit"></i>
                                                        </a>
                                                        <button type="button" class="color-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete_category_{{ $category['id'] }}">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>

                                            </tr>
                                            <!-- Modal -->
                                            @include('admin.BlogCategory.delete')
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
                'ordering': false,
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
