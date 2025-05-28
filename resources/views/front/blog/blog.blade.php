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
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="text-center most-ordered-card">
                                        <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                            class="mb-2 most-ordered-img" alt="اسم الخدمة">
                                        <div class="most-ordered-title"> اسم الخدمة </div>
                                        <div class="most-ordered-desc-card" style="color: #5D5FED"> تيك توك </div>
                                        <div class="time text-muted" style="color: #9C9C9C;font-size: 12px"> <i class="bi bi-alarm"></i> منذ سنتين </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="text-center most-ordered-card">
                                        <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                            class="mb-2 most-ordered-img" alt="اسم الخدمة">
                                        <div class="most-ordered-title"> اسم الخدمة </div>
                                        <div class="most-ordered-desc-card">وصف </div>
                                        <div class="mt-2 mb-1 most-ordered-rating">
                                            <span>(10)</span>
                                            <span class="stars ms-1">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <i class="fa fa-star text-warning"></i>
                                                @endfor
                                            </span>
                                        </div>
                                        <div class="most-ordered-price">100 / <span class="text-primary">$</span></div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="text-center most-ordered-card">
                                        <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                            class="mb-2 most-ordered-img" alt="اسم الخدمة">
                                        <div class="most-ordered-title"> اسم الخدمة </div>
                                        <div class="most-ordered-desc-card">وصف </div>
                                        <div class="mt-2 mb-1 most-ordered-rating">
                                            <span>(10)</span>
                                            <span class="stars ms-1">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <i class="fa fa-star text-warning"></i>
                                                @endfor
                                            </span>
                                        </div>
                                        <div class="most-ordered-price">100 / <span class="text-primary">$</span></div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="text-center most-ordered-card">
                                        <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                            class="mb-2 most-ordered-img" alt="اسم الخدمة">
                                        <div class="most-ordered-title"> اسم الخدمة </div>
                                        <div class="most-ordered-desc-card">وصف </div>
                                        <div class="mt-2 mb-1 most-ordered-rating">
                                            <span>(10)</span>
                                            <span class="stars ms-1">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <i class="fa fa-star text-warning"></i>
                                                @endfor
                                            </span>
                                        </div>
                                        <div class="most-ordered-price">100 / <span class="text-primary">$</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- ===========================  End New Blog  ========================== -->
    <!-- ======================== All Product Section End ====================== -->
    <div class="container my-5">
        <h2 class="mb-3 text-center fw-bold">المدونة</h2>
        <p class="mb-4 text-center text-muted" style="font-size: 1.1rem;">
            يسعدنا انضمامك إلى محضر زيادة التفاعل، ونسعد بمتابعتك لنا عبر وسائل التواصل الاجتماعي. بمتابعتك ستكون أول من
            يعرف عن العروض المميزة والمنتجات الحديثة. كل فردًا من عائلتنا وساهم في رحلتنا نحو التميز دائمًا.
        </p>
    </div>

    <!-- =========================== Blog Section Start ========================== -->
    <section class="overflow-hidden blog padding-y-120 section-bg position-relative z-index-1">
        <img src="{{ asset('assets/front/') }}/images/shapes/pattern-five.png"
            class="top-0 position-absolute end-0 z-index--1" alt="">
        <div class="container container-two">
            <div class="row g-4">
                @foreach ($blogs as $blog)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="p-3 text-center border-0 shadow-sm card h-100 rounded-4">
                            <a href="{{ url('blog/' . $blog['slug']) }}">
                                <img src="{{ asset('assets/uploads/Blogs/' . $blog->image) }}" alt="{{ $blog->name }}"
                                    class="mx-auto mb-3" style="width: 80px; height: 80px; object-fit: contain;">
                            </a>
                            <div class="mb-2">
                                <span class="px-3 py-2 badge bg-light text-primary fw-bold rounded-pill"
                                    style="font-size: 0.9rem;">
                                    {{ $blog->category->name }}
                                </span>
                            </div>
                            <h5 class="mb-2 fw-bold" style="font-size: 1.1rem;">
                                <a href="{{ url('blog/' . $blog['slug']) }}" class="text-dark text-decoration-none">
                                    {{ $blog->name }}
                                </a>
                            </h5>
                            <div class="mb-2 text-muted small">
                                منذ {{ $blog->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination Start -->
            @if ($blogs->hasPages())
                <nav aria-label="Page navigation example">
                    <ul class="pagination common-pagination">
                        {{-- زر "السابق" --}}
                        @if ($blogs->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">السابق</span></li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $blogs->previousPageUrl() }}" aria-label="السابق">
                                    <span aria-hidden="true">&laquo;</span> السابق
                                </a>
                            </li>
                        @endif

                        {{-- أزرار الصفحات --}}
                        @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $blogs->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        {{-- زر "التالي" --}}
                        @if ($blogs->hasMorePages())
                            <li class="page-item">
                                <a class="gap-2 page-link flx-align flex-nowrap" href="{{ $blogs->nextPageUrl() }}"
                                    aria-label="التالي">
                                    التالــي <span class="icon line-height-1 font-20"><i
                                            class="las la-arrow-left"></i></span>
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled"><span class="page-link">التالي</span></li>
                        @endif
                    </ul>
                </nav>
            @endif
            <!-- Pagination End -->


        </div>
    </section>
    <!-- =========================== Blog Section End ========================== -->

    <!-- ======================== Brand Section Start ========================= -->
    <div class="brand ">
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
