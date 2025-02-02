@extends('admin.layouts.master')
@section('title')
    الاعدادات العامة للموقع
@endsection
@section('css')
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{ url('admin/public-setting/update') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-xl-12 col-lg-12 ">
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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> المعلومات العامة للموقع </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="website_name" class="form-label"> اسم الموقع </label>
                                            <input required type="text" id="website_name" class="form-control"
                                                name="website_name" value="{{ $public_setting['website_name'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="website_short_desc" class="form-label"> وصف مختصر
                                                للموقع </label>
                                            <input type="text" id="website_short_desc" class="form-control"
                                                name="website_short_desc"
                                                value="{{ $public_setting['website_short_desc'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="website_keywords" class="form-label"> الكلمات المفتاحية
                                                للموقع </label>
                                            <input type="text" id="website_keywords" class="form-control"
                                                name="website_keywords" value="{{ $public_setting['website_keywords'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="website_description" class="form-label"> الوصف التعريفي
                                                للموقع </label>
                                            <textarea class="form-control bg-light-subtle" id="website_description" rows="7" name="website_description">{{ $public_setting['website_description'] }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> لوجو الموقع </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <input type="file" class="form-control" name="image" accept="image/*">
                                <img width="80px" height="80px"
                                    src="{{ asset('assets/uploads/PublicSetting/' . $public_setting->website_logo) }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> منصات التواصل الاجتماعي والسوشيال ميديا </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label"> رقم الهاتف </label>
                                        <input required type="text" id="phone" class="form-control" name="phone"
                                            value="{{ $public_setting['phone'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="email" class="form-label"> البريد الالكتروني </label>
                                        <input required type="text" id="email" class="form-control" name="email"
                                            value="{{ $public_setting['email'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="facebook" class="form-label"> الفيسبوك </label>
                                        <input  type="text" id="facebook" class="form-control" name="facebook"
                                            value="{{ $public_setting['facebook'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="twitter" class="form-label"> تويتر x </label>
                                        <input  type="text" id="twitter" class="form-control" name="twitter"
                                            value="{{ $public_setting['twitter'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="instagram" class="form-label"> انستجرام </label>
                                        <input  type="text" id="instagram" class="form-control"
                                            name="instagram" value="{{ $public_setting['instagram'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="linkedin" class="form-label"> لينكدان </label>
                                        <input  type="text" id="linkedin" class="form-control"
                                            name="linkedin" value="{{ $public_setting['linkedin'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="youtube" class="form-label"> يوتيوب </label>
                                        <input  type="text" id="youtube" class="form-control"
                                            name="youtube" value="{{ $public_setting['youtube'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="snapchap" class="form-label"> سناب شات </label>
                                        <input  type="text" id="snapchap" class="form-control"
                                            name="snapchap" value="{{ $public_setting['snapchap'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="pinterest" class="form-label"> بينترست </label>
                                        <input  type="text" id="pinterest" class="form-control"
                                            name="pinterest" value="{{ $public_setting['pinterest'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="whatsapp" class="form-label"> واتساب </label>
                                        <input  type="text" id="whatsapp" class="form-control"
                                            name="whatsapp" value="{{ $public_setting['whatsapp'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 bg-light mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-outline-secondary w-100"> حفظ <i
                                        class='bx bxs-save'></i></button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
    <!-- End Container Fluid -->


    <!-- ==================================================== -->
    <!-- End Page Content -->
    <!-- ==================================================== -->
@endsection

@section('js')
@endsection
