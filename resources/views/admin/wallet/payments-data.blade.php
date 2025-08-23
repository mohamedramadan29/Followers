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
                            <a href="{{ url('admin/wallet/index') }}" class="all"> المحفظة </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/wallet/payments') }}" class="all active"> سجل المدفوعات </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/wallet/payment-methods') }}" class="all"> طرق الدفع </a>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="wallet-report payments-main-report">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="wallet-main-info wallet-payments-success">
                            <h4> ايداع ناجح <i class="bi bi-check-circle"></i> </h4>
                            <p style="color: green;"> {{ number_format($totalSuccessAmount,2) }} <img src="{{ asset('assets/admin/images/SAR.svg') }}"
                                    alt=""> </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="wallet-main-info wallet-payments-warning">
                            <h4> ايداع معلق <i class="bi bi-clock-history"></i> </h4>
                            <p style="color: orange;"> {{ number_format($totalPendingAmount,2) }} <img src="{{ asset('assets/admin/images/SAR.svg') }}"
                                    alt=""> </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="wallet-main-info wallet-payments-danger">
                            <h4> ايداع لم يتم <i class="bi bi-ban"></i> </h4>
                            <p style="color: red;"> {{ number_format($totalFailedAmount,2) }} <img src="{{ asset('assets/admin/images/SAR.svg') }}"
                                    alt=""> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div>
                        <div class="table-responsive">
                            <table id="table-search"
                                class="table mb-0 align-middle table-bordered gridjs-table table-hover table-centered">
                                <thead class="bg-light-subtle table-primary-custome">
                                    <tr>
                                        <th> رقم الحوالة </th>
                                        <th> بوابة الدفع </th>
                                        <th> المستخدم </th>
                                        <th> مبلغ الدفع </th>
                                        <th> نسبة الرسوم </th>
                                        <th> تاريخ / وقت البدء </th>
                                        <th> حالة الحوالة </th>
                                        <th> التفاصيل </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td> {{ $transaction->id }} </td>
                                            <td> {{ $transaction->payment_method }} </td>
                                            <td> <a href="{{ url('admin/user/show/' . $transaction->user->id) }}">
                                                    {{ $transaction->user->name }} </a> </td>
                                            <td> {{ $transaction->amount }} دولار </td>
                                            <td> 2 % </td>
                                            <td> {{ $transaction->created_at->format('Y-m-d H:i A') }} </td>
                                            <td>
                                                @if ($transaction->payment_status == 'pending')
                                                    <span class="badge badge-warning bg-warning">
                                                        {{ $transaction->payment_status }} </span>
                                                @else
                                                    <span class="badge badge-success bg-success">
                                                        {{ $transaction->payment_status == 'completed' ? 'مكتملة' : 'قيد الانتظار' }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="gap-2 d-flex">
                                                    <button style="background: transparent;border:none" type="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#show_invoice_details_{{ $transaction->id }}">
                                                        <i style="color: #3CD856" class="fa fa-eye"></i>
                                                    </button>
                                                    <!-- Active Payment Status  -->
                                                    @if ($transaction->payment_status == 'pending')
                                                        <form
                                                            action="{{ url('admin/wallet/payment/active', $transaction->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button
                                                                onclick="return confirm('هل أنت متأكد من تفعيل الحوالة وإضافة الرصيد إلى العميل؟')"
                                                                type="submit" style="background: transparent;border:none">
                                                                <i style="color: #3CD856" class="fa fa-check"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                    <!-- Deactive Payment Status  -->
                                                </div>
                                            </td>
                                        </tr>
                                        @include('admin.wallet._show_invoice_details')
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
