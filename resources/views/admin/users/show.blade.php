@extends('admin.layouts.master')
@section('title')
     تفاصيل المستخدم
@endsection
@section('css')
@endsection
@section('content')
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">
            @if (Session::has('Success_message'))
                @php
                    toastify()->success(\Illuminate\Support\Facades\Session::get('Success_message'));
                @endphp
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    @php
                        toastify()->error($error);
                    @endphp
                @endforeach
            @endif
            <form method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-xl-12 col-lg-8 ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> تفاصيل المستخدم </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> الاسم </label>
                                            <input disabled readonly type="text" id="name" name="name"
                                                class="form-control" placeholder="" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="api_url" class="form-label"> البريد الالكتروني </label>
                                            <input disabled readonly type="text" id="api_url" name="api_url"
                                                class="form-control" placeholder="" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label">  رقم الهاتف </label>
                                            <input disabled readonly type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{  $user->phone }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> الرصيد الكلي  </label>
                                            <input disabled readonly type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{  $user->balance }} دولار">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> حالة الحساب  </label>
                                            <input disabled readonly type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{  $user->account_status }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> عدد الطلبات  </label>
                                            <input disabled readonly type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{  $user->total_orders }}">
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
