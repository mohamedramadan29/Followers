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
            <form action="#" method="get" class="d-flex" style="justify-content: space-between;align-items: center">
                <ul class="list-unstyled orders-tabs" style="widows: 90%">
                    <li>
                        <a href="{{ url('admin/public-setting/update') }}" class="all"> الاعدادات العامة </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/update_admin_details') }}" class="all active"> حسابي </a>
                    </li>
                </ul>
            </form>
            <form method="post" action="{{ url('admin/update_admin_details') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title"> حسابي - تعديل البيانات </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="name" class="form-label"> الاسم </label>
                                            <input required type="text" id="name" class="form-control"
                                                name="name" value="{{ $admin_data['name'] }}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="name" class="form-label"> نوع المستخدم </label>
                                            <input disabled readonly type="text" id="name" class="form-control"
                                                name="name" value="{{ $admin_data['account_type'] }}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="email" class="form-label"> البريد الالكتروني </label>
                                            <input type="email" id="email" class="form-control" name="email"
                                                value="{{ $admin_data['email'] }}">
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label"> رقم الهاتف </label>
                                            <input type="number" id="phone" class="form-control" name="phone"
                                                value="{{ $admin_data['phone'] }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-start g-2">
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-primary w-100"> حفظ <i
                                            class='bx bxs-save'></i></button>
                                </div>

                            </div>
                        </div>

            </form>
            <form method="post" action="{{ url('admin/update_admin_password') }}" enctype="multipart/form-data">
                @csrf
                <div class="card" style="background-color: #F2F2F8">
                    <div class="card-header">
                        <h4 class="card-title"> تعديل كلمة المرور </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">

                                <div class="mb-3">
                                    <label for="old_password" class="form-label"> كلمة المرور القديمة </label>
                                    <input type="password" id="old_password" class="form-control" name="old_password">
                                    <span id="check_password"></span>
                                </div>

                            </div>
                            <div class="col-lg-4">

                                <div class="mb-3">
                                    <label for="new_password" class="form-label"> كملة المرور الجديدة </label>
                                    <input type="password" id="new_password" class="form-control" name="new_password">
                                </div>
                            </div>
                            <div class="col-lg-4">

                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label"> تأكيد كلمة المرور </label>
                                    <input type="password" id="confirm_password" class="form-control"
                                        name="confirm_password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start g-2">
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-primary w-100"> حفظ <i class='bx bxs-save'></i></button>
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
