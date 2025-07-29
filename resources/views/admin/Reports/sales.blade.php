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
                            <a href="{{ url('admin/reports/sales') }}" class="all active"> المبيعات </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/reports/products') }}" class="complete"> المنتجات </a>
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
                            <h6> تاريخ التقرير - {{ now()->format('F d, Y') }}</h6>
                            <!-- نموذج التصفية -->
                            <!-- نموذج التصفية -->
                            <form action="{{ route('admin.reports.sales') }}" method="GET"
                                class="filter-form d-flex align-items-center">
                                <div class="form-group" style="margin: 10px; width:25%">
                                    <label for="filter_type" class="form-label">نوع التصفية:</label>
                                    <select class="form-select" name="filter_type" id="filter_type"
                                        onchange="this.form.submit()">
                                        <option value="daily" {{ $filterType === 'daily' ? 'selected' : '' }}>يومي</option>
                                        <option value="monthly" {{ $filterType === 'monthly' ? 'selected' : '' }}>شهري
                                        </option>
                                        <option value="custom" {{ $filterType === 'custom' ? 'selected' : '' }}>نطاق مخصص
                                        </option>
                                    </select>
                                </div>

                                @if ($filterType === 'daily')
                                    <div class="form-group" style="margin: 10px; width:25%">
                                        <label for="date" class="form-label">التاريخ:</label>
                                        <input type="date" class="form-control" name="date" id="date"
                                            value="{{ $date }}" onchange="this.form.submit()">
                                    </div>
                                @elseif ($filterType === 'monthly')
                                    <div class="form-group" style="margin: 10px; width:25%">
                                        <label for="date" class="form-label">الشهر:</label>
                                        <input type="month" class="form-control" name="date" id="date"
                                            value="{{ Carbon\Carbon::parse($date)->format('Y-m') }}"
                                            onchange="this.form.submit()">
                                    </div>
                                @elseif ($filterType === 'custom')
                                    <div class="form-group" style="margin: 10px; width:25%">
                                        <label for="start_date" class="form-label">تاريخ البداية:</label>
                                        <input type="date" class="form-control" name="start_date" id="start_date"
                                            value="{{ old('start_date') ?? $request->input('start_date', '') }}"
                                            onchange="this.form.submit()">
                                    </div>
                                    <div class="form-group" style="margin: 10px; width:25%">
                                        <label for="end_date" class="form-label">تاريخ النهاية:</label>
                                        <input type="date" class="form-control" name="end_date" id="end_date"
                                            value="{{ old('end_date') ?? $request->input('end_date', '') }}"
                                            onchange="this.form.submit()">
                                    </div>
                                @endif
                            </form>
                            <div class="">
                                <h2 class="total_head">
                                    اجمالي المبيعات
                                </h2>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th style="text-align: center"> إجمالي المبيعات </th>
                                            <td style="text-align: center"> {{ $totalprice }} دولار </td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center"> تكاليف المنتجات </th>
                                            <td style="text-align: center;color: red"> - {{ $totalspent }} دولار </td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center"> صافي الارباح </th>
                                            <td style="text-align: center"> {{ $totalprofit }} دولار </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="chart-container">
                                <canvas id="ordersChart"></canvas>
                            </div>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const chartData = @json($chartData) || {
                                        labels: [],
                                        data: []
                                    };
                                    console.log('Chart Data:', chartData);

                                    const ctx = document.getElementById('ordersChart');
                                    if (ctx) {
                                        new Chart(ctx.getContext('2d'), {
                                            type: 'bar',
                                            data: {
                                                labels: chartData.labels,
                                                datasets: [{
                                                    label: ' عدد الطلبات  ',
                                                    data: chartData.data,
                                                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                                    borderColor: 'rgba(54, 162, 235, 1)',
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                responsive: true,
                                                maintainAspectRatio: false,
                                                scales: {
                                                    y: {
                                                        beginAtZero: true,
                                                        title: {
                                                            display: true,
                                                            text: 'عدد الطلبات'
                                                        },
                                                        ticks: {
                                                            stepSize: 1,
                                                            precision: 0
                                                        },
                                                        suggestedMin: 0,
                                                        suggestedMax: Math.max(...chartData.data) + 1 || 5
                                                    },
                                                    x: {
                                                        title: {
                                                            display: true,
                                                            text: 'التاريخ'
                                                        }
                                                    }
                                                },
                                                plugins: {
                                                    legend: {
                                                        display: true,
                                                        position: 'top'
                                                    },
                                                    title: {
                                                        display: true,
                                                        text: 'عدد الطلبات'
                                                    }
                                                }
                                            }
                                        });
                                    } else {
                                        console.error('Canvas element #ordersChart not found');
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
