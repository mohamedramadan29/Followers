@extends('front.layouts.master')

@section('title')
    {{ $category->name }}
@endsection
@section('content')
    <!-- ======================== Breadcrumb one Section Start ===================== -->
    <section class="breadcrumb breadcrumb-one padding-y-60 section-bg position-relative z-index-1 overflow-hidden">
        <img src="{{ asset('assets/front/') }}/images/gradients/breadcrumb-gradient-bg.png" alt=""
            class="bg--gradient">
        <img src="{{ asset('assets/front/') }}/images/shapes/element-moon3.png" alt="" class="element one">
        <img src="{{ asset('assets/front/') }}/images/shapes/element-moon1.png" alt="" class="element three">
        <div class="container container-two">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="breadcrumb-one-content">
                        <h3 class="breadcrumb-one-content__title text-center mb-3 text-capitalize"> خدمات
                            {{ $category['name'] }} </h3>
                        <p class="breadcrumb-one-content__desc text-center text-black-three">
                            {{ $category['description'] }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================== Breadcrumb one Section End ===================== -->
    <!-- ======================== All Product Section Start ====================== -->
    <section class="all-product padding-y-120">
        <div class="container container-two">
            <div class="row">
                <div class="col-lg-12">
                    <div class="filter-tab gap-3 flx-between">
                        <ul class="nav common-tab nav-pills mb-0 gap-lg-2 gap-1 ms-lg-auto" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-product-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-product" type="button" role="tab"
                                    aria-controls="pills-product" aria-selected="true"> جميع المنتجات </button>
                            </li>
                            @foreach ($category['subCategories'] as $subcategory)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-{{ $subcategory['id'] }}-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-{{ $subcategory['id'] }}" type="button" role="tab"
                                        aria-controls="pills-{{ $subcategory['id'] }}" aria-selected="false">
                                        {{ $subcategory['name'] }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-product" role="tabpanel"
                            aria-labelledby="pills-product-tab" tabindex="0">
                            <div class="row gy-4 list-grid-wrapper">
                                @foreach ($category['products'] as $service)
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="product-item section-bg">
                                            <div class="product-item__thumb d-flex">
                                                <a href="{{ url('product/'.$service['slug']) }}" class="link w-100">
                                                    <img src="{{ asset('assets/uploads/Product_images/'.$service['image']) }}" alt=""
                                                        class="cover-img">
                                                </a>
                                                <button type="button" class="product-item__wishlist"><i
                                                        class="fas fa-heart"></i></button>
                                            </div>
                                            <div class="product-item__content">
                                                <h6 class="product-item__title">
                                                    <a href="{{ url('product/'.$service['slug']) }}" class="link">  {{ $service['name'] }} </a>
                                                </h6>
                                                <div class="product-item__info flx-between gap-2">

                                                    <div class="flx-align gap-2">
                                                        {{-- <h6 class="product-item__price mb-0"> 100 $ </h6> --}}
                                                        {{-- <span
                                                            class="product-item__prevPrice text-decoration-line-through">$259</span> --}}
                                                    </div>
                                                </div>
                                                {{-- <div class="product-item__bottom flx-between gap-2">
                                                    <div>
                                                        <span class="product-item__sales font-14 mb-2">1200 مبيعة </span>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <ul class="star-rating">
                                                                <li class="star-rating__item font-11"><i
                                                                        class="fas fa-star"></i></li>
                                                                <li class="star-rating__item font-11"><i
                                                                        class="fas fa-star"></i></li>
                                                                <li class="star-rating__item font-11"><i
                                                                        class="fas fa-star"></i></li>
                                                                <li class="star-rating__item font-11"><i
                                                                        class="fas fa-star"></i></li>
                                                                <li class="star-rating__item font-11"><i
                                                                        class="fas fa-star"></i></li>
                                                            </ul>
                                                            <span class="star-rating__text text-heading fw-500 font-14">
                                                                (16)
                                                            </span>
                                                        </div>
                                                    </div>

                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Pagination Start -->
                            <nav aria-label="Page navigation example">
                                <ul class="pagination common-pagination">
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link flx-align gap-2 flex-nowrap" href="#"> التالي
                                            <span class="icon line-height-1 font-20"><i
                                                    class="las la-arrow-left"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- Pagination End -->
                        </div>
                        @foreach ($category['subCategories'] as $subcategory)
                            <div class="tab-pane fade" id="pills-{{ $subcategory['id'] }}" role="tabpanel"
                                aria-labelledby="pills-{{ $subcategory['id'] }}-tab" tabindex="0">
                                <div class="row gy-4 list-grid-wrapper">
                                    @foreach ($subcategory->SubServicesProducts as $serv)
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="product-item section-bg">
                                                <div class="product-item__thumb d-flex">
                                                    <a href="{{ url('product/'.$serv['slug']) }}" class="link w-100">
                                                        <img src="{{ asset('assets/uploads/Product_images/'.$service['image']) }}" alt=""
                                                        class="cover-img">
                                                    </a>
                                                    <button type="button" class="product-item__wishlist"><i
                                                            class="fas fa-heart"></i></button>
                                                </div>
                                                <div class="product-item__content">
                                                    <h6 class="product-item__title">
                                                        <a href="{{ url('product/'.$serv['slug']) }}" class="link"> {{ $service['name'] }}</a>
                                                    </h6>
                                                    <div class="product-item__info flx-between gap-2">

                                                        <div class="flx-align gap-2">
                                                            <h6 class="product-item__price mb-0">$120</h6>
                                                            {{-- <span
                                                                class="product-item__prevPrice text-decoration-line-through">$259</span> --}}
                                                        </div>
                                                    </div>
                                                    {{-- <div class="product-item__bottom flx-between gap-2">
                                                        <div>
                                                            <span class="product-item__sales font-14 mb-2">1200 مبيعة
                                                            </span>
                                                            <div class="d-flex align-items-center gap-1">
                                                                <ul class="star-rating">
                                                                    <li class="star-rating__item font-11"><i
                                                                            class="fas fa-star"></i></li>
                                                                    <li class="star-rating__item font-11"><i
                                                                            class="fas fa-star"></i></li>
                                                                    <li class="star-rating__item font-11"><i
                                                                            class="fas fa-star"></i></li>
                                                                    <li class="star-rating__item font-11"><i
                                                                            class="fas fa-star"></i></li>
                                                                    <li class="star-rating__item font-11"><i
                                                                            class="fas fa-star"></i></li>
                                                                </ul>
                                                                <span
                                                                    class="star-rating__text text-heading fw-500 font-14">
                                                                    (16)
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================== All Product Section End ====================== -->
@endsection
