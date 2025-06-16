@extends('admin.layouts.master')
@section('title', 'المحفظة ')
@section('wallet-active', 'active')
@section('wallet-collapse', 'show')
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">
        <div class="container-xxl">
            <div class="row"> 
                <form action="#" method="get" class="d-flex" style="justify-content: space-between;align-items: center">
                    <ul class="list-unstyled orders-tabs" style="widows: 90%">
                        <li>
                            <a href="{{ url('admin/wallet/index') }}" class="all active"> المحفظة </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/wallet/payments') }}" class="all"> سجل المدفوعات </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/wallet/payment-methods') }}" class="all"> طرق الدفع </a>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="wallet-report">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="wallet-main-info">
                            <h4> الرصيد الكلي <i class="bi bi-info-circle"></i> </h4>
                            <p> 12,1212123 <img src="{{ asset('assets/admin/images/SAR.svg') }}" alt=""> </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="wallet-main-info">
                            <h4> تكلفة المنتجات <i class="bi bi-info-circle"></i> </h4>
                            <p> 12,1212123 <img src="{{ asset('assets/admin/images/SAR.svg') }}" alt=""> </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="wallet-main-info">
                            <h4> صافي الارباح <i class="bi bi-info-circle"></i> </h4>
                            <p> 12,1212123 <img src="{{ asset('assets/admin/images/SAR.svg') }}" alt=""> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Row -->
            <div class="mb-4 row">
                <div class="col-md-4">
                    <div class="card" style="background-color: #F2F2F8">
                        <div class="card-body">
                            <canvas id="serviceLevelChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="background-color: #F2F2F8">
                        <div class="card-body">
                            <canvas id="serviceLevelChart2" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="background-color: #F2F2F8">
                        <div class="card-body">
                            <canvas id="serviceLevelChart3" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Middle Row -->
            <div class="mb-4 row">
                <!-- Customer Trends -->
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5> المصروفات </h5>
                                <!-- Button trigger modal -->
                                <button style="height: 30px; padding: 5px 5px; font-size: 15px;" type="button"
                                    class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                    <i class="bi bi-plus"></i>
                                </button>
                                @include('admin.wallet.expense')
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0">
                            <div class="table-responsive">
                                <table
                                    class="table mb-0 align-middle table-bordered gridjs-table table-hover table-centered">
                                    <thead class="bg-light-subtle table-primary-custome">
                                        <tr>
                                            <th> الاسم </th>
                                            <th> المبلغ </th>
                                            <th> التاريخ </th>
                                            <th> العمليات </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($expenses as $expense)
                                            <tr>
                                                <td> {{ $expense['title'] }} </td>
                                                <td> {{ $expense['amount'] }} <img style="width: 16px"
                                                        src="{{ asset('assets/admin/images/SAR.svg') }}" alt="">
                                                </td>
                                                <td> {{ $expense['created_at']->format('Y-m-d') }} </td>
                                                <td>
                                                    <div class="gap-2 d-flex">
                                                        <button type="button" class="color-primary" data-bs-toggle="modal"
                                                            data-bs-target="#edit_expense_{{ $expense->id }}">
                                                            <i class="ti ti-edit"></i>
                                                        </button>
                                                        <button type="button" class="color-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_expense_{{ $expense->id }}">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('admin.wallet._edit')
                                            @include('admin.wallet._delete')
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Visitor Trends -->
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">مشاهدة الزوار</h5>
                            <canvas id="visitorTrendChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="gap-1 card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title flex-grow-1"> الصلاحيات </h4>
                        <a href="{{ url('admin/role/add') }}" class="btn btn-sm btn-primary">
                            اضافة صلاحية
                            <i class="ti ti-plus"></i>
                        </a>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table id="table-search"
                                class="table mb-0 align-middle table-bordered gridjs-table table-hover table-centered">
                                <thead class="bg-light-subtle table-primary-custome">
                                    <tr>
                                        <th>#</th>
                                        <th> الاسم  </th>
                                        <th> الوصف  </th>
                                        <th> التاريخ   </th>
                                        <th> مبلغ الدفع   </th>
                                        <th> الحالة  </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th> 1 </th>
                                        <th> محمد </th>
                                        <th> محمد </th>
                                        <th> محمد </th>
                                        <th> محمد </th>
                                        <th>
                                            <span class="badge bg-success"> ناجحة   </span>
                                        </th>
                                    </tr>
                                    {{-- @foreach ($wallets as $wallet)
                                        <tr>
                                            <th>
                                                {{ $loop->iteration }}
                                            </th>
                                            <th> {{ $wallet->user->name }} </th>
                                            <td>
                                                @foreach (json_decode($role->permissions) as $permission)
                                                    @foreach (Config::get('permissions') as $key => $value)
                                                        @if ($key == $permission)
                                                            <span class="px-2 py-1 badge bg-light text-dark fs-11">
                                                                {{ $value }}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="gap-2 d-flex">
                                                    <a href="{{ url('admin/role/update/' . $role->id) }}"
                                                        class="color-primary">
                                                        <i class="ti ti-edit"></i>
                                                    </a>
                                                    <button type="button" class="color-danger" data-bs-toggle="modal"
                                                        data-bs-target="#delete_permision_{{ $role->id }}">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
        }

        canvas {
            max-width: 100%;
            max-height: 300px;
        }
    </style>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Helper function to initialize chart with error handling
            function initChart(id, config) {
                const canvas = document.getElementById(id);
                if (!canvas) {
                    console.error(`Canvas element with ID ${id} not found`);
                    return;
                }
                new Chart(canvas, config);
            }

            // Service Level Chart (Line Chart)
            initChart('serviceLevelChart', {
                type: 'line',
                data: {
                    labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو'],
                    datasets: [{
                        label: ' تحليل الميزانية  ',
                        data: [85, 75, 90, 85, 95, 88],
                        borderColor: '#2196F3',
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Service Level Chart (Line Chart)
            initChart('serviceLevelChart2', {
                type: 'line',
                data: {
                    labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو'],
                    datasets: [{
                        label: ' تكلفة المنتجات  ',
                        data: [85, 75, 90, 85, 95, 88],
                        borderColor: '#2196F3',
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            // Service Level Chart (Line Chart)
            initChart('serviceLevelChart3', {
                type: 'line',
                data: {
                    labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو'],
                    datasets: [{
                        label: ' صافي الارباح  ',
                        data: [85, 75, 90, 85, 95, 88],
                        borderColor: '#2196F3',
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Customer Trend Chart (Line Chart)
            initChart('customerTrendChart', {
                type: 'line',
                data: {
                    labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو'],
                    datasets: [{
                        label: 'رضا العملاء',
                        data: [90, 85, 88, 92, 87, 94],
                        borderColor: '#9C27B0',
                        fill: false
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Visitor Trend Chart (Multi-line Chart)
            initChart('visitorTrendChart', {
                type: 'line',
                data: {
                    labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو'],
                    datasets: [{
                        label: 'الزوار الجدد',
                        data: [500, 600, 550, 700, 650, 800],
                        borderColor: '#4CAF50'
                    }, {
                        label: 'الزوار العائدين',
                        data: [300, 350, 400, 450, 400, 500],
                        borderColor: '#FFC107'
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Campaign Performance (Bar Chart)
            initChart('campaignChart', {
                type: 'bar',
                data: {
                    labels: ['حملة 1', 'حملة 2', 'حملة 3', 'حملة 4', 'حملة 5'],
                    datasets: [{
                        label: 'النتائج',
                        data: [1200, 1900, 800, 1600, 1700],
                        backgroundColor: '#2196F3'
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Revenue Sources (Pie Chart)
            initChart('revenuePieChart', {
                type: 'pie',
                data: {
                    labels: ['المبيعات المباشرة', 'الإحالات', 'وسائل التواصل', 'البريد الإلكتروني'],
                    datasets: [{
                        data: [40, 20, 25, 15],
                        backgroundColor: ['#4CAF50', '#2196F3', '#FFC107', '#9C27B0']
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Annual Report (Line Chart)
            initChart('annualReportChart', {
                type: 'line',
                data: {
                    labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو'],
                    datasets: [{
                        label: 'الإيرادات',
                        data: [12000, 19000, 15000, 21000, 18000, 25000],
                        borderColor: '#4CAF50',
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Monthly Statistics (Bar Chart)
            initChart('monthlyStatsChart', {
                type: 'bar',
                data: {
                    labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14',
                        '15',
                        '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28',
                        '29', '30'
                    ],
                    datasets: [{
                        label: 'الطلبات المكتملة',
                        data: Array.from({
                            length: 30
                        }, () => Math.floor(Math.random() * 80) + 20),
                        backgroundColor: '#4CAF50'
                    }, {
                        label: 'الطلبات الجديدة',
                        data: Array.from({
                            length: 30
                        }, () => Math.floor(Math.random() * 60) + 10),
                        backgroundColor: '#2196F3'
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
