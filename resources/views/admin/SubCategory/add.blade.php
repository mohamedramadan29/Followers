@extends('admin.layouts.master')
@section('title')
     اضافة قسم فرعي الي::  {{$MainCategory['name']}}
@endsection
@section('css')

    {{--    <!-- DataTables CSS -->--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{url('admin/sub-category/add/'.$MainCategory['id'])}}" enctype="multipart/form-data">
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
                                <h4 class="card-title"> المعلومات العامة </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="mb-3">
                                            <label for="name" class="form-label"> القسم الرئيسي   </label>
                                            <input required disabled readonly type="text" id="name" class="form-control" name="name"
                                                   value="{{$MainCategory['name']}}">
                                            <input required type="hidden" id="name" class="form-control" name="parent_category"
                                                   value="{{$MainCategory['id']}}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="name" class="form-label"> عنوان القسم </label>
                                            <input required type="text" id="name" class="form-control" name="name"
                                                   value="{{old('name')}}">
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <label for="crater" class="form-label"> حالة التفعيل </label>
                                        <select required name="status" class="form-control" id="crater" data-choices
                                                data-choices-groups data-placeholder="Select Crater">
                                            <option value=""> -- حدد الحالة --</option>
                                            <option selected value="1">مفعل</option>
                                            <option value="0">غير مفعل</option>
                                        </select>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-0">
                                            <label for="description" class="form-label"> وصف القسم </label>
                                            <textarea required class="form-control bg-light-subtle" id="description"
                                                      rows="7" name="description">{{old('name')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">صورة القسم</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <input required type="file" class="form-control" name="image" accept="image/*">
                                </div>
                                <!-- File Upload -->
                                {{--                            <form action="https://techzaa.getappui.com/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">--}}
                                {{--                                <div class="fallback">--}}
                                {{--                                    <input name="file" type="file" multiple />--}}
                                {{--                                </div>--}}
                                {{--                                <div class="dz-message needsclick">--}}
                                {{--                                    <i class="bx bx-cloud-upload fs-48 text-primary"></i>--}}
                                {{--                                    <h3 class="mt-4">Drop your images here, or <span class="text-primary">click to browse</span></h3>--}}
                                {{--                                    <span class="text-muted fs-13">--}}
                                {{--                                                       1600 x 1200 (4:3) recommended. PNG, JPG and GIF files are allowed--}}
                                {{--                                                  </span>--}}
                                {{--                                </div>--}}
                                {{--                            </form>--}}
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> معلومات السيو <span
                                            class="badge badge-info bg-info"> اختياري  </span></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="meta_title" class="form-label"> العنوان </label>
                                            <input type="text" id="meta_title" class="form-control" name="meta_title"
                                                   value="{{old('meta_title')}}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="meta_keywords" class="form-label"> الكلمات المفتاحية </label>
                                            <input type="text" id="meta_keywords" name="meta_keywords"
                                                   class="form-control" value="{{old('meta_keywords')}}">
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-0">
                                            <label for="meta_description" class="form-label">الوصف </label>
                                            <textarea class="form-control bg-light-subtle" id="meta_description"
                                                      rows="4"
                                                      name="meta_description">{{old('meta_description')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <a href="{{url('admin/main-categories')}}" class="btn btn-primary w-100"> رجوع </a>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-outline-secondary w-100">  حفظ <i class='bx bxs-save'></i> </button>
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
