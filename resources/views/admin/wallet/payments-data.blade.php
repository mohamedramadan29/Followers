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
                            <p style="color: green;"> 12,1212123 <img src="{{ asset('assets/admin/images/SAR.svg') }}"
                                    alt=""> </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="wallet-main-info wallet-payments-warning">
                            <h4> ايداع معلق <i class="bi bi-clock-history"></i> </h4>
                            <p style="color: orange;"> 12,1212123 <img src="{{ asset('assets/admin/images/SAR.svg') }}"
                                    alt=""> </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="wallet-main-info wallet-payments-danger">
                            <h4> ايداع لم يتم <i class="bi bi-ban"></i> </h4>
                            <p style="color: red;"> 12,1212123 <img src="{{ asset('assets/admin/images/SAR.svg') }}"
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
                                        <th>#</th>
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
                                    <tr>
                                        <th> 1 </th>
                                        <th> محمد </th>
                                        <th> محمد </th>
                                        <th> محمد </th>
                                        <th> محمد </th>
                                        <th> محمد </th>
                                        <th> محمد </th>
                                        <th> <span class="badge bg-success"> ناجحة </span> </th>
                                        <td>
                                            <div class="gap-2 d-flex">
                                                <button type="button" class="color-success" data-bs-toggle="modal"
                                                    data-bs-target="#show_invoice_details">
                                                    <i class="ti ti-eye"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('admin.wallet._show_invoice_details')
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
