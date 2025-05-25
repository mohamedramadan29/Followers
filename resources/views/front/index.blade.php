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
                <h4 class="mx-3 mb-0 most-ordered-title-text"> الخدمات  </h4>
                <div class="most-ordered-title-line flex-grow-1"></div>
            </div>
            <div class="row g-4 justify-content-center">
                <!-- مثال لخدمة واحدة، كرر هذا البلوك لكل خدمة -->
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="text-center service-card">
                        <div class="mb-3 service-card__icon">
                            <img src="{{ asset('assets/front/images/icons/tiktok.png') }}" alt="فيسبوك"
                                class="service-icon-img">
                        </div>
                        <h6 class="mb-2 service-card__title">فيسبوك</h6>
                        <a href="#" class="service-card__btn">اطلب الآن ←</a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="text-center service-card">
                        <div class="mb-3 service-card__icon">
                            <img src="{{ asset('assets/front/images/icons/tiktok.png') }}" alt="تويتر"
                                class="service-icon-img">
                        </div>
                        <h6 class="mb-2 service-card__title">تويتر</h6>
                        <a href="#" class="service-card__btn">اطلب الآن ←</a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="text-center service-card">
                        <div class="mb-3 service-card__icon">
                            <img src="{{ asset('assets/front/images/icons/tiktok.png') }}" alt="تويتر"
                                class="service-icon-img">
                        </div>
                        <h6 class="mb-2 service-card__title">تويتر</h6>
                        <a href="#" class="service-card__btn">اطلب الآن ←</a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="text-center service-card">
                        <div class="mb-3 service-card__icon">
                            <img src="{{ asset('assets/front/images/icons/insta.png') }}" alt="تويتر"
                                class="service-icon-img">
                        </div>
                        <h6 class="mb-2 service-card__title">تويتر</h6>
                        <a href="#" class="service-card__btn">اطلب الآن ←</a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="text-center service-card">
                        <div class="mb-3 service-card__icon">
                            <img src="{{ asset('assets/front/images/icons/tiktok.png') }}" alt="تويتر"
                                class="service-icon-img">
                        </div>
                        <h6 class="mb-2 service-card__title">تويتر</h6>
                        <a href="#" class="service-card__btn">اطلب الآن ←</a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="text-center service-card">
                        <div class="mb-3 service-card__icon">
                            <img src="{{ asset('assets/front/images/icons/insta.png') }}" alt="تويتر"
                                class="service-icon-img">
                        </div>
                        <h6 class="mb-2 service-card__title">تويتر</h6>
                        <a href="#" class="service-card__btn">اطلب الآن ←</a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="text-center service-card">
                        <div class="mb-3 service-card__icon">
                            <img src="{{ asset('assets/front/images/icons/tiktok.png') }}" alt="تويتر"
                                class="service-icon-img">
                        </div>
                        <h6 class="mb-2 service-card__title">تويتر</h6>
                        <a href="#" class="service-card__btn">اطلب الآن ←</a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="text-center service-card">
                        <div class="mb-3 service-card__icon">
                            <img src="{{ asset('assets/front/images/icons/insta.png') }}" alt="تويتر"
                                class="service-icon-img">
                        </div>
                        <h6 class="mb-2 service-card__title">تويتر</h6>
                        <a href="#" class="service-card__btn">اطلب الآن ←</a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="text-center service-card">
                        <div class="mb-3 service-card__icon">
                            <img src="{{ asset('assets/front/images/icons/tiktok.png') }}" alt="تويتر"
                                class="service-icon-img">
                        </div>
                        <h6 class="mb-2 service-card__title">تويتر</h6>
                        <a href="#" class="service-card__btn">اطلب الآن ←</a>
                    </div>
                </div>
                <!-- كرر البلوك أعلاه لكل خدمة حسب الحاجة -->
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
                        <div class="swiper-slide">
                            <div class="text-center most-ordered-card">
                                <img src="{{ asset('assets/front/images/icons/insta.png') }}" class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على المنصة) + ضمان</div>
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
                                <img src="{{ asset('assets/front/images/icons/insta.png') }}" class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على المنصة) + ضمان</div>
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
                                <img src="{{ asset('assets/front/images/icons/insta.png') }}" class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على المنصة) + ضمان</div>
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
                                <img src="{{ asset('assets/front/images/icons/insta.png') }}" class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على المنصة) + ضمان</div>
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
                                <img src="{{ asset('assets/front/images/icons/insta.png') }}" class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على المنصة) + ضمان</div>
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
                                <img src="{{ asset('assets/front/images/icons/insta.png') }}" class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على المنصة) + ضمان</div>
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
                                <img src="{{ asset('assets/front/images/icons/insta.png') }}" class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على المنصة) + ضمان</div>
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
                                <img src="{{ asset('assets/front/images/icons/insta.png') }}" class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على المنصة) + ضمان</div>
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

    <!-- =========================== FAQ Section Start ========================== -->
    <section class="py-5 faq-section">
        <div class="container">
            <div class="mb-2 faq-title-bar d-flex align-items-center justify-content-center">
                <div class="faq-title-line flex-grow-1"></div>
                <h4 class="mx-3 mb-0 faq-title-text">الأسئلة الشائعة</h4>
                <div class="faq-title-line flex-grow-1"></div>
            </div>
            <div class="mb-3 text-center faq-desc">نرد على الاستفسارات الخاصة بكم في صورة سؤال وجواب.</div>
            <div class="accordion faq-list" id="faqAccordion">
                <div class="mb-2 accordion-item faq-item">
                    <h2 class="accordion-header" id="faqHeading1">
                        <button class="accordion-button faq-q collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="false" aria-controls="faqCollapse1">
                            ما هو متجر زيادة التفاعل وكيف يفيدني؟
                        </button>
                    </h2>
                    <div id="faqCollapse1" class="accordion-collapse collapse" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                        <div class="accordion-body faq-a">
                            متجر نية هو متجر متخصص يقدم لك خدمة زيادة المتابعين والتفاعل على جميع حساباتك على مواقع التواصل الاجتماعي (انستجرام - فيسبوك - تويتر وغيرها). كما يمكنك أيضاً زيادة التفاعل والمتابعين على منصات مشاهدات الفيديو يوتيوب - تيك توك - كواي وغيرها.
                        </div>
                    </div>
                </div>
                <div class="mb-2 accordion-item faq-item">
                    <h2 class="accordion-header" id="faqHeading2">
                        <button class="accordion-button faq-q collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                            أريد أن أقوم بتجربة هذه الخدمات أولاً قبل شرائها ماذا أفعل؟
                        </button>
                    </h2>
                    <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                        <div class="accordion-body faq-a">
                            يمكنك الاستفادة من الرصيد المجاني لتجربة الخدمات قبل الشراء.
                        </div>
                    </div>
                </div>
                <div class="mb-2 accordion-item faq-item">
                    <h2 class="accordion-header" id="faqHeading3">
                        <button class="accordion-button faq-q collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                            هل الخدمات المعروضة على متجر متجر زيادة التفاعل آمنة؟
                        </button>
                    </h2>
                    <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                        <div class="accordion-body faq-a">
                            نعم، جميع الخدمات آمنة ويتم تنفيذها بأعلى جودة وخصوصية.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =========================== FAQ Section End ========================== -->

    <!-- ======================== Old Service  Section Start =========================== -->
    {{-- <section class="overflow-hidden popular padding-y-120 category_section">
        <div class="container container-two">
            <div class="mb-64 section-heading style-right">
                <h5 class="section-heading__title"> الخدمات </h5>
            </div>
            <div class="popular-slider arrow-style-two row gy-4">
                @foreach ($categories as $category)
                    <div class="col-lg-2">
                        <a href="{{ url('category/' . $category['slug']) }}" class="popular-item w-100">
                            <span class="popular-item__icon">
                                <i class=""></i>
                                <img src="{{ asset('assets/uploads/category_images/' . $category['image']) }}"
                                    alt="">
                            </span>
                            <h6 class="popular-item__title font-18"> {{ $category['name'] }} </h6>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </section> --}}
    <!-- ======================== popular Section End =========================== -->

    <!-- =========================== Arrival Product Section Start ========================== -->
    <section class="arrival-product padding-y-120 section-bg position-relative z-index-1">
        <img src="{{ asset('assets/front/') }}/images/gradients/product-gradient.png" alt=""
            class="bg--gradient white-version">

        <img src="{{ asset('assets/front/') }}/images/shapes/element2.png" alt="" class="element one">

        <div class="container container-two">
            <div class="section-heading">
                <h3 class="section-heading__title"> أكثر الخدمات طلباً </h3>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab"
                    tabindex="0">
                    <div class="row gy-4">
                        @foreach ($bestservices as $service)
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
    <!-- =========================== Arrival Product Section Start ========================== -->
    <section class="arrival-product padding-y-120 section-bg position-relative z-index-1">
        <img src="{{ asset('assets/front/') }}/images/gradients/product-gradient.png" alt=""
            class="bg--gradient white-version">

        <img src="{{ asset('assets/front/') }}/images/shapes/element2.png" alt="" class="element one">

        <div class="container container-two">
            <div class="section-heading">
                <h3 class="section-heading__title"> احدث الخدمات </h3>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab"
                    tabindex="0">
                    <div class="row gy-4">
                        @foreach ($newservices as $service)
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

    <!-- ======================== popular Section Start =========================== -->
    <section class="arrival-product padding-y-120 section-bg position-relative z-index-1 faqs">
        <div class="container container-two">
            <div class="mb-64 section-heading style-right">
                <h5 class="section-heading__title"> الأسئلة الشائعة </h5>
                <p> نرد على الاستفسارات الخاصة بكم في صورة سؤال وجواب. </p>
            </div>
            <div class="accordion accordion-flush" id="accordionFlushExample">

                @foreach ($faqs as $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse{{ $faq['id'] }}" aria-expanded="false"
                                aria-controls="flush-collapse{{ $faq['id'] }}">
                                {{ $faq['title'] }}
                            </button>
                        </h2>
                        <div id="flush-collapse{{ $faq['id'] }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                {!! $faq['content'] !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- ======================== popular Section End =========================== -->
@endsection
@section('js')
    <!-- SwiperJS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
                    576: { slidesPerView: 2 },
                    992: { slidesPerView: 3 },
                    1200: { slidesPerView: 4 }
                }
            });
        });
    </script>
@endsection
