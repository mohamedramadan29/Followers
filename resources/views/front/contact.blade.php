@extends('front.layouts.master')
@section('title', ' اتصل بنا ')
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
                                    <a href="index.html" class="breadcrumb-list__link text-body hover-text-main">الرئيسية
                                    </a>
                                </li>
                                <li class="breadcrumb-list__item font-14 text-body">
                                    <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                                </li>
                                <li class="breadcrumb-list__item font-14 text-body">
                                    <span class="breadcrumb-list__text">تواصل معنا</span>
                                </li>
                            </ul>

                            <h3 class="mb-0 breadcrumb-two-content__title text-capitalize"> تواصل معنا </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================== Breadcrumb Two Section End ===================== -->

    <!-- =========================== Contact Section Start ========================== -->
    <section class="overflow-hidden contact padding-t-120 padding-b-60 section-bg position-relative z-index-1">
        <img src="{{ asset('assets/front/') }}/images/gradients/banner-two-gradient.png" alt=""
            class="bg--gradient">
        <img src="{{ asset('assets/front/') }}/images/shapes/pattern-five.png"
            class="top-0 position-absolute end-0 z-index--1" alt="">

        <div class="container container-two">
            <div class="row gy-4">
                <div class="col-lg-5">
                    <div class="contact-info">
                        <h3 class="contact-info__title"> تواصل معنا </h3>
                        <p class="contact-info__desc"> نتشرف بتواصلكم معنا وسيتم الرد على استفساراتكم في أقرب وقت ممكن. </p>

                        <div class="gap-4 contact-info__item-wrapper flx-between">
                            <div class="contact-info__item">
                                <span class="mb-1 contact-info__text text-capitalize d-block"> رقم الهاتف </span>
                                <a href="tel:01812345678"
                                    class="contact-info__link font-24 fw-500 text-heading hover-text-main">{{ $setting['phone'] }}</a>
                            </div>
                            <div class="contact-info__item">
                                <span class="mb-1 contact-info__text text-capitalize d-block"> البريد الالكتروني </span>
                                <a href="tel:dpmarket@gmail.com"
                                    class="contact-info__link font-24 fw-500 text-heading hover-text-main">
                                    {{ $setting['email'] }} </a>
                            </div>
                        </div>

                        <div class="mt-24">
                            <ul class="social-icon-list">
                                @if ($setting['facebook'] != '')
                                    <li class="social-icon-list__item">
                                        <a href="{{ $setting['facebook'] }}"
                                            class="social-icon-list__link text-heading flx-center"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                @endif

                                @if ($setting['twitter'] != '')
                                    <li class="social-icon-list__item">
                                        <a href="{{ $setting['twitter'] }}"
                                            class="social-icon-list__link text-heading flx-center"> <i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                @endif

                                @if ($setting['linkedin'] != '')
                                    <li class="social-icon-list__item">
                                        <a href="{{ $setting['linkedin'] }}"
                                            class="social-icon-list__link text-heading flx-center"> <i
                                                class="fab fa-linkedin-in"></i></a>
                                    </li>
                                @endif

                                @if ($setting['pinterest'] != '')
                                    <li class="social-icon-list__item">
                                        <a href="{{ $setting['pinterest'] }}"
                                            class="social-icon-list__link text-heading flx-center"> <i
                                                class="fab fa-pinterest-p"></i></a>
                                    </li>
                                @endif

                                @if ($setting['youtube'] != '')
                                    <li class="social-icon-list__item">
                                        <a href="{{ $setting['youtube'] }}"
                                            class="social-icon-list__link text-heading flx-center"> <i
                                                class="fab fa-youtube"></i></a>
                                    </li>
                                @endif

                                @if ($setting['instagram'] != '')
                                    <li class="social-icon-list__item">
                                        <a href="{{ $setting['instagram'] }}"
                                            class="social-icon-list__link text-heading flx-center"> <i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                @endif

                                @if ($setting['whatsapp'] != '')
                                    <li class="social-icon-list__item">
                                        <a href="{{ $setting['whatsapp'] }}"
                                            class="social-icon-list__link text-heading flx-center"> <i
                                                class="fab fa-whatsapp"></i></a>
                                    </li>
                                @endif


                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-lg-7 ps-lg-5">
                    <div class="card common-card p-sm-4">
                        <div class="card-body">
                            <form action="{{ route('send_message') }}" autocomplete="off" method="POST">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-sm-6 col-xs-6">
                                        <label for="name" class="mb-2 form-label font-18 font-heading fw-600"> الاسم
                                        </label>
                                        <input type="text" name="name" required
                                            class="border common-input common-input--grayBg" id="name"
                                            placeholder="اكتب الاسم " value="{{ old('name') }}">
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <label for="email" class="mb-2 form-label font-18 font-heading fw-600">البريد
                                            الالكتروني </label>
                                        <input type="email" name="email" required
                                            class="border common-input common-input--grayBg" id="email"
                                            placeholder=" ادخل البريد الالكتروني " value="{{ old('email') }}">
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="message" class="mb-2 form-label font-18 font-heading fw-600">رسالتك
                                        </label>
                                        <textarea name="message" required class="border common-input common-input--grayBg" id="message"
                                            placeholder=" اكتب رسالتك  ">{{ old('message') }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        {!! NoCaptcha::display() !!}
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block">
                                                <strong
                                                    class="text-danger">{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-main btn-lg pill w-100"> ارسل رسالتك
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =========================== Contact Section End ========================== -->


@endsection
