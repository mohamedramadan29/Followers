@extends('admin.layouts.master')
@section('title', 'الاعدادات ')
@section('publicsetting-active', 'active')
@section('css')

    <style>
        body {
            background-color: #fff;
        }
    </style>

@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <div class="row">
                <form action="#" method="get" class="d-flex" style="justify-content: space-between;align-items: center">
                    <ul class="list-unstyled orders-tabs" style="widows: 90%">
                        <li>
                            <a href="{{ url('admin/public-setting/update') }}" class="all active"> الاعدادات العامة </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/update_admin_details') }}" class="all"> حسابي </a>
                        </li>
                    </ul>
                </form>
                <form action="#" method="get" class="d-flex"
                    style="justify-content: space-between;align-items: center">
                    <ul class="list-unstyled orders-tabs" style="widows: 90%">
                        <li>
                            <a href="{{ url('admin/public-setting/update') }}" class="all"> الاعدادات </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/public-setting/seo-data') }}" class="all active"> تحسينات SEO </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/public-setting/robots-data') }}" class="all"> ملف Robots.txt & خارطة أرشفة
                                الموقع ( Site map ) </a>
                        </li>
                    </ul>
                </form>
            </div>
            <form method="post" action="{{ url('admin/public-setting/seo-data') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header">
                                <h4 class="card-title"> تحسينات SEO </h4>
                            </div>
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="website_name" class="form-label"> عنوان الصفحة الرئيسية (Homepage
                                                title ) </label>
                                            <input required type="text" id="website_name" class="form-control"
                                                name="website_name" value="{{ $public_setting['website_name'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="website_description" class="form-label"> وصف الصفحة الرئيسية (Meta
                                                Description ) </label>
                                            <textarea class="form-control bg-light-subtle" id="website_description" rows="7" name="website_description">{{ $public_setting['website_description'] }}</textarea>
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
                                                    value="{{ $public_setting['meta_keywords'] }}">
                                            </div>
                                            <div id="keywordList" class="mt-2">
                                                @if ($public_setting['meta_keywords'])
                                                    @foreach (explode(',', $public_setting['meta_keywords']) as $keyword)
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
@endsection
