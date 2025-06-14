@extends('admin.layouts.master')
@section('title', 'اضافة اداراي ')
@section('employees-active', 'active')
@section('employees-collapse', 'show')
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
            <form method="post" action="{{ url('admin/employee/add') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-xl-12 col-lg-8">
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title"> اضافة اداراي </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> الاسم </label>
                                            <input required type="text" id="name" class="form-control"
                                                placeholder="" name="name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="mb-3">
                                            <label for="api_url" class="form-label"> البريد الالكتروني </label>
                                            <input required type="email" id="email" class="form-control"
                                                placeholder="" name="email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> واتساب  </label>
                                            <input required type="text" id="phone" class="form-control"
                                                placeholder="" name="phone" value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> كلمة المرور </label>
                                            <input required type="password" id="password" class="form-control"
                                                placeholder="" name="password">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> تاكيد كلمة المرور </label>
                                            <input required type="password" id="password_confirmation" class="form-control"
                                                placeholder="" name="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> حدد الصلاحية </label>
                                            <select required name="role_id" id="" class="form-control form-select">
                                                <option value="" disabled selected> -- حدد الصلاحية --
                                                </option>
                                                @foreach ($roles as $role)
                                                    <option {{ old('role_id') == $role->id ? 'selected' : '' }}
                                                        value="{{ $role->id }}"> {{ $role->role }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> حالة الاداري </label>
                                            <select required name="status" id="" class="form-control form-select">
                                                <option value="" disabled selected> -- حدد الحالة --
                                                </option>
                                                <option value="1">نشط</option>
                                                <option value="0">غير نشط</option>
                                            </select>
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
                                        <a href="{{ url('admin/employees') }}" class="btn btn-danger w-100"> الغاء </a>
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
