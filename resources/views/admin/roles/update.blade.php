@extends('admin.layouts.master')
@section('title')
    تعديل صلاحية
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
            <form method="post" action="{{ url('admin/role/update/' . $role['id'] . '') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-xl-12 col-lg-8 ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> تعديل صلاحية</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> اسم الصلاحية </label>
                                            <input type="text" id="projectinput1" class="form-control"
                                                placeholder=" اسم الصلاحية  " name="role" value="{{ $role->role }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput3"> حدد الصلاحيات </label>
                                            <br>
                                            <div class="row">
                                                @php
                                                    // فك ترميز الـ permission إلى مصفوفة
                                                    $permissionsArray = json_decode($role->permissions, true) ?? [];
                                                @endphp
                                                @foreach (config('permissions') as $key => $value)
                                                    <div class="col-3">
                                                        <div class="form-check">
                                                            <input name="permissions[]" class="form-check-input"
                                                                type="checkbox" value="{{ $key }}"
                                                                id="{{ $value }}" @checked(in_array($key, $permissionsArray)) />
                                                            <label class="form-check-label" for="{{ $value }}">
                                                                {{ $value }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
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
