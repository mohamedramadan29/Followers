@extends('admin.layouts.master')
@section('title', 'التقارير ')
@section('reports-active', 'active')
@section('reports-collapse', 'show')
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
                            <a href="{{ url('admin/reports/sales') }}"> المبيعات </a>
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
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> تقرير الطلبات الشهرية </h5>
                            <div class="product-list" style="height: 300px;">
                                <canvas id="monthlyOrdersChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> تقرير الطلبات حسب الحالة </h5>
                            <div class="product-list" style="height: 300px; margin-top: 20px;">
                                <canvas id="statusDistributionChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> تقرير أفضل المنتجات </h5>
                            <div class="product-list" style="height: 300px; margin-top: 20px;">
                                <canvas id="bestSellingProductsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Revenue by Visitor -->
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">الهدف مقابل الواقع</h5>
                            <canvas id="revenueChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Service Level -->
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">الحجم مقابل مستوى الخدمة</h5>
                            <canvas id="serviceLevelChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                 <!-- Customer Trends -->
                 <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">رضا العملاء</h5>
                            <canvas id="customerTrendChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Visitor Trends -->
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">مشاهدة الزوار</h5>
                            <canvas id="visitorTrendChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Marketing Campaigns -->
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">أداء الحملات التسويقية</h5>
                            <canvas id="campaignChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Revenue Sources -->
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">تحليل مصادر الزيارات</h5>
                            <canvas id="revenuePieChart" style="height: 300px; width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Annual Report -->
                <div class="col-md-6 col-12">
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

            /************** Report For Order Monthly  ********/
            const dataFromServer = @json($monthlyOrders);
            const ctx = document.getElementById('monthlyOrdersChart').getContext('2d');

            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: dataFromServer.labels,
                    datasets: [{
                        label: 'عدد الطلبات',
                        data: dataFromServer.data,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(75, 192, 192, 0.6)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
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
                            suggestedMax: 10
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'الشهر'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'عدد الطلبات الشهرية (2025)'
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });

            /********** Report For Order Status  ********/

            const statusData = @json($statusDistribution);
            const statusCtx = document.getElementById('statusDistributionChart').getContext('2d');
            new Chart(statusCtx, {
                type: 'pie',
                data: {
                    labels: statusData.labels,
                    datasets: [{
                        data: statusData.data,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(201, 203, 207, 0.6)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(201, 203, 207, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'right'
                        },
                        title: {
                            display: true,
                            text: 'توزيع الطلبات حسب الحالة'
                        }
                    }
                }
            });

            /****************** Report For Best Products ***************/


            // الرسم البياني الثالث: أفضل المنتجات مبيعًا
            const productData = @json($bestSellingProducts);
            console.log('Best Selling Products Data:', productData);

            const canvas = document.getElementById('bestSellingProductsChart');
            if (!canvas) {
                console.error('Canvas element not found!');
                return;
            }

            const productCtx = canvas.getContext('2d');

            new Chart(productCtx, {
                type: 'bar',
                data: {
                    labels: productData.labels,
                    datasets: [{
                        label: 'عدد المبيعات',
                        data: productData.data,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
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
                                text: 'عدد المبيعات'
                            },
                            ticks: {
                                stepSize: 1,
                                precision: 0
                            },
                            suggestedMin: 0,
                            suggestedMax: Math.max(...productData.data) + 1 || 5
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'المنتجات'
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
                            text: 'أفضل المنتجات مبيعًا'
                        }
                    }
                }
            });


            console.log('Charts created');
        });
    </script>










    <!---------------------------------------------------------------------->
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
