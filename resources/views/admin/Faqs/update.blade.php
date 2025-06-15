@extends('admin.layouts.master')
@section('title', 'تعديل السؤال')
@section('faqs-active', 'active')
@section('faqs-collapse', 'show')
@section('css')
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{ url('admin/faq/update/' . $faq['id']) }}" enctype="multipart/form-data">
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
                                <h4 class="card-title"> تعديل السؤال </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> السؤال <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <input required type="text" id="title" class="form-control"
                                                name="title" value="{{ $faq['title'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea class="form-control bg-light-subtle tinymce" id="content" rows="7" placeholder="" name="content">{{ $faq['content'] }}</textarea>
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
                                    <a href="{{ url('admin/faqs') }}" class="btn btn-danger w-100"> الغاء </a>
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
