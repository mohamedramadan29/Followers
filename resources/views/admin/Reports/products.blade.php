@extends('admin.layouts.master')
@section('title', 'التقارير ')
@section('reports-active', 'active')
@section('reports-collapse', 'show')
@section('css')

    <style>
        .filter-form {
            margin: 20px 0;
        }

        .chart-container {
            height: 300px;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total_head {
            text-align: center;
            background: #242588;
            color: #fff;
            font-size: 22px;
            padding: 10px;
            margin-bottom: 0;
        }
    </style>
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <h4> التقارير العامة </h4>
                <form action="#" method="get" class="d-flex" style="justify-content: space-between;align-items: center">
                    <ul class="list-unstyled orders-tabs" style="widows: 90%">
                        <li>
                            <a href="{{ url('admin/reports/index') }}"
                                class="all"> الكل </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/reports/sales') }}" class="all"> المبيعات </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/reports/products') }}" class="complete active"> المنتجات </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/reports/visits') }}" class="pending"> الزيارات </a>
                        </li>
                    </ul>

                </form>
            </div>
            <!-- Top Row -->
            <div class="mb-4 row">
                <!-- Best Products -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h6>تاريخ التقرير - {{ now()->format('F d, Y') }}</h6>

                            <!-- نموذج التصفية -->
                            <form action="{{ route('admin.reports.products') }}" method="GET" class="filter-form d-flex align-items-center">
                                <div class="form-group" style="margin: 10px; width:25%">
                                    <label for="filter_type" class="form-label">نوع التصفية:</label>
                                    <select class="form-select" name="filter_type" id="filter_type" onchange="this.form.submit()">
                                        <option value="daily" {{ $filterType === 'daily' ? 'selected' : '' }}>يومي</option>
                                        <option value="monthly" {{ $filterType === 'monthly' ? 'selected' : '' }}>شهري</option>
                                        <option value="custom" {{ $filterType === 'custom' ? 'selected' : '' }}>نطاق مخصص</option>
                                    </select>
                                </div>

                                @if ($filterType === 'daily')
                                    <div class="form-group" style="margin: 10px; width:25%">
                                        <label for="date" class="form-label">التاريخ:</label>
                                        <input type="date" class="form-control" name="date" id="date" value="{{ $date }}" onchange="this.form.submit()">
                                    </div>
                                @elseif ($filterType === 'monthly')
                                    <div class="form-group" style="margin: 10px; width:25%">
                                        <label for="date" class="form-label">الشهر:</label>
                                        <input type="month" class="form-control" name="date" id="date" value="{{ Carbon\Carbon::parse($date)->format('Y-m') }}" onchange="this.form.submit()">
                                    </div>
                                @elseif ($filterType === 'custom')
                                    <div class="form-group" style="margin: 10px; width:25%">
                                        <label for="start_date" class="form-label">تاريخ البداية:</label>
                                        <input type="date" class="form-control" name="start_date" id="start_date" value="{{ old('start_date') ?? $request->input('start_date', '') }}" onchange="this.form.submit()">
                                    </div>
                                    <div class="form-group" style="margin: 10px; width:25%">
                                        <label for="end_date" class="form-label">تاريخ النهاية:</label>
                                        <input type="date" class="form-control" name="end_date" id="end_date" value="{{ old('end_date') ?? $request->input('end_date', '') }}" onchange="this.form.submit()">
                                    </div>
                                @endif
                            </form>

                            <div class="">
                                <div class="table-responsive">
                                    <table id="table-search" class="table mb-0 align-middle table-bordered gridjs-table table-hover table-centered">
                                        <thead class="bg-light-subtle table-primary-custome">
                                            <tr>
                                                <th>#</th>
                                                <th>اسم المنتج</th>
                                                <th>إجمالي المبيعات</th>
                                                <th>إجمالي الربح</th>
                                                <th>عدد الطلبات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productData as $product)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td style="text-align:right">
                                                        <img width="50" src="{{ asset('assets/uploads/Product_images/' . $product['image']) }}" alt="">
                                                        {{ $product['name'] }}
                                                    </td>
                                                    <td>{{ number_format($product['total_sales'], 5) }} دولار</td>
                                                    <td>{{ number_format($product['total_profit'], 5) }} دولار</td>
                                                    <td>{{ $product['order_count'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
