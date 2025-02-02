@extends('front.layouts.master')
@section('title', ' عدّاد متابعين انستقرام ')
@section('content')

    <!--========================== Banner Section Start ==========================-->
    <section class="hero section-bg z-index-1">
        <div class="container container-two">
            <div class="row align-items-center gy-sm-5 gy-4">
                <div class="col-lg-6">
                    <div class="hero-inner position-relative pe-lg-5">
                        <div>
                            <h1 class="hero-inner__title"> عدّاد متابعين انستقرام
                            </h1>
                            <p class="hero-inner__desc font-18"> عدّاد متابعين انستقرام للوقت الحقيقي والمفصل والدقيق. لا
                                حاجة لتسجيل الدخول إلى حسابك انستقرام. </p>
                            <div class="position-relative">
                                <form action="{{ url('instagramCounter') }}" method="post">
                                    @csrf
                                    <div class="search-box">
                                        <input type="text" required
                                            class="common-input common-input--lg pill shadow-sm auto-suggestion-input"
                                            placeholder="  ادخل اسم المستخدم في انستقرام  " name="username" value="">
                                        <button type="submit" class="btn btn-main btn-icon icon border-0"><img
                                                src="{{ asset('assets/front/') }}/images/icons/search.svg" alt="">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 sub_hero">
                    <div class="hero-thumb">
                        <img class="hero_img" src="{{ asset('assets/front/') }}/images/insta.png" alt="">
                        <img src="{{ asset('assets/front/') }}/images/shapes/dots.png" alt=""
                            class="dotted-img white-version">
                        <img src="{{ asset('assets/front/') }}/images/shapes/dots-white.png" alt=""
                            class="dotted-img dark-version">
                        <img src="{{ asset('assets/front/') }}/images/shapes/element2.png" alt=""
                            class="element two end-0">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========================== Banner Section End ==========================-->
    @if (isset($username))
        <!--==========================  Start Counter Result  ==========================-->
        <div class="instagram_counter_result">
            <div class="container container-two">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="counter_result_wrapper">
                            <div class="counter_result_inner">
                                <h3 class="counter_result_inner__title"> عدّاد متابعين انستقرام </h3>
                            </div>
                            <div class="wraper">
                                <div class="user_image">
                                    <img src="{{ $profile_picture }}" alt="Profile Picture">
                                </div>
                                <div class="user_info">
                                    <p><strong>اسم المستخدم:</strong> {{ $username }} </p>
                                    <p><strong>الاسم الكامل:</strong> {{ $full_name }} </p>


                                    <p style="margin: 5px"><strong>المتابعين:</strong> <strong style="font-size: 20px">
                                            {{ $followers }} </strong> متابع </p>
                                    <p style="margin: 5px"><strong>المتابَعون:</strong> <strong style="font-size: 20px">
                                            {{ $following }} </strong> </p>
                                    <!-- Button -->
                                    <a href="#instagram-services" class="btn btn-main btn-lg pill fw-300"> زيادة المتابعين </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--========================== End Counter Result  ==========================-->
    <!--========================= Start The Instagrame Serveice  ================-->
    <!-- =========================== Arrival Product Section Start ========================== -->
    <section class="arrival-product padding-y-120 section-bg position-relative z-index-1" id="instagram-services">
        <img src="{{ asset('assets/front/') }}/images/gradients/product-gradient.png" alt=""
            class="bg--gradient white-version">

        <img src="{{ asset('assets/front/') }}/images/shapes/element2.png" alt="" class="element one">

        <div class="container container-two">
            <div class="section-heading">
                <h3 class="section-heading__title"> خدمات انستقرام </h3>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab"
                    tabindex="0">
                    <div class="row gy-4">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="product-item ">
                                <div class="product-item__thumb d-flex">
                                    <a href="{{ url('product/') }}" class="link w-100">
                                        <img src="{{ asset('assets/front/') }}/images/serv.webp" alt=""
                                            class="cover-img">
                                    </a>
                                    <button type="button" class="product-item__wishlist"><i
                                            class="fas fa-heart"></i></button>
                                </div>
                                <div class="product-item__content">
                                    <h6 class="product-item__title">
                                        <a href="{{ url('product/') }}" class="link"> زيادة لايكات انستقرام سريعة
                                            جداً
                                            (الأرخص على الاطلاق) + ضمان </a>
                                    </h6>
                                    <div class="product-item__info flx-between gap-2">

                                        <div class="flx-align gap-2">
                                            <h6 class="product-item__price mb-0">$120</h6>
                                            <span class="product-item__prevPrice text-decoration-line-through">$259</span>
                                        </div>
                                    </div>
                                    <div class="product-item__bottom flx-between gap-2">
                                        <div>
                                            <span class="product-item__sales font-14 mb-2">1200 مبيعة</span>
                                            <div class="d-flex align-items-center gap-1">
                                                <ul class="star-rating">
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                </ul>
                                                <span class="star-rating__text text-heading fw-500 font-14">
                                                    (16)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="product-item ">
                                <div class="product-item__thumb d-flex">
                                    <a href="{{ url('product/') }}" class="link w-100">
                                        <img src="{{ asset('assets/front/') }}/images/serv.webp" alt=""
                                            class="cover-img">
                                    </a>
                                    <button type="button" class="product-item__wishlist"><i
                                            class="fas fa-heart"></i></button>
                                </div>
                                <div class="product-item__content">
                                    <h6 class="product-item__title">
                                        <a href="{{ url('product/') }}" class="link"> زيادة لايكات انستقرام سريعة
                                            جداً
                                            (الأرخص على الاطلاق) + ضمان </a>
                                    </h6>
                                    <div class="product-item__info flx-between gap-2">

                                        <div class="flx-align gap-2">
                                            <h6 class="product-item__price mb-0">$120</h6>
                                            <span class="product-item__prevPrice text-decoration-line-through">$259</span>
                                        </div>
                                    </div>
                                    <div class="product-item__bottom flx-between gap-2">
                                        <div>
                                            <span class="product-item__sales font-14 mb-2">1200 مبيعة</span>
                                            <div class="d-flex align-items-center gap-1">
                                                <ul class="star-rating">
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                </ul>
                                                <span class="star-rating__text text-heading fw-500 font-14">
                                                    (16)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="product-item ">
                                <div class="product-item__thumb d-flex">
                                    <a href="{{ url('product/') }}" class="link w-100">
                                        <img src="{{ asset('assets/front/') }}/images/serv.webp" alt=""
                                            class="cover-img">
                                    </a>
                                    <button type="button" class="product-item__wishlist"><i
                                            class="fas fa-heart"></i></button>
                                </div>
                                <div class="product-item__content">
                                    <h6 class="product-item__title">
                                        <a href="{{ url('product/') }}" class="link"> زيادة لايكات انستقرام سريعة
                                            جداً
                                            (الأرخص على الاطلاق) + ضمان </a>
                                    </h6>
                                    <div class="product-item__info flx-between gap-2">

                                        <div class="flx-align gap-2">
                                            <h6 class="product-item__price mb-0">$120</h6>
                                            <span class="product-item__prevPrice text-decoration-line-through">$259</span>
                                        </div>
                                    </div>
                                    <div class="product-item__bottom flx-between gap-2">
                                        <div>
                                            <span class="product-item__sales font-14 mb-2">1200 مبيعة</span>
                                            <div class="d-flex align-items-center gap-1">
                                                <ul class="star-rating">
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                </ul>
                                                <span class="star-rating__text text-heading fw-500 font-14">
                                                    (16)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="product-item ">
                                <div class="product-item__thumb d-flex">
                                    <a href="{{ url('product/') }}" class="link w-100">
                                        <img src="{{ asset('assets/front/') }}/images/serv.webp" alt=""
                                            class="cover-img">
                                    </a>
                                    <button type="button" class="product-item__wishlist"><i
                                            class="fas fa-heart"></i></button>
                                </div>
                                <div class="product-item__content">
                                    <h6 class="product-item__title">
                                        <a href="{{ url('product/') }}" class="link"> زيادة لايكات انستقرام سريعة
                                            جداً
                                            (الأرخص على الاطلاق) + ضمان </a>
                                    </h6>
                                    <div class="product-item__info flx-between gap-2">

                                        <div class="flx-align gap-2">
                                            <h6 class="product-item__price mb-0">$120</h6>
                                            <span class="product-item__prevPrice text-decoration-line-through">$259</span>
                                        </div>
                                    </div>
                                    <div class="product-item__bottom flx-between gap-2">
                                        <div>
                                            <span class="product-item__sales font-14 mb-2">1200 مبيعة</span>
                                            <div class="d-flex align-items-center gap-1">
                                                <ul class="star-rating">
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                </ul>
                                                <span class="star-rating__text text-heading fw-500 font-14">
                                                    (16)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="product-item ">
                                <div class="product-item__thumb d-flex">
                                    <a href="{{ url('product/') }}" class="link w-100">
                                        <img src="{{ asset('assets/front/') }}/images/serv.webp" alt=""
                                            class="cover-img">
                                    </a>
                                    <button type="button" class="product-item__wishlist"><i
                                            class="fas fa-heart"></i></button>
                                </div>
                                <div class="product-item__content">
                                    <h6 class="product-item__title">
                                        <a href="{{ url('product/') }}" class="link"> زيادة لايكات انستقرام سريعة
                                            جداً
                                            (الأرخص على الاطلاق) + ضمان </a>
                                    </h6>
                                    <div class="product-item__info flx-between gap-2">

                                        <div class="flx-align gap-2">
                                            <h6 class="product-item__price mb-0">$120</h6>
                                            <span class="product-item__prevPrice text-decoration-line-through">$259</span>
                                        </div>
                                    </div>
                                    <div class="product-item__bottom flx-between gap-2">
                                        <div>
                                            <span class="product-item__sales font-14 mb-2">1200 مبيعة</span>
                                            <div class="d-flex align-items-center gap-1">
                                                <ul class="star-rating">
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                </ul>
                                                <span class="star-rating__text text-heading fw-500 font-14">
                                                    (16)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="product-item ">
                                <div class="product-item__thumb d-flex">
                                    <a href="{{ url('product/') }}" class="link w-100">
                                        <img src="{{ asset('assets/front/') }}/images/serv.webp" alt=""
                                            class="cover-img">
                                    </a>
                                    <button type="button" class="product-item__wishlist"><i
                                            class="fas fa-heart"></i></button>
                                </div>
                                <div class="product-item__content">
                                    <h6 class="product-item__title">
                                        <a href="{{ url('product/') }}" class="link"> زيادة لايكات انستقرام سريعة
                                            جداً
                                            (الأرخص على الاطلاق) + ضمان </a>
                                    </h6>
                                    <div class="product-item__info flx-between gap-2">

                                        <div class="flx-align gap-2">
                                            <h6 class="product-item__price mb-0">$120</h6>
                                            <span class="product-item__prevPrice text-decoration-line-through">$259</span>
                                        </div>
                                    </div>
                                    <div class="product-item__bottom flx-between gap-2">
                                        <div>
                                            <span class="product-item__sales font-14 mb-2">1200 مبيعة</span>
                                            <div class="d-flex align-items-center gap-1">
                                                <ul class="star-rating">
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                </ul>
                                                <span class="star-rating__text text-heading fw-500 font-14">
                                                    (16)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="product-item ">
                                <div class="product-item__thumb d-flex">
                                    <a href="{{ url('product/') }}" class="link w-100">
                                        <img src="{{ asset('assets/front/') }}/images/serv.webp" alt=""
                                            class="cover-img">
                                    </a>
                                    <button type="button" class="product-item__wishlist"><i
                                            class="fas fa-heart"></i></button>
                                </div>
                                <div class="product-item__content">
                                    <h6 class="product-item__title">
                                        <a href="{{ url('product/') }}" class="link"> زيادة لايكات انستقرام سريعة
                                            جداً
                                            (الأرخص على الاطلاق) + ضمان </a>
                                    </h6>
                                    <div class="product-item__info flx-between gap-2">

                                        <div class="flx-align gap-2">
                                            <h6 class="product-item__price mb-0">$120</h6>
                                            <span class="product-item__prevPrice text-decoration-line-through">$259</span>
                                        </div>
                                    </div>
                                    <div class="product-item__bottom flx-between gap-2">
                                        <div>
                                            <span class="product-item__sales font-14 mb-2">1200 مبيعة</span>
                                            <div class="d-flex align-items-center gap-1">
                                                <ul class="star-rating">
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                </ul>
                                                <span class="star-rating__text text-heading fw-500 font-14">
                                                    (16)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="product-item ">
                                <div class="product-item__thumb d-flex">
                                    <a href="{{ url('product/') }}" class="link w-100">
                                        <img src="{{ asset('assets/front/') }}/images/serv.webp" alt=""
                                            class="cover-img">
                                    </a>
                                    <button type="button" class="product-item__wishlist"><i
                                            class="fas fa-heart"></i></button>
                                </div>
                                <div class="product-item__content">
                                    <h6 class="product-item__title">
                                        <a href="{{ url('product/') }}" class="link"> زيادة لايكات انستقرام سريعة
                                            جداً
                                            (الأرخص على الاطلاق) + ضمان </a>
                                    </h6>
                                    <div class="product-item__info flx-between gap-2">

                                        <div class="flx-align gap-2">
                                            <h6 class="product-item__price mb-0">$120</h6>
                                            <span class="product-item__prevPrice text-decoration-line-through">$259</span>
                                        </div>
                                    </div>
                                    <div class="product-item__bottom flx-between gap-2">
                                        <div>
                                            <span class="product-item__sales font-14 mb-2">1200 مبيعة</span>
                                            <div class="d-flex align-items-center gap-1">
                                                <ul class="star-rating">
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                                    </li>
                                                </ul>
                                                <span class="star-rating__text text-heading fw-500 font-14">
                                                    (16)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-64">
                <a href="all-product.html" class="btn btn-main btn-lg pill fw-300">
                    جميع الخدمات
                </a>
            </div>

        </div>
    </section>
    <!-- =========================== Arrival Product Section End ========================== -->


    <!-- ======================== End The Instagrame Serveice =================== -->

@endsection
