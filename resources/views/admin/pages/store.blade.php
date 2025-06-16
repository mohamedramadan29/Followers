@extends('admin.layouts.master')
@section('title','اضافة صفحة')
@section('page-active', 'active')
@section('css')
@endsection
@section('content')
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{ url('admin/page/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-xl-12 col-lg-8">
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title">  إضافة صفحة جديدة  </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label"> اسم الصفحة  </label>
                                            <input type="text" id="title" class="form-control"
                                                                placeholder="  الصفحة  " name="title">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="page_show" class="form-label"> موضع العرض   </label>
                                            <select name="page_show" id="page_show" class="form-select">
                                                <option value="header"> header </option>
                                                <option value="footer" selected> footer </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-2 col-lg-12">
                                        <div class="mb-3">
                                            <label for="content" class="form-label"> محتوى الصفحة <span class="star"
                                                    style="color: red"> * </span></label>
                                            <textarea class="form-control bg-light-subtle tinymce" id="content" rows="7" placeholder="" name="content">{{ old('content') }}</textarea>
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
                                        <a href="{{ url('admin/pages') }}" class="btn btn-danger w-100"> الغاء </a>
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
