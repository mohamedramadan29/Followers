@extends('admin.layouts.master')
@section('title', 'طرق الدفع ')
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
                            <a href="{{ url('admin/wallet/index') }}" class="all"> المحفظة </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/wallet/payments') }}" class="all"> سجل المدفوعات </a>
                        </li>
                        <li>
                            <a href="#" class="all active"> طرق الدفع </a>
                        </li>
                    </ul>
                </form>

                <form action="#" method="get" class="d-flex" style="justify-content: space-between;align-items: center">
                    <ul class="list-unstyled orders-tabs" style="widows: 90%">
                        <li>
                            <a href="{{ url('admin/wallet/payment-methods') }}" class="all active"> بوابات تلقائية  </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/wallet/payments/card') }}" class="all"> انشاء بطاقة شحن  </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/wallet/payments/hand') }}" class="all"> بوابات يدوية  </a>
                        </li>
                    </ul>
                </form>

            </div>
            <div class="empty-data">
                <div class="row">
                    <div class="empty-image">
                        <img src="{{ asset('assets/admin/images/empty.png') }}" alt="">
                    </div>
                    <div class="empty-info">
                        <h4> لا توجد بوابات تلقائية في الوقت الحالي </h4>
                        <p> هذه الصفحة لا تحتوي على أي بوابات تلقائية في الوقت الحالي، ولكننا نعمل على إثرائها بأفضل المحتوى
                            قريبًا. نحن نسعى لتقديم طلبات مميزة ومفيدة تلبي اهتماماتك. </br> ترقب جديدنا قريبًا
                            ونتمنى لك تجربة ممتعة معنا! </p>
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
