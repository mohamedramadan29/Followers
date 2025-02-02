@extends('admin.layouts.master')
@section('title')
    الصلاحيات
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
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center gap-1">
                            <h4 class="card-title flex-grow-1"> الصلاحيات </h4>
                            <a href="{{ url('admin/role/add') }}" class="btn btn-sm btn-primary">
                                اضافة صلاحية
                                <i class="ti ti-plus"></i>
                            </a>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table id="table-search"
                                    class="table table-bordered gridjs-table align-middle mb-0 table-hover table-centered">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th>#</th>
                                            <th> اسم الصلاحية </th>
                                            <th> الصلاحيات </th>
                                            <th> العمليات </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <th>
                                                    {{ $loop->iteration }}
                                                </th>
                                                <th> {{ $role->role }} </th>
                                                <td>
                                                    @foreach (json_decode($role->permissions) as $permission)
                                                        @foreach (Config::get('permissions') as $key => $value)
                                                            @if ($key == $permission)
                                                                <span class="badge badge-info bg-info"> {{ $value }}
                                                                </span>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ url('admin/role/update/' . $role->id) }}"><i
                                                            class="fa fa-edit"></i> تعديل </a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete_permision_{{ $role->id }}">
                                                        حذف <i class="fa fa-trash"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            @include('admin.roles.delete')
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
