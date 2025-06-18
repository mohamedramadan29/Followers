@extends('front.layouts.master')
@section('title', 'الرئيسية ')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/front/css/new-custome.css') }}">
@endsection
@section('content')
    <!--========================== Banner Section Start ==========================-->
    <section class="hero-custom">
        <div class="container">
            <div class="flex-row-reverse row align-items-center">
                <div class="mb-4 text-center col-lg-6 text-lg-end mb-lg-0">
                    <img src="{{ asset('assets/front/images/hero.png') }}" alt="برمجة وتفاعل"
                        class="hero-custom-img img-fluid">
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-3 hero-custom-title">
                        <span>أهلاً بك في</span>
                        <span class="hero-custom-highlight">متجر زيادة التفاعل</span>
                    </h1>
                    <p class="mb-4 hero-custom-desc">
                        نقدم لك أسهل وأبسط وأسرع خدمة لزيادة المتابعين والتفاعل على مواقع التواصل الاجتماعي في الوطن
                        العربي. تيك توك، انستقرام، فيسبوك، تويتر، يوتيوب، سنابشات متجر زيادة التفاعل هو أفضل وأرخص موقع
                        لزيادة المتابعين.
                    </p>
                    <a href="#" class="btn hero-custom-btn">جرب الآن</a>
                </div>
            </div>
        </div>
    </section>
    <!--========================== Banner Section End ==========================-->
    <!-- ===================== Why Choose Us Start ========================== -->
    <section class="choose-us-section custom-why-choose padding-y-120 position-relative z-index-1">
        <div class="container">

            <div class="row justify-content-center gy-4">
                <div class="col-lg-4 col-md-6">
                    <div class="text-center choose-box h-100">
                        <div class="mb-3 choose-box__icon">
                            <img src="{{ asset('assets/front/images/icons/about1.png') }}" alt="متجر متكامل"
                                class="choose-icon-img">
                        </div>
                        <h5 class="mb-3 choose-box__title"> متجر متكامل </h5>
                        <p class="choose-box__desc"> "جميع الخدمات الاحترافية التي تحتاجها لتعزيز نشاطك التجاري بين كل
                            منافسيك، وتحقق نتائج ملموسة تضمن لك التفوق والاستمرارية." </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="text-center choose-box h-100 choose-box--active">
                        <div class="mb-3 choose-box__icon">
                            <img src="{{ asset('assets/front/images/icons/about2.png') }}" alt="جربه مجاناً"
                                class="choose-icon-img">
                        </div>
                        <h5 class="mb-3 choose-box__title"> جربه مجاناً </h5>
                        <p class="choose-box__desc"> "هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما
                            سيلهي القارئ عن التركيز على الشكل الخارجي." </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="text-center choose-box h-100">
                        <div class="mb-3 choose-box__icon">
                            <img src="{{ asset('assets/front/images/icons/about3.png') }}" alt="وفر المزيد"
                                class="choose-icon-img">
                        </div>
                        <h5 class="mb-3 choose-box__title"> وفر المزيد </h5>
                        <p class="choose-box__desc"> "حد أدنى للشحن لا يتجاوز دولار واحد، واحصل على العديد من الهدايا
                            عند الشحن، مع سرعة توصيل مضمونة وخدمة عملاء على مدار الساعة." </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== Why Choose Us End ========================== -->
    <!-- ===================== Services Section Start ========================== -->
    <section class="py-5 services-section">
        <div class="container">
            <div class="mb-2 most-ordered-title-bar d-flex align-items-center justify-content-center">
                <div class="most-ordered-title-line flex-grow-1"></div>
                <h4 class="mx-3 mb-0 most-ordered-title-text"> الخدمات </h4>
                <div class="most-ordered-title-line flex-grow-1"></div>
            </div>
            <div class="mt-4 row g-4 justify-content-center">
                <!-- مثال لخدمة واحدة، كرر هذا البلوك لكل خدمة -->
                @foreach ($categories as $category)
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="text-center service-card">
                            <div class="mb-3 service-card__icon">
                                <img src="{{ $category->Image() }}" alt="{{ $category->name }}" class="service-icon-img">
                            </div>
                            <h6 class="mb-2 service-card__title">{{ $category->name }}</h6>
                            <a href="{{ url('category/' . $category['slug']) }}" class="service-card__btn">اطلب الآن ←</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ===================== Services Section End ========================== -->


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
                        @foreach ($bestservices as $service)
                            <div class="swiper-slide">
                                @include('front.partial.product-details', ['service' => $service])
                            </div>
                        @endforeach
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

    <!-- =========================== FAQ Section Start ========================== -->
    @livewire('front.livewire-event.show-count-faq')
    <!-- =========================== FAQ Section End ========================== -->
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
@endsection
