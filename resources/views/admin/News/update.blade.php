@extends('admin.layouts.master')
@section('title','تعديل الخبر')
@section('lastnews-active', 'active')
@section('lastnews-collapse', 'show')
@section('css')
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{ url('admin/news/update/' . $news['id']) }}" enctype="multipart/form-data">
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
                                <h4 class="card-title"> تعديل الخبر </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> العنوان <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <input required type="text" id="title" class="form-control"
                                                name="title" value="{{ $news['title'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="publish_date" class="form-label"> تاريخ النشر <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <input required type="date" id="publish_date" class="form-control"
                                                name="publish_date" value="{{ $news['publish_date'] }}">
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
                                                <option {{ $news['category'] == 'اقتصاد' ? 'selected' : '' }} value="اقتصاد">اقتصاد </option>
                                                <option {{ $news['category'] == 'سياسة' ? 'selected' : '' }} value="سياسة">سياسة </option>
                                                <option {{ $news['category'] == 'رياضة' ? 'selected' : '' }} value="رياضة">رياضة </option>
                                                <option {{ $news['category'] == 'فنون' ? 'selected' : '' }} value="فنون">فنون </option>
                                                <option {{ $news['category'] == 'تكنولوجيا' ? 'selected' : '' }} value="تكنولوجيا">تكنولوجيا </option>
                                                <option {{ $news['category'] == 'صحة' ? 'selected' : '' }} value="صحة">صحة </option>
                                                <option {{ $news['category'] == 'أخبار عالمية' ? 'selected' : '' }} value="أخبار عالمية"> اخبار عالمية </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="bg-white col-lg-4 custome_image">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="image" id="single-image-edit"
                                                accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="title" class="form-label"> محتوي الخبر <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <textarea class="form-control bg-light-subtle tinymce" id="content" rows="7" placeholder="" name="content">{{ $news['content'] }}</textarea>
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

        <!-- Start file Input  -->
        <script>
            var lang = "{{ app()->getLocale() }}";
            $("#single-image-edit").fileinput({
                theme: 'bs5',
                allowedFileTypes: ['image'],
                language: lang,
                maxFileCount: 1,
                enableResumableUpload: false,
                showUpload: false,
                initialPreviewAsData: true,
                initialPreview: [
                    "{{ asset($news->Image()) }}"
                ],
            });
        </script>
    @endsection
