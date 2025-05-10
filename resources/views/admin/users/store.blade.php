@extends('admin.layouts.master')
@section('title')
    المستخدمين
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
            <form method="post" action="{{ url('admin/user/add') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-xl-12 col-lg-8">
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title"> اضافة مستخدم جديد </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> اسم المستخدم </label>
                                            <input required type="text" id="name" class="form-control"
                                                placeholder="" name="name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> رقم الهاتف </label>
                                            <input required type="text" id="phone" class="form-control"
                                                placeholder="" name="phone" value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="api_url" class="form-label"> البريد الالكتروني </label>
                                            <input required type="email" id="email" class="form-control"
                                                placeholder="" name="email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> كلمة المرور </label>
                                            <input required type="password" id="password" class="form-control"
                                                placeholder="" name="password">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> تاكيد كلمة المرور </label>
                                            <input required type="password" id="password_confirmation" class="form-control"
                                                placeholder="" name="password_confirmation">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="sex" class="form-label"> الجنس </label>
                                            <select required name="sex" id="" class="form-control">
                                                <option value="" disabled selected> -- حدد الجنس --
                                                </option>
                                                <option value="ذكر">ذكر</option>
                                                <option value="انثى"> انثى </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="city" class="form-label"> المدينة </label>
                                            <input required type="text" id="city" class="form-control"
                                                placeholder="" name="city" value="{{ old('city') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="birthday" class="form-label"> تاريخ الميلاد </label>
                                            <input required type="date" id="birthday" class="form-control"
                                                placeholder="" name="birthday" value="{{ old('birthday') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-submit"> اضافة <i
                                            class='bx bxs-save'></i></button>
                                </div>
                                <div class="col-lg-3">
                                    <a href="{{ url('admin/users') }}" class="btn btn-return"> رجوع </a>
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
