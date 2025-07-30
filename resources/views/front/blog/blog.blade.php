@extends('front.layouts.master')
@section('title', 'المدونة ')
@section('content')

    <!-- ========================  Start New Blog  ====================== -->
    <section class="all-product">
        <div class="container container-two">
            <div class="row">
                <div class="col-lg-12">
                    <!-- =========================== Most Requested Services Section Start ========================== -->
                    <section class="py-5 most-ordered-section">
                        <div class="container">
                            <div class="mb-2 most-ordered-title-bar d-flex align-items-center justify-content-center">
                                <div class="most-ordered-title-line flex-grow-1"></div>
                                <h4 class="mx-3 mb-0 most-ordered-title-text"> المدونة </h4>
                                <div class="most-ordered-title-line flex-grow-1"></div>
                            </div>
                            <div class="mb-3 text-center most-ordered-desc">

                                يسعدنا انضمامك إلى متجر زيادة التفاعل، ونسعد بمتابعتك لنا عبر وسائل التواصل الاجتماعي. بمتابعتك ستكون أول من يعرف عن العروض المميزة والمنتجات الحديثة. <br> كن فردًا من عائلتنا وساهم في رحلتنا نحو التميز دائمًا.

                            </div>
                            <br>
                            <div class="row g-4 justify-content-center">
                                @foreach ($blogs as $blog)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="text-center most-ordered-card" style="min-height: 200px">
                                        <a href="{{ url('blog/' . $blog['slug']) }}">
                                        <img src="{{ asset('assets/uploads/Blogs/' . $blog->image) }}"
                                            class="mb-2 most-ordered-img" alt="{{ $blog->name }}">
                                        </a>
                                        <a href="{{ url('blog/' . $blog['slug']) }}">
                                        <div class="most-ordered-title"> {{ $blog->name }} </div>
                                        </a>
                                        <div class="most-ordered-desc-card" style="color: #5D5FED"> {{ $blog->Category->name }} </div>
                                        <div class="time text-muted" style="color: #9C9C9C;font-size: 12px"> <i class="bi bi-alarm"></i> {{ $blog->created_at->diffForHumans() }} </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- ===========================  End New Blog  ========================== -->

    <!-- ======================== Brand Section Start ========================= -->
    <div class="brand">
        <div class="container">
            <div class="brand-slider">
                <div class="brand-item d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-img1.png" alt=""
                        class="white-version">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-white-img1.png" alt=""
                        class="dark-version">
                </div>
                <div class="brand-item d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-img2.png" alt=""
                        class="white-version">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-white-img2.png" alt=""
                        class="dark-version">
                </div>
                <div class="brand-item d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-img3.png" alt=""
                        class="white-version">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-white-img3.png" alt=""
                        class="dark-version">
                </div>
                <div class="brand-item d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-img4.png" alt=""
                        class="white-version">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-white-img4.png" alt=""
                        class="dark-version">
                </div>
                <div class="brand-item d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-img5.png" alt=""
                        class="white-version">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-white-img5.png" alt=""
                        class="dark-version">
                </div>
                <div class="brand-item d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-img3.png" alt=""
                        class="white-version">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-white-img3.png" alt=""
                        class="dark-version">
                </div>
            </div>
        </div>
    </div>
    <!-- ======================== Brand Section End ========================= -->
@endsection
