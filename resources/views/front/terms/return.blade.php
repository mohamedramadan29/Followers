@extends('front.layouts.master')
@section('title', '  سياسة الاستبدال و الاسترجاع ')
@section('content')

    <!-- ======================== Breadcrumb Two Section Start ===================== -->
    <section class="breadcrumb border-bottom p-0 d-block section-bg position-relative z-index-1">

        <div class="breadcrumb-two">
            <img src="{{ asset('assets/front/') }}/images/gradients/breadcrumb-gradient-bg.png" alt=""
                class="bg--gradient">
            <div class="container container-two">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="breadcrumb-two-content text-center">

                            <ul class="breadcrumb-list flx-align gap-2 mb-2 justify-content-center">
                                <li class="breadcrumb-list__item font-14 text-body">
                                    <a href="index.html" class="breadcrumb-list__link text-body hover-text-main">الرئيسية
                                    </a>
                                </li>
                                <li class="breadcrumb-list__item font-14 text-body">
                                    <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                                </li>
                                <li class="breadcrumb-list__item font-14 text-body">
                                    <span class="breadcrumb-list__text">  سياسة الاستبدال و الاسترجاع </span>
                                </li>
                            </ul>

                            <h3 class="breadcrumb-two-content__title mb-0 text-capitalize">  سياسة الاستبدال و الاسترجاع </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================== Breadcrumb Two Section End ===================== -->

    <!-- =========================== Contact Section Start ========================== -->
    <section class="contact padding-t-120 padding-b-60 section-bg position-relative z-index-1 overflow-hidden">
        <img src="{{ asset('assets/front/') }}/images/gradients/banner-two-gradient.png" alt=""
            class="bg--gradient">
        <img src="{{ asset('assets/front/') }}/images/shapes/pattern-five.png"
            class="position-absolute end-0 top-0 z-index--1" alt="">

        <div class="container container-two">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="contact-info">
                        {!! $terms['content'] !!}
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- =========================== Contact Section End ========================== -->


@endsection
