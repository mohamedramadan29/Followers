@extends('admin.layouts.master')
@section('title','اضافة مزود خدمة جديد')
@section('providers-active','active')
@section('providers-collapse','show')
@section('css')
@endsection
@section('content')
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{ url('admin/provider/add') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-xl-12 col-lg-8">
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title"> اضافة مزود خدمة جديد </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> الاسم </label>
                                            <input required type="text" id="name" name="name"
                                                class="form-control" placeholder="" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="api_url" class="form-label"> Api Url </label>
                                            <input required type="text" id="api_url" name="api_url"
                                                class="form-control" placeholder="" value="{{ old('api_url') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> Api Key </label>
                                            <input required type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ old('api_key') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> حالة التفعيل </label>
                                            <select name="status" class="form-control">
                                                <option value="1"> مفعل </option>
                                                <option value="0"> غير مفعل </option>
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
                                        <a href="{{ url('admin/providers') }}" class="btn btn-danger w-100"> الغاء </a>
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
