@extends('front.layouts.master')
@section('title', 'الرئيسية ')
@section('content')
    <!--========================== Banner Section Start ==========================-->
    <section class="hero section-bg z-index-1">
        <div class="container container-two">
            <div class="row align-items-center gy-sm-5 gy-4">
                <div class="col-lg-6">
                    <div class="hero-inner position-relative pe-lg-5">
                        <div>
                            <h1 class="hero-inner__title"> أهلاً بك في متجر نايف
                            </h1>
                            <p class="hero-inner__desc font-18"> نقدم لك أسهل وأبسط وأسرع خدمة لزيادة المتابعين والتفاعل على
                                مواقع التواصل الاجتماعي في الوطن العربي. تيك توك، انستقرام، فيسبوك، تويتر، يوتيوب، سنابشات
                                متجر نايف هو أفضل وأرخص موقع لزيادة المتابعين</p>
                            <div class="position-relative">
                                <div class="search-box">
                                    <input type="text" id="search-input"
                                        class="common-input common-input--lg pill shadow-sm auto-suggestion-input"
                                        placeholder="ابحث عن خدمتك ...">
                                    <button type="submit" class="btn btn-main btn-icon icon border-0">
                                        <img src="{{ asset('assets/front/') }}/images/icons/search.svg" alt="">
                                    </button>
                                </div>
                                <div id="search-results" class="search-results-container"></div>
                            </div>
                            <script>
                                document.getElementById('search-input').addEventListener('input', function() {
                                    let query = this.value;
                                    if (query.length > 2) { // البحث يبدأ بعد إدخال 3 أحرف
                                        fetch(`/search?query=${query}`)
                                            .then(response => response.json())
                                            .then(data => {
                                                let resultsContainer = document.getElementById('search-results');
                                                resultsContainer.innerHTML = '';
                                                resultsContainer.style.display = 'block';

                                                if (data.length === 0) {
                                                    resultsContainer.innerHTML = '<div class="search-result-item">لا توجد نتائج</div>';
                                                } else {
                                                    data.forEach(service => {
                                                        let item = document.createElement('div');
                                                        item.classList.add('search-result-item');
                                                        item.innerHTML = `<strong>${service.name}</strong>`;
                                                        item.onclick = () => window.location.href = `/product/${service.slug}`;
                                                        resultsContainer.appendChild(item);
                                                    });
                                                }
                                            });
                                    } else {
                                        document.getElementById('search-results').style.display = 'none';
                                    }
                                });
                            </script>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 sub_hero">
                    <div class="hero-thumb">
                        <img class="hero_img" src="{{ asset('assets/front/') }}/images/hero_image.png" alt="">
                        <img src="{{ asset('assets/front/') }}/images/shapes/dots.png" alt=""
                            class="dotted-img white-version">
                        <img src="{{ asset('assets/front/') }}/images/shapes/dots-white.png" alt=""
                            class="dotted-img dark-version">
                        <img src="{{ asset('assets/front/') }}/images/shapes/element2.png" alt=""
                            class="element two end-0">

                        <div class="statistics animation bg-main text-center">
                            <h5 class="statistics__amount text-white"> اكثر من 50 الف </h5>
                            <span class="statistics__text text-white font-14"> عميل </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========================== Banner Section End ==========================-->
    <!-- ===================== Why Choose Us Start ========================== -->
    <section class="choose-us padding-y-120 position-relative z-index-1">
        <img src="{{ asset('assets/front/') }}/images/shapes/footer-shape2.png" alt=""
            class="position-absolute start-0 bottom-0 z-index--1">
        <div class="container container-two">

            <div class="section-heading style-three">
                <span class="section-heading__subtitle section-bg"> نحن الافضل </span>
                <h3 class="section-heading__title"> لماذا نحن </h3>
                <p class="section-heading__desc"> جميع الخدمات الاحترافية التي تحتاجها لتعزيز نشاطك التجاري بين كل منافسيك
                </p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-4 col-sm-6">
                    <div class="choose-us-item">
                        <div class="choose-us-item__thumb">
                            <img src="{{ asset('assets/front/') }}/images/investing.svg" alt="">
                        </div>
                        <div class="choose-us-item__content text-center">
                            <span class="choose-us-item__icon"><img
                                    src="{{ asset('assets/front/') }}/images/icons/choose-us-icon1.svg"
                                    alt=""></span>
                            <h5 class="choose-us-item__title my-3"> متجر متكامل </h5>
                            <p class="choose-us-item__desc"> جميع الخدمات الاحترافية التي تحتاجها لتعزيز نشاطك التجاري بين
                                كل منافسيك </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="choose-us-item">
                        <div class="choose-us-item__thumb">
                            <img src="{{ asset('assets/front/') }}/images/free.svg" alt="">
                        </div>
                        <div class="choose-us-item__content text-center">
                            <span class="choose-us-item__icon"><img
                                    src="{{ asset('assets/front/') }}/images/icons/choose-us-icon2.svg"
                                    alt=""></span>
                            <h5 class="choose-us-item__title my-3"> جربه مجاناً </h5>
                            <p class="choose-us-item__desc"> يمكنك استخدام الرصيد المجاني في تجربة كافة الخدمات المتاحة وقم
                                بشحن الرصيد فقط عندما تحتاج </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="choose-us-item">
                        <div class="choose-us-item__thumb">
                            <img src="{{ asset('assets/front/') }}/images/money.svg" alt="">
                        </div>
                        <div class="choose-us-item__content text-center">
                            <span class="choose-us-item__icon"><img
                                    src="{{ asset('assets/front/') }}/images/icons/choose-us-icon3.svg"
                                    alt=""></span>
                            <h5 class="choose-us-item__title my-3"> وفر المزيد </h5>
                            <p class="choose-us-item__desc"> حد أدنى للشحن لا يتجاوز دولار واحد . واحصل على العديد من
                                الهدايا عند الشحن </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== Why Choose Us End ========================== -->

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
                </div>
            </div>
        </div>
    </section>
    <!-- =========================== Arrival Product Section End ========================== -->
    <!-- ======================== popular Section Start =========================== -->
    <section class="popular padding-y-120 overflow-hidden category_section">
        <div class="container container-two">
            <div class="section-heading style-right mb-64">
                <h5 class="section-heading__title"> اقسام الخدمات </h5>
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
    </section>
    <!-- ======================== popular Section End =========================== -->

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
                </div>
            </div>


        </div>
    </section>
    <!-- =========================== Arrival Product Section End ========================== -->

    <!-- ======================== popular Section Start =========================== -->
    <section class="arrival-product padding-y-120 section-bg position-relative z-index-1 faqs">
        <div class="container container-two">
            <div class="section-heading style-right mb-64">
                <h5 class="section-heading__title"> الأسئلة الشائعة </h5>
                <p> نرد على الاستفسارات الخاصة بكم في صورة سؤال وجواب. </p>
            </div>
            <div class="accordion accordion-flush" id="accordionFlushExample">

                @foreach ($faqs as $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse{{ $faq['id'] }}" aria-expanded="false" aria-controls="flush-collapse{{ $faq['id'] }}">
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
