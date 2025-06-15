@extends('admin.layouts.master')
@section('title', 'اضافة خبر جديد')
@section('lastnews-active', 'active')
@section('lastnews-collapse', 'show')
@section('css')
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{ url('admin/news/add') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-xl-12 col-lg-12">
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
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title"> اضافة خبر جديد </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="title" class="form-label"> عنوان الخبر <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <input required type="text" id="title" class="form-control"
                                                name="title" value="{{ old('title') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="publish_date" class="form-label"> تاريخ النشر <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <input required type="date" id="publish_date" class="form-control"
                                                name="publish_date" value="{{ old('publish_date') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="publish_date" class="form-label"> التصنيف <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <select required name="category" id="category"
                                                class="form-control form-select">
                                                <option value="">اختر التصنيف</option>
                                                <option value="اقتصاد">اقتصاد </option>
                                                <option value="سياسة">سياسة </option>
                                                <option value="رياضة">رياضة </option>
                                                <option value="فنون">فنون </option>
                                                <option value="تكنولوجيا">تكنولوجيا </option>
                                                <option value="صحة">صحة </option>
                                                <option value="أخبار عالمية"> اخبار عالمية </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="bg-white col-lg-4 custome_image">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="image" id="single-image"
                                                accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="title" class="form-label"> محتوي الخبر <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <textarea class="form-control bg-light-subtle tinymce" id="content" rows="7" placeholder="" name="content">{{ old('content') }}</textarea>
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
                                <div class="col-lg-3">
                                    <a href="{{ url('admin/news') }}" class="btn btn-danger w-100"> الغاء </a>
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
