@extends('admin.layouts.master')
@section('title')
    اضافة قسم فرعي الي:: {{ $MainCategory['name'] }}
@endsection
@section('products-active','active')
@section('products-collapse','show')
@section('css')
    {{--    <!-- DataTables CSS --> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{ url('admin/sub-category/add/' . $MainCategory['id']) }}"
                enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title"> المعلومات العامة </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">

                                        <div class="mb-3">
                                            <label for="name" class="form-label"> القسم الرئيسي </label>
                                            <input required disabled readonly type="text" id="name"
                                                class="form-control" name="name" value="{{ $MainCategory['name'] }}">
                                            <input required type="hidden" id="name" class="form-control"
                                                name="parent_category" value="{{ $MainCategory['id'] }}">
                                        </div>

                                    </div>
                                    <div class="col-lg-4">

                                        <div class="mb-3">
                                            <label for="name" class="form-label"> عنوان القسم </label>
                                            <input required type="text" id="name" class="form-control"
                                                name="name" value="{{ old('name') }}">
                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <label for="crater" class="form-label"> حالة التفعيل </label>
                                        <select required name="status" class="form-control" id="crater" data-choices
                                            data-choices-groups data-placeholder="Select Crater">
                                            <option value=""> -- حدد الحالة --</option>
                                            <option selected value="1">مفعل</option>
                                            <option value="0">غير مفعل</option>
                                        </select>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="single-image" class="form-label"> صورة القسم </label>
                                            <div class="bg-white">
                                                <input id="single-image" type="file" class="form-control" name="image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-0">
                                            <label for="description" class="form-label"> وصف القسم </label>
                                            <textarea class="form-control bg-light-subtle tinymce" id="description" rows="7" name="description">{{ old('name') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="background-color:#F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title">تحسينات السيو ( SEO )</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="meta_title" class="form-label">عنوان صفحة المنتج (Page
                                                Title)</label>
                                            <input type="text" id="meta_title" class="form-control" name="meta_title"
                                                placeholder="ادخل العنوان هنا" value="{{ old('meta_title') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="meta_url" class="form-label">رابط صفحة المنتج (SEO PAGE URL)</label>
                                            <input type="text" id="meta_url" class="form-control" name="meta_url"
                                                placeholder="أدخل رابط المنتج" value="{{ old('meta_url') }}">
                                            <!-- حقل مخفي لتخزين الرابط النهائي -->
                                            <input type="hidden" name="meta_url_final" id="meta_url_final"
                                                value="{{ old('meta_url') }}">
                                            <!-- معاينة الرابط -->
                                            <div class="mt-2">
                                                <small class="text-muted">معاينة الرابط: </small>
                                                <span id="urlPreview"
                                                    class="text-primary">{{ url('/category/') }}/<span
                                                        id="slugPreview"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="meta_description" class="form-label">وصف صفحة المنتج (Page
                                                Description)</label>
                                            <textarea class="form-control" id="meta_description" rows="7" name="meta_description"
                                                placeholder="وصف صفحة المنتج">{{ old('meta_description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="meta_keywords" class="form-label">الكلمات المفتاحية</label>
                                            <div class="input-group">
                                                <input type="text" id="meta_keywords" class="form-control"
                                                    placeholder="أدخل الكلمات المفتاحية">
                                                <!-- حقل مخفي لتخزين الكلمات -->
                                                <input type="hidden" name="meta_keywords" id="hidden_keywords"
                                                    value="{{ old('meta_keywords') }}">
                                            </div>
                                            <div id="keywordList" class="mt-2">
                                                @if (old('meta_keywords'))
                                                    @foreach (explode(',', old('meta_keywords')) as $keyword)
                                                        <span class="mb-2 text-white badge bg-primary me-2"
                                                            data-keyword="{{ $keyword }}">
                                                            {{ $keyword }} <span class="ms-2 text-danger"
                                                                onclick="removeKeyword(this)">×</span>
                                                        </span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="alert alert-info" role="alert">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <p class="mb-0">حساب تيك توك للبيع k 23 ، تعرف على متجر زيادة التفاعل
                                                        وزيد تأثيرك فوراً</p>
                                                    <p class="mb-0 text-muted">امتلك حساب تيك توك k 23 متاح للبيع بسهولة
                                                        وسرعة، خمس خطوات على المنصة وتمتع بتفاعل مضمون، دون قلق.</p>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <a href="https://www.facebook.com/username/videos/987654321"
                                                    class="text-primary"
                                                    target="_blank">https://www.facebook.com/username/videos/987654321</a>
                                            </div>
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
                                    <a href="{{ url('admin/main-categories') }}" class="btn btn-danger w-100"> الغاء </a>
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
    <script>
        // دالة لتحديث الحقل المخفي
        function updateHiddenKeywords() {
            let keywords = [];
            document.querySelectorAll('#keywordList .badge').forEach(badge => {
                keywords.push(badge.getAttribute('data-keyword'));
            });
            document.getElementById('hidden_keywords').value = keywords.join(',');
        }

        // دالة لإزالة الكلمة وتحديث الحقل المخفي
        function removeKeyword(element) {
            element.parentElement.remove();
            updateHiddenKeywords();
        }

        // إضافة كلمة عند الضغط على Enter
        document.getElementById('meta_keywords').addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && this.value.trim()) {
                e.preventDefault();
                let keyword = this.value.trim();
                let keywordList = document.getElementById('keywordList');
                let badge = document.createElement('span');
                badge.className = 'mb-2 text-white badge bg-primary me-2';
                badge.setAttribute('data-keyword', keyword);
                badge.innerHTML =
                    `${keyword} <span class="ms-2 text-danger" onclick="removeKeyword(this)">×</span>`;
                keywordList.appendChild(badge);
                this.value = '';
                updateHiddenKeywords();
            }
        });
    </script>
    <script>
        // دالة لتحويل النص إلى slug
        function toSlug(text) {
            return text
                .toLowerCase()
                .trim()
                .replace(/[\s+]/g, '-') // استبدال المسافات بـ -
                .replace(/[^\w\-]+/g, '') // إزالة الرموز غير المرغوب فيها
                .replace(/\-\-+/g, '-'); // إزالة الـ - المكررة
        }

        // عرض معاينة الرابط أثناء الكتابة
        document.getElementById('meta_url').addEventListener('input', function() {
            let input = this.value;
            let slug = toSlug(input);
            document.getElementById('slugPreview').textContent = slug || 'عنوان-المنتج';
            document.getElementById('meta_url_final').value = slug; // تحديث الحقل المخفي
        });
    </script>
@endsection
