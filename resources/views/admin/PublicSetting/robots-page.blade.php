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
                            <a href="{{ url('admin/public-setting/update') }}" class="all"> الاعدادات </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/public-setting/seo-data') }}" class="all"> تحسينات SEO </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/public-setting/robots-data') }}" class="all active"> ملف Robots.txt &
                                خارطة أرشفة
                                الموقع ( Site map ) </a>
                        </li>
                    </ul>
                </form>
            </div>
            <form method="post" action="{{ url('admin/public-setting/robots-data') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title"> ملف Robots.txt </h4>
                            </div>
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="robots" class="form-label"> تعديل ملف Robots.txt </label>
                                            <textarea class="form-control" name="robots_txt" id="robots" cols="30" rows="10">{{ $public_setting['robots_txt'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="website_description" class="form-label"> خارطة أرشفة الموقع ( Site map ) </label>
                                            <input class='form-control' type="text" name="site_map_url" id="site_map_url"
                                                value="{{ $public_setting['site_map_url'] }}">
                                        </div>
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
