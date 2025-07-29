@extends('admin.layouts.master')
@section('title', 'التقيمات')
@section('reviews-active', 'active')
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
                @if ($reviews->isEmpty())
                    <div class="empty-data">
                        <div class="row">
                            <div class="empty-image">
                                <img src="{{ asset('assets/admin/images/empty.png') }}" alt="">
                            </div>
                            <div class="empty-info">
                                <h4> لا توجد تقيمات في الوقت الحالي </h4>
                                <p> هذه الصفحة لا تحتوي على أي تقيمات في الوقت الحالي، ولكننا نعمل على إثرائها بأفضل المحتوى
                                    قريبًا. </br> نحن نسعى لتقديم قائمة التقيمات مميزة ومفيدة تلبي اهتماماتك. ترقب جديدنا
                                    قريبًا
                                    ونتمنى لك تجربة ممتعة معنا! </p>
                                <a href="{{ url('admin/review/store') }}" class="btn btn-sm btn-primary">
                                    اضافة تقيم جديد
                                    <i class="ti ti-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="gap-1 card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title flex-grow-1"> التقيمات </h4>
                                <a href="{{ url('admin/review/store') }}" class="btn btn-sm btn-primary">
                                    اضافة تقيم جديد
                                    <i class="ti ti-plus"></i>
                                </a>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table id="table-search"
                                        class="table mb-0 align-middle table-bordered gridjs-table table-hover table-centered">
                                        <thead class="bg-light-subtle table-primary-custome">
                                            <tr>
                                                <th># </th>
                                                <th> الاسم </th>
                                                <th> الخدمة </th>
                                                <th> رقم الطلب </th>
                                                <th> التقيم </th>
                                                <th> محتوي التقيم </th>
                                                <th> تاريخ الانشاء  </th>
                                                <th> الحالة </th>
                                                <th> إجراءات متقدمة </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reviews as $review)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td> {{ $review['name'] }} </td>
                                                    <td>
                                                        <img width="40px" src="{{ asset('assets/uploads/product_images/'.$review['service']['image']) }}" alt="">
                                                         {{ Str::limit($review['service']['name'], 20,'...') }} </td>
                                                    <td> <a href="{{ url('admin/order/show/'.$review['order_id']) }}"> {{ $review['order_id'] }} </a> </td>
                                                    <td>
                                                        <span class="stars ms-1">
                                                            @for ($i = 0; $i < 5; $i++)
                                                                @if ($i < $review['rate'])
                                                                    <i class="fa fa-star text-warning"></i>
                                                                @else
                                                                    <i class="fa fa-star text-gray" style="color: #bcbbbb"></i>
                                                                @endif
                                                            @endfor
                                                        </span>  </td>
                                                    <td> {!! Str::limit($review['description'], 20,'...') !!} </td>
                                                    <td> {{ $review['created_at']->format('Y-m-d') }} </td>
                                                    <td>
                                                        @if ($review['status'] == 1)
                                                            <span class="badge badge-success bg-success"> فعال </span>
                                                        @else
                                                            <span class="badge badge-danger bg-danger"> غير فعال </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="gap-2 d-flex">
                                                            @if ($review['status'] == 1)
                                                                <a href="{{ url('admin/review/status/' . $review['id']) }}"
                                                                    class="color-success">
                                                                    <i class="bi bi-check2-circle"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ url('admin/review/status/' . $review['id']) }}"
                                                                    class="color-danger">
                                                                    <i class="bi bi-x-circle"></i>
                                                                </a>
                                                            @endif
                                                            <a href="{{ url('admin/review/update/' . $review['id']) }}"
                                                                class="color-primary">
                                                                <i class="ti ti-edit"></i>
                                                            </a>
                                                            <button type="button" class="color-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete_category_{{ $review['id'] }}">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Modal -->

                                                @include('admin.Reviews.delete')
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
