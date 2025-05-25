@extends('front.layouts.master')

@section('title')
    {{ $category->name }}
@endsection
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
    <section class="all-product padding-y-120">
        <div class="container container-two">
            <div class="row">
                <div class="col-lg-12">
                    <!-- =========================== Most Requested Services Section Start ========================== -->
                    <section class="py-5 most-ordered-section">
                        <div class="container">
                            <div class="mb-2 most-ordered-title-bar d-flex align-items-center justify-content-center">
                                <div class="most-ordered-title-line flex-grow-1"></div>
                                <h4 class="mx-3 mb-0 most-ordered-title-text"> قسم زيادة المتابعين </h4>
                                <div class="most-ordered-title-line flex-grow-1"></div>
                            </div>
                            <br>
                            <div class="row g-4 justify-content-center">
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
                    <section class="py-5 most-ordered-section">
                        <div class="container">
                            <div class="mb-2 most-ordered-title-bar d-flex align-items-center justify-content-center">
                                <div class="most-ordered-title-line flex-grow-1"></div>
                                <h4 class="mx-3 mb-0 most-ordered-title-text"> قسم زيادة المتابعين </h4>
                                <div class="most-ordered-title-line flex-grow-1"></div>
                            </div>
                            <br>
                            <div class="row g-4 justify-content-center">
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
                    <!-- =========================== Most Requested Services Section End ========================== -->
                    <!-- عرض الأقسام الفرعية مع المنتجات -->
                    @if (isset($category['subCategories']) && count($category['subCategories']) > 0)
                        @foreach ($category['subCategories'] as $subcategory)
                            <div class="mb-5">
                                <h5 class="mb-4"
                                    style="border-right: 3px solid #bcbcf1; padding-right: 20px; font-weight: bold;">
                                    {{ $subcategory['name'] }}</h5>
                                <div class="row gy-4 list-grid-wrapper">
                                    @forelse ($subcategory->SubServicesProducts as $service)
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="product-item section-bg">
                                                <div class="product-item__thumb d-flex">
                                                    <a href="{{ url('product/' . $service['slug']) }}"
                                                        class="link w-100">
                                                        <img src="{{ asset('assets/uploads/Product_images/' . $service['image']) }}"
                                                            alt="" class="cover-img">
                                                    </a>
                                                    <button type="button" class="product-item__wishlist"><i
                                                            class="fas fa-heart"></i></button>
                                                </div>
                                                <div class="product-item__content">
                                                    <h6 class="product-item__title">
                                                        <a href="{{ url('product/' . $service['slug']) }}"
                                                            class="link">{{ $service['name'] }}</a>
                                                    </h6>
                                                    <div class="gap-2 product-item__info flx-between">
                                                        <div class="gap-2 flx-align">
                                                            {{-- <h6 class="mb-0 product-item__price"> 100 $ </h6> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <p class="text-center">لا توجد منتجات في هذا القسم الفرعي.</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- إذا لم يوجد أقسام فرعية، عرض المنتجات مباشرة -->
                        <div class="row gy-4 list-grid-wrapper">
                            @forelse ($category['products'] as $service)
                                <div class="col-xl-3 col-sm-6">
                                    <div class="product-item section-bg">
                                        <div class="product-item__thumb d-flex">
                                            <a href="{{ url('product/' . $service['slug']) }}" class="link w-100">
                                                <img src="{{ asset('assets/uploads/Product_images/' . $service['image']) }}"
                                                    alt="" class="cover-img">
                                            </a>
                                            <button type="button" class="product-item__wishlist"><i
                                                    class="fas fa-heart"></i></button>
                                        </div>
                                        <div class="product-item__content">
                                            <h6 class="product-item__title">
                                                <a href="{{ url('product/' . $service['slug']) }}" class="link">
                                                    {{ $service['name'] }} </a>
                                            </h6>
                                            <div class="gap-2 product-item__info flx-between">
                                                <div class="gap-2 flx-align">
                                                    {{-- <h6 class="mb-0 product-item__price"> 100 $ </h6> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-center">لا توجد منتجات في هذا القسم.</p>
                                </div>
                            @endforelse
                        </div>
                    @endif
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

                        <div class="swiper-slide">
                            <div class="p-4 bg-white shadow rounded-3 position-relative h-100"
                                style="border-bottom:6px solid #5c5ce6;">
                                <div class="d-flex flex-column align-items-center">
                                    <img src="{{ asset('assets/front/uploads/person.jpg') }}" class="mb-3 rounded-circle"
                                        style="width:90px;height:90px;object-fit:cover;" alt="avatar">
                                    <h5 class="mb-2 fw-bold"> محمد رمضان </h5>
                                </div>
                                <div class="mb-3 text-center text-gray-700 comment">
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                    على الشكل الخارجي للنص.
                                </div>
                                <div class="mb-2 text-center">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="p-4 bg-white shadow rounded-3 position-relative h-100"
                                style="border-bottom:6px solid #5c5ce6;">
                                <div class="d-flex flex-column align-items-center">
                                    <img src="{{ asset('assets/front/uploads/person.jpg') }}" class="mb-3 rounded-circle"
                                        style="width:90px;height:90px;object-fit:cover;" alt="avatar">
                                    <h5 class="mb-2 fw-bold"> محمد رمضان </h5>
                                </div>
                                <div class="mb-3 text-center text-gray-700 comment">
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                    على الشكل الخارجي للنص.
                                </div>
                                <div class="mb-2 text-center">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="p-4 bg-white shadow rounded-3 position-relative h-100"
                                style="border-bottom:6px solid #5c5ce6;">
                                <div class="d-flex flex-column align-items-center">
                                    <img src="{{ asset('assets/front/uploads/person.jpg') }}" class="mb-3 rounded-circle"
                                        style="width:90px;height:90px;object-fit:cover;" alt="avatar">
                                    <h5 class="mb-2 fw-bold"> محمد رمضان </h5>
                                </div>
                                <div class="mb-3 text-center text-gray-700 comment">
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                    على الشكل الخارجي للنص.
                                </div>
                                <div class="mb-2 text-center">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="p-4 bg-white shadow rounded-3 position-relative h-100"
                                style="border-bottom:6px solid #5c5ce6;">
                                <div class="d-flex flex-column align-items-center">
                                    <img src="{{ asset('assets/front/uploads/person.jpg') }}" class="mb-3 rounded-circle"
                                        style="width:90px;height:90px;object-fit:cover;" alt="avatar">
                                    <h5 class="mb-2 fw-bold"> محمد رمضان </h5>
                                </div>
                                <div class="mb-3 text-center text-gray-700 comment">
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                    على الشكل الخارجي للنص.
                                </div>
                                <div class="mb-2 text-center">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="p-4 bg-white shadow rounded-3 position-relative h-100"
                                style="border-bottom:6px solid #5c5ce6;">
                                <div class="d-flex flex-column align-items-center">
                                    <img src="{{ asset('assets/front/uploads/person.jpg') }}" class="mb-3 rounded-circle"
                                        style="width:90px;height:90px;object-fit:cover;" alt="avatar">
                                    <h5 class="mb-2 fw-bold"> محمد رمضان </h5>
                                </div>
                                <div class="mb-3 text-center text-gray-700 comment">
                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                    على الشكل الخارجي للنص.
                                </div>
                                <div class="mb-2 text-center">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>

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
