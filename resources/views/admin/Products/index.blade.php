@extends('admin.layouts.master')
@section('title')
    الخدمات
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
                @if ($products->isEmpty())
                <div class="empty-data">
                    <div class="row">
                        <div class="empty-image">
                            <img src="{{ asset('assets/admin/images/empty.png') }}" alt="">
                        </div>
                        <div class="empty-info">
                            <h4>  لا توجد خدمات جديدة في الوقت الحالي  </h4>
                            <p>
                                نعمل على تحديث الخدمات بشكل مستمر. تابعنا لتحصل على آخر التحديثات قريبًا! , "نحن نعد العدة لتقديم محتوى الخدمات مميز وشامل."
                                <br>
                                "ترقبوا آخر البيانات قريبًا!"
                            </p>
                            <a href="{{ url('admin/product/add') }}" class="btn btn-sm btn-primary">
                                اضافة خدمة جديدة
                                <i class="ti ti-plus"></i>
                            </a>
                            <a href="{{ url('admin/main-category/add') }}" class="btn btn-sm btn-primary">
                                 اضافة قسم جديد
                                <i class="ti ti-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @else
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="gap-1 card-header d-flex justify-content-between align-items-center">
                                <form action="#" method="get" class="d-flex" style="justify-content: space-between;align-items: center">
                                    <ul class="list-unstyled orders-tabs" style="widows: 90%">
                                        <li>
                                            <a href="{{ url('admin/products') }}" class="all active"> جميع الخدمات </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('admin/main-categories') }}" class="categories"> التصنيفات  </a>
                                        </li>
                                    </ul>
                                </form>

                            <a href="{{ url('admin/product/add') }}" class="btn btn-sm btn-primary">
                                اضف خدمة جديدة <i class="ti ti-plus"></i>
                            </a>
                        </div>


                        <div>
                            <div class="table-responsive">
                                <table id="table-search"
                                    class="table mb-0 align-middle table-bordered gridjs-table table-hover table-centered">
                                    <thead class="bg-light-subtle table-primary-custome">
                                        <tr>
                                            <th style="width: 20px;">
                                            </th>
                                            <th> الخدمة   </th>
                                            <th> المزود  </th>
                                            <th> رقم الخدمة </th>
                                            <th> القسم الرئيسي </th>
                                            <th> القسم الفرعي </th>
                                            <th> نسبة الربح </th>
                                            <th> إجراءات متقدمة </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td> <img class="img-fluid" style="margin-left: 10px"
                                                    src="{{ asset('assets/uploads/product_images/' . $product['image']) }}"
                                                    width="40" height="40px" alt="">
                                                    <a href="{{ url('admin/product/update/' . $product['slug']) }}">
                                                        {{ $product['name'] }}
                                                    </a>
                                                </td>
                                                <td> {{ $product['provider']['name'] }} </td>
                                                <td> {{ $product['service_id'] }} </td>
                                                <td> {{ $product['Main_Category']['name'] }} </td>
                                                <td> {{ $product['Sub_Category']['name'] }} </td>
                                                <td> {{ $product['profit_percentage'] }} % </td>
                                                <td>
                                                    <div class="gap-2 d-flex">
                                                        <a href="{{ url('admin/product/update/' . $product['id']) }}"
                                                            class="color-success">
                                                            <i class="ti ti-eye"></i>
                                                        </a>
                                                        <a href="{{ url('admin/product/update/' . $product['id']) }}"
                                                            class="color-primary">
                                                            <i class="ti ti-edit"></i>
                                                        </a>
                                                        <button type="button" class="color-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete_category_{{ $product['id'] }}">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            @include('admin.Products.delete')
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                    @endif
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
                "ordering":false,
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
