@extends('front.layouts.master')

@section('title', $meta['title'])
@section('description', $meta['description'])
@section('keywords', $meta['keywords'])
@section('category-active', 'active')
@section('content')
    <!-- ======================== Breadcrumb one Section Start ===================== -->
    <div class="container container-two" style="margin-top: 30px;">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="p-0 mb-0 bg-transparent breadcrumb" style="background: none;">
                        <li class="breadcrumb-item"><a href="/" class="text-muted">الرئيسية</a></li>
                        <i class="bi bi-chevron-left"></i>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">{{ $category['name'] }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- ======================== Breadcrumb one Section End ===================== -->
    <!-- ======================== All Product Section Start ====================== -->
    <section class="all-product">
        <div class="container container-two">
            <div class="row">
                <div class="col-lg-12">
                    <!-- =========================== Most Requested Services Section Start ========================== -->
                    @if (isset($category['subCategories']) && count($category['subCategories']) > 0)
                        @foreach ($category['subCategories'] as $subcategory)
                            @if ($subcategory->SubServicesProducts->count() > 0)
                                <section class="py-5 most-ordered-section">
                                    <div class="container">
                                        <div
                                            class="mb-2 most-ordered-title-bar d-flex align-items-center justify-content-center">
                                            <div class="most-ordered-title-line flex-grow-1"></div>
                                            <h4 class="mx-3 mb-0 most-ordered-title-text"> {{ $subcategory['name'] }} </h4>
                                            <div class="most-ordered-title-line flex-grow-1"></div>
                                        </div>
                                        <br>
                                        <div class="row g-4 justify-content-center">
                                            @forelse ($subcategory->SubServicesProducts as $service)
                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                    @include('front.partial.product-details', [
                                                        'service' => $service,
                                                    ])
                                                </div>
                                            @empty
                                                <div class="col-12">
                                                    <p class="text-center">لا توجد منتجات في هذا القسم الفرعي.</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </section>
                            @endif
                        @endforeach
                    @endif
                    <!-- =========================== Most Requested Services Section End ========================== -->
                </div>
            </div>
        </div>
    </section>
    <!-- ======================== All Product Section End ====================== -->
    <!-- =========================== Customer Reviews Section Start ========================== -->
    <section class="py-5">
        <div class="container">
            <div class="mb-5 d-flex align-items-center justify-content-center">
                <div style="height:2px;width:80px;background:#bcbcf1;"></div>
                <h4 class="mx-3 mb-0 most-ordered-title-text"> تقيمات العملاء </h4>
                <div style="height:2px;width:80px;background:#bcbcf1;"></div>
            </div>
            <div class="position-relative">
                <div class="swiper customer-reviews-swiper">
                    <div class="swiper-wrapper">

                        @foreach ($reviews as $review)
                            <div class="swiper-slide">
                                <div class="p-4 bg-white shadow rounded-3 position-relative h-100"
                                    style="border-bottom:6px solid #5c5ce6;">
                                    <div class="d-flex flex-column align-items-center">
                                        @if ($review->user)
                                            <img src="{{ asset('assets/front/uploads/person.jpg') }}"
                                                class="mb-3 rounded-circle" style="width:90px;height:90px;object-fit:cover;"
                                                alt="avatar">
                                        @else
                                            <img src="{{ asset('assets/front/uploads/person.jpg') }}"
                                                class="mb-3 rounded-circle" style="width:90px;height:90px;object-fit:cover;"
                                                alt="avatar">

                                        @endif
                                        <h5 class="mb-2 fw-bold"> {{ $review->name }} </h5>
                                    </div>
                                    <div class="mb-3 text-center text-gray-700 comment">
                                        {{ $review->description }}
                                    </div>
                                    <div class="mb-2 text-center">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $review->rate)
                                                <i class="fa fa-star text-warning"></i>
                                            @else
                                                <i class="fa fa-star text-gray" style="color: #bcbbbb"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
<!-- =========================== Customer Reviews Section End ========================== -->
<!-- Swiper JS (include in your layout or this page) -->
@section('js')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        new Swiper('.customer-reviews-swiper', {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1200: {
                    slidesPerView: 4
                }
            }
        });
    </script>
@endsection
