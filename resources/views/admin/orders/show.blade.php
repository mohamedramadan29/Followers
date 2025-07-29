@extends('admin.layouts.master')
@section('title')
    تفاصيل الطلب {{ $order->id }}
@endsection
@section('orders-active', 'active')
@section('orders-collapse', 'show')
@section('css')
@endsection
@section('content')
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="#" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-xl-12 col-lg-8">
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title"> تفاصيل الطلب {{ $order->id }} </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> رقم الطلب عند المزورد </label>
                                            <input disabled type="text" id="name" name="name"
                                                class="form-control" placeholder="" value="{{ $order->order_number }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="api_url" class="form-label"> رقم الخدمة عند المزورد </label>
                                            <input disabled type="text" id="api_url" name="api_url"
                                                class="form-control" placeholder="" value="{{ $order->main_service_id }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> رقم الطلب </label>
                                            <input disabled type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $order->id }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> السعر الكلي </label>
                                            <input disabled type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $order->total_price }} $">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> السعر الكلي عند المزود </label>
                                            <input disabled type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $order->provider_main_price }} $">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> نسبة الربح  </label>
                                            <input disabled type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $order->profit_percentage }} %">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> تاريخ الطلب </label>
                                            <input disabled type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder=""
                                                value="{{ $order->created_at->format('Y-m-d H:i A') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> اسم الخدمة </label>
                                            <input disabled type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $order['name'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> الرابط </label>
                                            <input disabled type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $order['page_link'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> الكمية </label>
                                            <input disabled type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $order['quantity'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> عدد البدء </label>
                                            <input disabled type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder=""
                                                value="{{ $order->provider_details->start_count }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> العدد المتبقي </label>
                                            <input disabled type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder=""
                                                value="{{ $order->provider_details->remains }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> حالة الطلب </label>
                                            <input disabled type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder=""
                                                value="{{ $order->provider_details->status }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Container Fluid -->
    </div>
@endsection
