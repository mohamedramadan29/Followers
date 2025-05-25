@extends('front.layouts.master')
@section('title', 'المدونة ')
@section('content')
    <!-- ======================== Breadcrumb Two Section Start ===================== -->
    <section class="p-0 breadcrumb border-bottom d-block section-bg position-relative z-index-1">

        <div class="breadcrumb-two">
            <img src="{{ asset('assets/front/') }}/images/gradients/breadcrumb-gradient-bg.png" alt=""
                class="bg--gradient">
            <div class="container container-two">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="text-center breadcrumb-two-content">

                            <ul class="gap-2 mb-2 breadcrumb-list flx-align justify-content-center">
                                <li class="breadcrumb-list__item font-14 text-body">
                                    <a href="{{ url('/') }}" class="breadcrumb-list__link text-body hover-text-main">
                                        الرئيسيــة
                                    </a>
                                </li>
                                <li class="breadcrumb-list__item font-14 text-body">
                                    <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-left"></i></span>
                                </li>
                                <li class="breadcrumb-list__item font-14 text-body">
                                    <span class="breadcrumb-list__text"> المدونــة </span>
                                </li>
                            </ul>

                            <h3 class="mb-0 breadcrumb-two-content__title text-capitalize"> المدونـــة
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================== Breadcrumb Two Section End ===================== -->

    <!-- =========================== Blog Section Start ========================== -->
    <section class="overflow-hidden blog padding-y-120 section-bg position-relative z-index-1">
        <img src="{{ asset('assets/front/') }}/images/shapes/pattern-five.png"
            class="top-0 position-absolute end-0 z-index--1" alt="">
        <div class="container container-two">
            <div class="row gy-4">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-sm-6">
                        <div class="post-item">
                            <div class="post-item__thumb">
                                <a href="{{ url('blog/' . $blog['slug']) }}" class="link">
                                    <img src="{{ asset('assets/uploads/Blogs/' . $blog->image) }}" class="cover-img"
                                        alt="{{ $blog->name }}">
                                </a>
                            </div>
                            <div class="post-item__content">
                                <div class="post-item__top flx-align">
                                    <a href="{{ url('blog/' . $blog['slug']) }}"
                                        class="post-item__tag pill font-14 text-heading fw-500 hover-text-main">
                                        {{ $blog->category->name }} </a>
                                    <div class="gap-2 post-item__date font-14 flx-align text-heading fw-500">
                                        <span class="icon">
                                            <img src="{{ asset('assets/front/') }}/images/icons/calendar.svg" alt=""
                                                class="white-version">
                                            <img src="{{ asset('assets/front/') }}/images/icons/calendar-white.svg"
                                                alt="" class="dark-version">
                                        </span>
                                        <span class="text"> {{ $blog->created_at->translatedFormat('d F , Y') }} </span>
                                    </div>
                                </div>
                                <h5 class="post-item__title">
                                    <a href="{{ url('blog/' . $blog['slug']) }}" class="link"> {{ $blog->name }}</a>
                                </h5>
                                <a href="{{ url('blog/' . $blog['slug']) }}" class="btn btn-outline-light pill fw-600">
                                    قراءة
                                    المزيد </a>
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
