@extends('admin.layouts.master')
@section('title', 'تعديل بوابة يدوي')
@section('wallet-active', 'active')
@section('wallet-collapse', 'show')
@section('css')
@endsection
@section('content')
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{ url('admin/wallet/payment/hand/update', $payment->id) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-xl-12 col-lg-8">
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title"> تعديل بوابة يدوي </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> اسم البوابة </label>
                                            <input type="text" id="projectinput1" class="form-control"
                                                placeholder=" البنك الاهلي   " name="name" value="{{ $payment->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="account_name" class="form-label"> صاحب الحساب </label>
                                            <input type="text" id="account_name" class="form-control"
                                                placeholder="  صاحب الحساب   " name="account_name"
                                                value="{{ $payment->account_name }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="account_number" class="form-label"> رقم الحساب </label>
                                            <input type="text" id="account_number" class="form-control"
                                                placeholder="  رقم الحساب   " name="account_number"
                                                value="{{ $payment->account_number }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="iban" class="form-label"> الايبان </label>
                                            <input type="text" id="iban" class="form-control"
                                                placeholder="  الايبان" name="iban" value="{{ $payment->iban }}">
                                        </div>
                                    </div>

                                    <div class="mt-2 col-lg-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label"> وصف البوابة <span class="star"
                                                    style="color: red"> * </span></label>
                                            <textarea class="form-control bg-light-subtle tinymce" id="description" rows="7" placeholder=""
                                                name="description">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mt-2 col-lg-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label"> وصف البوابة <span class="star"
                                                    style="color: red"> * </span></label>
                                            <textarea class="form-control bg-light-subtle tinymce" id="description" rows="7" placeholder=""
                                                name="description">{{ $payment->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 mb-3 rounded bg-light">
                                <div class="row justify-content-start g-2">
                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-primary w-100"> حفظ <i
                                                class='bx bxs-save'></i></button>
                                    </div>
                                    <div class="col-lg-3">
                                        <a href="{{ url('admin/wallet/payments/hand') }}" class="btn btn-danger w-100">
                                            الغاء </a>
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
