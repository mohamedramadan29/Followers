@extends('admin.layouts.master')
@section('title')
    الخدمات
@endsection
@section('css')
    {{--    <!-- DataTables CSS --> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{ url('admin/main-category/add') }}" enctype="multipart/form-data">
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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> اضافة قسم جديد </h4>
                            </div>
                            <div class="card-body" style="background-color: #F2F2F8">
                                <div class="row">
                                    <div class="col-lg-4 col-6">

                                        <div class="mb-3">
                                            <label for="name" class="form-label"> عنوان القسم </label>
                                            <input required type="text" id="name" class="form-control"
                                                name="name" value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-6">
                                        <label for="crater" class="form-label"> حالة التفعيل </label>
                                        <select required name="status" class="form-control" id="crater" data-choices
                                            data-choices-groups data-placeholder="Select Crater">
                                            <option value=""> -- حدد الحالة --</option>
                                            <option selected value="1">مفعل</option>
                                            <option value="0">غير مفعل</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <label for="crater" class="form-label"> قسم في الصفحة الرئيسية </label>
                                        <select required name="main_page" class="form-control" id="crater" data-choices
                                            data-choices-groups data-placeholder="Select Crater">
                                            <option value=""> -- حدد --</option>
                                            <option value="1">نعم</option>
                                            <option selected value="0">لا</option>
                                        </select>
                                    </div>

                                    <div class="bg-white col-lg-12">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="image" id="single-image">
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="mb-0">
                                            <label for="description" class="form-label"> وصف القسم </label>
                                            <textarea required class="form-control bg-light-subtle tinymce" id="description" rows="7" name="description">{{ old('name') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">  تحسينات السيو ( SEO )  </h4>
                            </div>
                            <div class="card-body" style="background-color:#F2F2F8">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="meta_title" class="form-label">  عنوان صفحة المنتج (Page Title)  </label>
                                            <input type="text" id="meta_title" class="form-control" name="meta_title"
                                                value="{{ old('meta_title') }}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="meta_title" class="form-label">   رابط صفحة المنتج (SEO Page URL)  </label>
                                            <input type="text" id="meta_title" class="form-control" name="meta_title"
                                                value="{{ old('meta_title') }}">
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-0">
                                            <label for="meta_description" class="form-label"> وصف صفحة المنتج (Page Description)   </label>
                                            <textarea class="form-control bg-light-subtle" id="meta_description" rows="4" name="meta_description">{{ old('meta_description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="meta_keywords" class="form-label"> الكلمات المفتاحية </label>
                                            <input type="text" id="meta_keywords" name="meta_keywords"
                                                class="form-control" value="{{ old('meta_keywords') }}">
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
                                    <a href="{{ url('admin/main-categories') }}" class="btn btn-danger w-100"> الغاء  </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Container Fluid -->


    <!-- ==================================================== -->
    <!-- End Page Content -->
    <!-- ==================================================== -->
@endsection

@section('js')
    <script src="https://cdn.tiny.cloud/1/c8u902w1qjlgsxdu73djug5kw4ckg9n6ggwi5lynenmwrw25/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '.tinymce',
            height: 300,
            directionality: 'rtl', // لجعل المحرر يعمل من اليمين إلى اليسار
            language: 'ar',
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
                'insertdatetime',
                'media', 'table', 'emoticons', 'help'
            ],
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons',
            menu: {
                favs: {
                    title: 'My Favorites',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            image_title: true, // السماح بتعديل العنوان
            automatic_uploads: true,
            images_upload_url: 'post_uploads', // مسار API لاستقبال الصور
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                if (meta.filetype === 'image') {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.onchange = function() {
                        var file = this.files[0];
                        var reader = new FileReader();
                        reader.onload = function() {
                            cb(reader.result, {
                                title: file.name
                            });
                        };
                        reader.readAsDataURL(file);
                    };
                    input.click();
                }
            }
        });
    </script>
@endsection
