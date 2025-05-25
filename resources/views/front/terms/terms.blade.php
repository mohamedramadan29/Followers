@extends('front.layouts.master')
@section('title', '  الشروط والاحكام ')
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
                                    <span class="breadcrumb-list__text"> الشروط والاحكام </span>
                                </li>
                            </ul>

                            <h3 class="mb-0 breadcrumb-two-content__title text-capitalize">  الشروط والاحكام</h3>
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
