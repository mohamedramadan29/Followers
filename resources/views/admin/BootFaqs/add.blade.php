@extends('admin.layouts.master')
@section('title', ' اضافة بيانات جديدة ')
@section('chatboot-active', 'active')
@section('chatboot-collapse', 'show')
@section('css')
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{ url('admin/bootfaq/add') }}" enctype="multipart/form-data">
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
                                <h4 class="card-title"> اضافة سوال جديد للبوت </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> السؤال <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <input required type="text" id="title" class="form-control"
                                                name="title" value="{{ old('title') }}">
                                        </div>
                                    </div>
                                    <div class="mt-2 col-lg-12">
                                        <div class="mb-3">
                                            <label for="content" class="form-label"> الاجابة المتوقعة <span class="star"
                                                    style="color: red"> * </span></label>
                                            <textarea class="form-control bg-light-subtle tinymce" id="content" rows="7" placeholder="" name="content">{{ old('content') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> الكلمات المفتاحية للسوال <span class="badge badge-danger bg-danger"> افصل بين كل كلمة والاخري ب (,) </span> <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <input required type="text" id="keywords" class="form-control"
                                                name="keywords" value="{{ old('keywords') }}">
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
                                    <a href="{{ url('admin/bootfaqs') }}" class="btn btn-danger w-100"> الغاء </a>
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
        <!-- Quill Editor js -->
        <script src="{{ asset('assets/admin/js/components/form-quilljs.js') }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // الحصول على كائن المحرر Quill الموجود بالفعل
                var quill = Quill.find(document.getElementById('snow-editor'));

                // تعبئة محتوى Quill editor بالمحتوى السابق (إن وجد)
                var oldContent = `{!! old('content') !!}`;
                quill.root.innerHTML = oldContent;

                // تحديث الحقل المخفي بالمحتوى قبل إرسال النموذج
                var form = document.querySelector('form');
                form.onsubmit = function() {
                    document.querySelector('input[name=content]').value = quill.root.innerHTML;
                };
            });
        </script>
    @endsection
