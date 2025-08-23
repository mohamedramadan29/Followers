@extends('admin.layouts.master')
@section('title', 'الاعدادات ')
@section('publicsetting-active', 'active')
@section('css')

    <style>
        body {
            background-color: #fff;
        }
    </style>

@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <div class="row">
                <form action="#" method="get" class="d-flex" style="justify-content: space-between;align-items: center">
                    <ul class="list-unstyled orders-tabs" style="widows: 90%">
                        <li>
                            <a href="{{ url('admin/public-setting/update') }}" class="all active"> الاعدادات العامة </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/update_admin_details') }}" class="all"> حسابي </a>
                        </li>
                    </ul>
                </form>
                <form action="#" method="get" class="d-flex"
                    style="justify-content: space-between;align-items: center">
                    <ul class="list-unstyled orders-tabs" style="widows: 90%">
                        <li>
                            <a href="{{ url('admin/public-setting/update') }}" class="all active"> الاعدادات </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/public-setting/seo-data') }}" class="all"> تحسينات SEO </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/public-setting/robots-data') }}" class="all"> ملف Robots.txt & خارطة أرشفة
                                الموقع ( Site map ) </a>
                        </li>
                    </ul>
                </form>
            </div>
            <form method="post" action="{{ url('admin/public-setting/update') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title"> بيانات المتجر </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="bg-white col-lg-4 custome_image" style="margin-left: 10px">
                                        <label for=""> شعار المتجر </label>
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="image" id="single-image-edit"
                                                accept="image/*">
                                        </div>
                                    </div>
                                    <div class="bg-white col-lg-4 custome_image" style="margin-right: 10px">
                                        <label for=""> ايقونة تبويب المتجر </label>
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="favicon" id="single-image-edit2"
                                                accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="about_website" class="form-label"> عن المتجر </label>
                                            <textarea class="form-control bg-light-subtle" id="about_website" rows="7" name="about_website">{{ $public_setting['about_website'] }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background-color: #F2F2F8">
                        <div class="card-header">
                            <h4 class="card-title"> شهادة توثيق منصة الأعمال </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="mb-3">
                                        <label for="autentication_number" class="form-label"> رقم التوثيق </label>
                                        <input  type="text" id="autentication_number" class="form-control"
                                            name="autentication_number"
                                            value="{{ $public_setting['autentication_number'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="mb-3">
                                        <label for="commercial_number" class="form-label"> السجل التجاري </label>
                                        <input  type="text" id="commercial_number" class="form-control"
                                            name="commercial_number" value="{{ $public_setting['commercial_number'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="mb-3">
                                        <label for="tax_number" class="form-label"> رقم الضريبة </label>
                                        <input  type="text" id="tax_number" class="form-control"
                                            name="tax_number" value="{{ $public_setting['tax_number'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="background-color: #F2F2F8">
                        <div class="card-header">
                            <h4 class="card-title"> منصات التواصل الاجتماعي والسوشيال ميديا </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label"> رقم الهاتف </label>
                                        <input type="text" id="phone" class="form-control"
                                            name="phone" value="{{ $public_setting['phone'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="email" class="form-label"> البريد الالكتروني </label>
                                        <input type="text" id="email" class="form-control"
                                            name="email" value="{{ $public_setting['email'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="facebook" class="form-label"> الفيسبوك </label>
                                        <input type="text" id="facebook" class="form-control" name="facebook"
                                            value="{{ $public_setting['facebook'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="twitter" class="form-label"> تويتر x </label>
                                        <input type="text" id="twitter" class="form-control" name="twitter"
                                            value="{{ $public_setting['twitter'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="instagram" class="form-label"> انستجرام </label>
                                        <input type="text" id="instagram" class="form-control" name="instagram"
                                            value="{{ $public_setting['instagram'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="linkedin" class="form-label"> لينكدان </label>
                                        <input type="text" id="linkedin" class="form-control" name="linkedin"
                                            value="{{ $public_setting['linkedin'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="youtube" class="form-label"> يوتيوب </label>
                                        <input type="text" id="youtube" class="form-control" name="youtube"
                                            value="{{ $public_setting['youtube'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="snapchap" class="form-label"> سناب شات </label>
                                        <input type="text" id="snapchap" class="form-control" name="snapchap"
                                            value="{{ $public_setting['snapchap'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="pinterest" class="form-label"> بينترست </label>
                                        <input type="text" id="pinterest" class="form-control" name="pinterest"
                                            value="{{ $public_setting['pinterest'] }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="whatsapp" class="form-label"> واتساب </label>
                                        <input type="text" id="whatsapp" class="form-control" name="whatsapp"
                                            value="{{ $public_setting['whatsapp'] }}">
                                    </div>
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
<script>
    var lang = "{{ app()->getLocale() }}";
    $("#single-image-edit").fileinput({
        theme: 'bs5',
        allowedFileTypes: ['image'],
        language: lang,
        maxFileCount: 1,
        enableResumableUpload: false,
        showUpload: false,
        initialPreviewAsData: true,
        initialPreview: [
            "{{ asset($public_setting->Logo()) }}"
        ],
    });
    $("#single-image-edit2").fileinput({
        theme: 'bs5',
        allowedFileTypes: ['image'],
        language: lang,
        maxFileCount: 1,
        enableResumableUpload: false,
        showUpload: false,
        initialPreviewAsData: true,
        initialPreview: [
            "{{ asset($public_setting->Favicon()) }}"
        ],
    });
</script>
@endsection
