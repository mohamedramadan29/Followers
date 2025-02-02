@extends('admin.layouts.master')
@section('title')
   تعديل الموظف
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
            <form method="post" action="{{ url('admin/employee/update/'.$admin->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-xl-12 col-lg-8 ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">  تعديل الموظف  </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> الاسم </label>
                                            <input required type="text" id="name" class="form-control"
                                                placeholder="" name="name" value="{{ $admin->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="api_url" class="form-label"> البريد الالكتروني </label>
                                            <input required type="email" id="email" class="form-control"
                                                placeholder="" name="email" value="{{ $admin->email }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> رقم الهاتف </label>
                                            <input required type="text" id="phone" class="form-control"
                                                placeholder="" name="phone" value="{{ $admin->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> كلمة المرور </label>
                                            <input type="password" id="password" class="form-control"
                                                placeholder="" name="password">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> تاكيد كلمة المرور </label>
                                            <input type="password" id="password_confirmation" class="form-control"
                                                placeholder="" name="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> حدد الصلاحية </label>
                                            <select required name="role_id" id="" class="form-control">
                                                <option value="" disabled selected> -- حدد الصلاحية --
                                                </option>
                                                @foreach ($roles as $role)
                                                                    <option
                                                                        {{ $admin->role_id == $role->id ? 'selected' : '' }}
                                                                        value="{{ $role->id }}"> {{ $role->role }}
                                                                    </option>
                                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> حالة الموظف </label>
                                            <select required name="status" id="" class="form-control">
                                                <option value="" disabled selected> -- حدد الحالة  --
                                                </option>
                                                <option {{ $admin->status == 1 ? 'selected' : '' }} value="1">فعال</option>
                                                <option {{ $admin->status == 0 ? 'selected' : '' }} value="0">غير فعال</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <a href="{{ url('admin/products') }}" class="btn btn-primary w-100"> رجوع </a>
                                </div>
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

    </div>

@endsection
