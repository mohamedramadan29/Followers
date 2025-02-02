@extends('admin.layouts.master')
@section('title')
    تعديل المقال
@endsection
@section('css')
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{url('admin/blog/update/'.$blog['id'])}}" enctype="multipart/form-data">
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
                                <h4 class="card-title"> تعديل المقال   </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> العنوان  <span class="star"
                                                                                               style="color: red"> * </span>
                                            </label>
                                            <input required type="text" id="name" class="form-control" name="name"
                                                   value="{{$blog['name']}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label"> حدد القسم </label>
                                            <select required class="form-control" id="category_id" data-choices
                                                    data-choices-groups data-placeholder="Select Categories"
                                                    name="category_id">
                                                <option value=""> -- حدد القسم --</option>
                                                @foreach($categories as $category)
                                                    <option {{$category['id'] == $blog['category_id'] ? 'selected':''}} value="{{$category['id']}}">{{$category['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12 ">
                                        <div class="mb-3">
                                            <label for="short_desc" class="form-label"> الوصف المختصر <span class="star"
                                                                                                            style="color: red"> * </span>
                                            </label>
                                            <textarea class="form-control"
                                                      name="short_desc">{{$blog['short_desc']}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="short_desc" class="form-label"> محتوي المقال <span class="star"
                                                                                                       style="color: red"> * </span></label>
                                        <input type="hidden" name="content" id="content">
                                        <!-- Quill Editors -->
                                        <div id="snow-editor" style="height: 300px;">
                                            {{$blog['desc']}}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> الصورة <span class="star"
                                                                                               style="color: red"> * </span>
                                            </label>
                                            <input type="file" accept="image/*" id="image" class="form-control"
                                                   name="image"
                                                   value="{{old('image')}}">
                                            <img width="60px" height="60px" class="img-thumbnail" src="{{asset('assets/uploads/Blogs/'.$blog['image'])}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> معلومات السيو ومحركات البحث </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="meta_title" class="form-label"> العنوان </label>
                                                <input type="text" id="meta_title" name="meta_title" class="form-control"
                                                       placeholder="" value="{{$blog['meta_title']}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="meta_keywords" class="form-label"> الكلمات المفتاحية </label>
                                                <input type="text" id="meta_keywords" name="meta_keywords"
                                                       class="form-control"
                                                       placeholder="" value="{{$blog['meta_keywords']}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="meta_description" class="form-label"> الوصف </label>
                                                <textarea class="form-control bg-light-subtle" id="meta_description"
                                                          rows="7"
                                                          placeholder=""
                                                          name="meta_description">{{$blog['meta_description']}}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
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


        <!-- ==================================================== -->
        <!-- End Page Content -->
        <!-- ==================================================== -->
        @endsection

        @section('js')
            <!-- Quill Editor js -->
            <script src="{{asset('assets/admin/js/components/form-quilljs.js')}}"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    // الحصول على كائن المحرر Quill الموجود بالفعل
                    var quill = Quill.find(document.getElementById('snow-editor'));

                    // تعبئة محتوى Quill editor بالمحتوى السابق أو المحتوى الحالي من قاعدة البيانات
                    var oldContent = `{!! old('content', $blog['desc']) !!}`;
                    quill.root.innerHTML = oldContent;

                    // تحديث الحقل المخفي بالمحتوى قبل إرسال النموذج
                    var form = document.querySelector('form');
                    form.onsubmit = function () {
                        document.querySelector('input[name=content]').value = quill.root.innerHTML;
                    };
                });
            </script>
@endsection
