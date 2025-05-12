@extends('admin.layouts.master')
@section('title', 'التقارير  ')
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <h4> التقارير العامة </h4>
                <form action="#" method="get" class="d-flex" style="justify-content: space-between;align-items: center">
                    <ul class="list-unstyled orders-tabs" style="widows: 90%">
                        <li>
                            <a href="" class="all active"> المبيعات </a>
                        </li>
                        <li>
                            <a href="#" class="complete"> المنتجات  </a>
                        </li>
                        <li>
                            <a href="#" class="pending">   الزيارات  </a>
                        </li>
                    </ul>

                </form>
            </div>
            <!-- Top Row -->
            <div class="mb-4 row">
                <!-- Best Products -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">أفضل المنتجات</h5>
                            <div class="product-list">
                                <!-- Product items will be populated dynamically -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Revenue by Visitor -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">الهدف مقابل الواقع</h5>
                            <canvas id="revenueChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Service Level -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">الحجم مقابل مستوى الخدمة</h5>
                            <canvas id="serviceLevelChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Middle Row -->
            <div class="mb-4 row">
                <!-- Customer Trends -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">رضا العملاء</h5>
                            <canvas id="customerTrendChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Visitor Trends -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">مشاهدة الزوار</h5>
                            <canvas id="visitorTrendChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Row -->
            <div class="mb-4 row">
                <!-- Marketing Campaigns -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">أداء الحملات التسويقية</h5>
                            <canvas id="campaignChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Revenue Sources -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">تحليل مصادر الزيارات</h5>
                            <canvas id="revenuePieChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Annual Report -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">تقرير الأداء العام</h5>
                            <canvas id="annualReportChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monthly Statistics -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">جميع الطلبات</h5>
                            <canvas id="monthlyStatsChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
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

            // Revenue Chart (Bar Chart)
            initChart('revenueChart', {
                type: 'bar',
                data: {
                    labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو'],
                    datasets: [{
                        label: 'الهدف',
                        data: [65, 59, 80, 81, 56, 55],
                        backgroundColor: '#4CAF50'
                    }, {
                        label: 'الواقع',
                        data: [45, 50, 60, 70, 45, 50],
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

            // Service Level Chart (Line Chart)
            initChart('serviceLevelChart', {
                type: 'line',
                data: {
                    labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو'],
                    datasets: [{
                        label: 'مستوى الخدمة',
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
