@extends('front.layouts.master')
@section('title')
    {{ $service['name'] }}
@endsection
@section('content')
    <!-- ======================== Breadcrumb one Section Start ===================== -->
    <div class="container container-two" style="margin-top: 30px;">
        <div class="row">
            <div class="col-12">
                <ul class="gap-2 mb-2 breadcrumb-list flx-align breadcrumb">
                    <li class="breadcrumb-list__item font-14 text-body">
                        <a href="{{ url('/') }}" class="breadcrumb-list__link text-body hover-text-main"> الرئيسية
                        </a>
                    </li>
                    <li class="breadcrumb-list__item font-14 text-body">
                        <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                    </li>
                    <li class="breadcrumb-list__item font-14 text-body">
                        <a href="{{ url('category/' . $service['Main_Category']['slug']) }}"
                            class="breadcrumb-list__link text-body hover-text-main">
                            {{ $service['Main_Category']['name'] }} </a>
                    </li>
                    <li class="breadcrumb-list__item font-14 text-body">
                        <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                    </li>
                    <li class="breadcrumb-list__item font-14 text-body breadcrumb-item active">
                        <span class="breadcrumb-list__text"> {{ $service['name'] }} </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ======================== Breadcrumb one Section End ===================== -->
    <!-- ======================= Product Details Section Start ==================== -->
    <div class="mt-32 product-details padding-b-120">
        <div class="container container-two">
            <div class="row gy-4">
                <div class="col-lg-5">
                    <div class="product-details__thumb">
                        <img src="{{ asset('assets/uploads/Product_images/' . $service['image']) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <!-- ======================= Product Sidebar Start ========================= -->
                    <div class="product-details-section">
                        <h4> {{ $service['name'] }} </h4>
                        <div class="product-sidebar section-bg">
                            <div class="container container-two">
                                <div class="wishlist">
                                  @livewire('front.livewire-event.wishtlist',['service' => $service])
                                </div>
                                <div class="gap-2 breadcrumb-tab flx-wrap align-items-start gap-lg-4">
                                    <ul class="nav tab-bordered nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-price-select-tab"
                                                data-bs-toggle="pill" data-bs-target="#pills-price-select" type="button"
                                                role="tab" aria-controls="pills-price-select" aria-selected="true">
                                                <i class="bi bi-gear-wide-connected"></i>
                                                الخيــــارات </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-product-details-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-product-details" type="button" role="tab"
                                                aria-controls="pills-product-details" aria-selected="true">
                                                <i class="bi bi-book"></i>
                                                الوصف
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-rating-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-rating" type="button" role="tab"
                                                aria-controls="pills-rating" aria-selected="false">
                                                <span class="gap-1 d-flex align-items-center">
                                                    <i class="bi bi-star"></i>
                                                    التقيمــات </span>
                                                </span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                @if (Session::has('Success_message'))
                                    <div class="success-purches" id="success-purches">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4> تم إرسال طلبك بنجاح </h4>
                                            <i style="cursor: pointer;" class="bi bi-x-square" id="closeSuccessMessage"></i>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li>رقم الطلب: <span>{{ session('order')->order_number }}</span></li>
                                            <li>الخدمة: <span>{{ session('order')->name }}</span></li>
                                            <li>الرابط: <span>{{ session('order')->page_link }}</span></li>
                                            <li>الكمية: <span>{{ session('order')->quantity }}</span></li>
                                            <li>سعر الطلب: <span>{{ session('order')->total_price }} $</span></li>
                                            <li>الرصيد المتبقي: <span>{{ session('order')->user->balance }} $</span></li>
                                        </ul>
                                    </div>
                                @endif
                                <div class="tab-content" id="pills-tabContent">

                                    <div class="tab-pane fade show active" id="pills-price-select" role="tabpanel"
                                        aria-labelledby="pills-price-select-tab" tabindex="0">
                                        <br>
                                        @livewire('front.livewire-event.product-details', ['slug' => $service['slug']])
                                    </div>
                                    <div class="tab-pane fade" id="pills-product-details" role="tabpanel"
                                        aria-labelledby="pills-product-details-tab" tabindex="0">
                                        <!-- Product Details Content Start -->
                                        <div class="product-details">

                                            <p class="product-details__desc">
                                                {!! $service['description'] !!}
                                            </p>
                                            {{--
                                            <div class="product-details__item">
                                                <h5 class="mb-3 product-details__title"> مميزات خدمتنا </h5>
                                                <ul class="product-list">
                                                    <li class="product-list__item"> متابعون آمنون وفعّالون: نضمن جودة
                                                        الخدمة مع
                                                        الحفاظ على أمان حسابك بالكامل. </li>
                                                    <li class="product-list__item"> دعم فني دائم: فريقنا متاح على مدار
                                                        الساعة
                                                        لضمان تجربة سلسة وخالية من المشاكل. </li>
                                                    <li class="product-list__item"> سرعة التنفيذ: تحقيق النتائج بشكل فوري
                                                        لضمان
                                                        رضاك التام. </li>
                                                    <li class="product-list__item"> أسعار تنافسية: خدمات بجودة عالية
                                                        وبأسعار
                                                        تناسب الجميع. </li>
                                                </ul>
                                            </div> --}}
                                            <div class="product-details__item">
                                                <h5 class="mb-3 product-details__title"> الأمان والخصوصية </h5>
                                                <ul class="product-list">
                                                    <li class="product-list__item"> تجربة آمنة تمامًا: نلتزم بأعلى معايير
                                                        الأمان لضمان خصوصية حسابك وحمايته أثناء الخدمة. </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Product Details Content End -->
                                    </div>
                                    <br>
                                    <div class="tab-pane fade" id="pills-rating" role="tabpanel"
                                        aria-labelledby="pills-rating-tab" tabindex="0">
                                        <div class="mt-4 product-reviews">
                                            @if ($service->Reviews->count() > 0)
                                                @foreach ($service->reviews as $review)
                                                    <!-- Single Review -->
                                                    <div
                                                        class="mb-3 review-item d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <div class="reviewer-avatar">
                                                                @if ($review->user)
                                                                    <img src="{{ asset('assets/front/uploads/person.jpg') }}"
                                                                        class="mb-3 rounded-circle" alt="avatar"
                                                                        style="border-radius: 50%;" width="40"
                                                                        height="40">
                                                                @else
                                                                    <img src="{{ asset('assets/front/uploads/person.jpg') }}"
                                                                        class="mb-3 rounded-circle" alt="avatar"
                                                                        style="border-radius: 50%;" width="40"
                                                                        height="40">
                                                                @endif
                                                            </div>
                                                            <div class="mx-3 review-content">
                                                                <div class="reviewer-name"> {{ $review->name }} </div>
                                                                <div class="review-stars">
                                                                    @for ($i = 0; $i < 5; $i++)
                                                                        @if ($i < $review->rate)
                                                                            <i class="fas fa-star text-warning"></i>
                                                                        @else
                                                                            <i class="fas fa-star text-gray"
                                                                                style="color: #bcbbbb"></i>
                                                                        @endif
                                                                    @endfor
                                                                </div>
                                                                <p> {{ $review->description }} </p>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="review-rating"> <button
                                                                    class="btn btn-success btn-sm"> <i
                                                                        class="bi bi-check2-circle"></i> قام بالشراء
                                                                </button>
                                                            </div>
                                                            <div class="review-time text-muted">
                                                                {{ $review->created_at->diffForHumans() }} </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div
                                                    class="mb-3 review-item d-flex justify-content-between align-items-center">
                                                    <div class="">
                                                        لا يوجد تقيمات علي الخدمة في الوقت الحالي
                                                    </div>
                                                </div>
                                            @endif

                                        </div>

                                        <style>

                                        </style>
                                    </div>
                                    <div class="tab-pane fade" id="pills-comments" role="tabpanel"
                                        aria-labelledby="pills-comments-tab" tabindex="0">
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ======================= Product Sidebar End ========================= -->
            </div>
        </div>

        <!-- ======================= Product Details Section End ==================== -->

        <!-- =========================== Most Requested Services Section Start ========================== -->
        <section class="py-5 most-ordered-section">
            <div class="container">
                <div class="mb-2 most-ordered-title-bar d-flex align-items-center justify-content-center">
                    <div class="most-ordered-title-line flex-grow-1"></div>
                    <h4 class="mx-3 mb-0 most-ordered-title-text">أكثر الخدمات طلباً</h4>
                    <div class="most-ordered-title-line flex-grow-1"></div>
                </div>
                <div class="mb-3 text-center most-ordered-desc">نحن نفخر بأنفسنا لتقديم خدمة رائعة</div>
                <div class="most-ordered-slider position-relative">
                    <div class="swiper most-ordered-swiper">
                        <div class="swiper-wrapper">
                            <!-- كرر هذا البلوك لكل خدمة -->
                            <div class="swiper-slide">
                                <div class="text-center most-ordered-card">
                                    <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                        class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                    <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                    <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على
                                        المنصة) + ضمان</div>
                                    <div class="mt-2 mb-1 most-ordered-rating">
                                        <span>(30)</span>
                                        <span class="stars ms-1">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="most-ordered-price">100 / <span class="text-primary">0.00#</span></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center most-ordered-card">
                                    <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                        class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                    <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                    <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على
                                        المنصة) + ضمان</div>
                                    <div class="mt-2 mb-1 most-ordered-rating">
                                        <span>(30)</span>
                                        <span class="stars ms-1">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="most-ordered-price">100 / <span class="text-primary">0.00#</span></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center most-ordered-card">
                                    <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                        class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                    <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                    <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على
                                        المنصة) + ضمان</div>
                                    <div class="mt-2 mb-1 most-ordered-rating">
                                        <span>(30)</span>
                                        <span class="stars ms-1">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="most-ordered-price">100 / <span class="text-primary">0.00#</span></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center most-ordered-card">
                                    <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                        class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                    <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                    <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على
                                        المنصة) + ضمان</div>
                                    <div class="mt-2 mb-1 most-ordered-rating">
                                        <span>(30)</span>
                                        <span class="stars ms-1">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="most-ordered-price">100 / <span class="text-primary">0.00#</span></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center most-ordered-card">
                                    <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                        class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                    <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                    <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على
                                        المنصة) + ضمان</div>
                                    <div class="mt-2 mb-1 most-ordered-rating">
                                        <span>(30)</span>
                                        <span class="stars ms-1">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="most-ordered-price">100 / <span class="text-primary">0.00#</span></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center most-ordered-card">
                                    <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                        class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                    <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                    <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على
                                        المنصة) + ضمان</div>
                                    <div class="mt-2 mb-1 most-ordered-rating">
                                        <span>(30)</span>
                                        <span class="stars ms-1">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="most-ordered-price">100 / <span class="text-primary">0.00#</span></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center most-ordered-card">
                                    <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                        class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                    <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                    <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على
                                        المنصة) + ضمان</div>
                                    <div class="mt-2 mb-1 most-ordered-rating">
                                        <span>(30)</span>
                                        <span class="stars ms-1">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="most-ordered-price">100 / <span class="text-primary">0.00#</span></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center most-ordered-card">
                                    <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                        class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                    <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                    <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على
                                        المنصة) + ضمان</div>
                                    <div class="mt-2 mb-1 most-ordered-rating">
                                        <span>(30)</span>
                                        <span class="stars ms-1">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="most-ordered-price">100 / <span class="text-primary">0.00#</span></div>
                                </div>
                            </div>
                            <!-- ... كرر البطاقات حسب الحاجة ... -->
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =========================== Most Requested Services Section End ========================== -->

        <!-- =========================== Arrival Product Section Start ========================== -->
        <section class="arrival-product padding-y-120 section-bg position-relative z-index-1">
            <img src="{{ asset('assets/front/') }}/images/gradients/product-gradient.png" alt=""
                class="bg--gradient white-version">

            <img src="{{ asset('assets/front/') }}/images/shapes/element2.png" alt="" class="element one">

            <div class="container container-two">
                <div class="section-heading">
                    <h3 class="section-heading__title"> اشتري المستخدمون ايضا </h3>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                        aria-labelledby="pills-all-tab" tabindex="0">
                        <div class="row gy-4">
                            @foreach ($samservices as $service)
                                <div class="col-xl-3 col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="product-item__thumb d-flex">
                                            <a href="{{ url('product/' . $service['slug']) }}" class="link w-100">
                                                <img src="{{ asset('assets/uploads/Product_images/' . $service['image']) }}"
                                                    alt="{{ $service['name'] }}" class="cover-img">
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
                                                    {{-- <span
                                            class="product-item__prevPrice text-decoration-line-through">$259</span> --}}
                                                </div>
                                            </div>
                                            {{-- <div class="gap-2 product-item__bottom flx-between">
                                    <div>
                                        <span class="mb-2 product-item__sales font-14">1200 مبيعة </span>
                                        <div class="gap-1 d-flex align-items-center">
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
                    </div>
                </div>
            </div>
        </section>
        <!-- =========================== Arrival Product Section End ========================== -->
    @endsection


    @section('js')
        <!-- SwiperJS CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new Swiper('.most-ordered-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 24,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    autoplay: {
                        delay: 1500,
                        disableOnInteraction: false,
                    },
                    loop: true,
                    breakpoints: {
                        576: {
                            slidesPerView: 2
                        },
                        992: {
                            slidesPerView: 3
                        },
                        1200: {
                            slidesPerView: 4
                        }
                    }
                });
            });
        </script>
        <script>
            document.getElementById('closeSuccessMessage').addEventListener('click', function() {
                document.getElementById('success-purches').style.display = 'none';
            });
        </script>
    @endsection
