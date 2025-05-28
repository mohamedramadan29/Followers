@extends('front.layouts.master')
@section('title')
    {{ $blog['name'] }}
@endsection
@section('content')
    <!-- ======================== Breadcrumb one Section Start ===================== -->
    <div class="container container-two" style="margin-top: 30px;">
        <div class="row">
            <div class="col-12">
                <h4> {{ $blog->name }} </h4>
                <ul class="gap-2 mb-2 breadcrumb-list flx-align breadcrumb">
                    <li class="breadcrumb-list__item font-14 text-body">
                        <a href="{{ url('/') }}" class="breadcrumb-list__link text-body hover-text-main"> الرئيسية
                        </a>
                    </li>
                    <li class="breadcrumb-list__item font-14 text-body">
                        <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                    </li>
                    <li class="breadcrumb-list__item font-14 text-body">
                        <a href="{{ url('blog') }}" class="breadcrumb-list__link text-body hover-text-main">
                            المدونة </a>
                    </li>
                    <li class="breadcrumb-list__item font-14 text-body">
                        <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                    </li>
                    <li class="breadcrumb-list__item font-14 text-body breadcrumb-item active">
                        <span class="breadcrumb-list__text"> {{ $blog->name }} </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ======================== Breadcrumb one Section End ===================== -->

    <!-- ======================= Blog Details Section Start ========================= -->
    <section class="mt-40 overflow-hidden blog-details position-relative">
        <div class="container container-two">
            <!-- blog details top End -->
            <div class="row gy-4">
                <div class="col-lg-12 pe-lg-5">
                    <!-- blog details content Start -->
                    <div class="blog-details-content">
                        <div class="mb-32 blog-details-content__thumb">
                            <img src="{{ asset('assets/uploads/Blogs/' . $blog->image) }}" alt="{{ $blog->name }}">
                        </div>
                        <div class="gap-2 author-profile d-flex justify-content-between">
                            <div> <i class="bi bi-person-fill"></i> محمد رمضان  </div>
                            <div> <i class="bi bi-calendar-fill"></i>  {{ $blog->created_at->format('d-m-Y') }} </div>
                        </div>
                        <br>
                        <hr>
                        {!! $blog->desc !!}
                        <!-- Post Tag & Share Start -->
                        <div class="gap-2 mt-40 mb-40 flx-between">
                            <div class="gap-3 socail-share flx-align">
                                <span class="socail-share__text text-heading fw-500"> مشاركة المقال : </span>
                                <!-- AddToAny BEGIN -->
                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                    <a class="a2a_button_facebook"></a>
                                    <a class="a2a_button_threads"></a>
                                    <a class="a2a_button_linkedin"></a>
                                    <a class="a2a_button_whatsapp"></a>
                                    <a class="a2a_button_telegram"></a>
                                    <a class="a2a_button_x"></a>
                                    <a class="a2a_button_twitter"></a>
                                </div>
                                <script defer src="https://static.addtoany.com/menu/page.js"></script>
                                <!-- AddToAny END -->
                            </div>
                        </div>
                        <hr>
                        <!-- Post Tag & Share End -->
                    </div>
                    <!-- blog details content End-->
                </div>
            </div>
        </div>
    </section>
     <!-- ========================  Start New Blog  ====================== -->
    <section class="all-product">
        <div class="container container-two">
            <div class="row">
                <div class="col-lg-12">
                    <!-- =========================== Most Requested Services Section Start ========================== -->
                    <section class="py-5 most-ordered-section">
                        <div class="container">
                            <div class="mb-2 most-ordered-title-bar d-flex align-items-center justify-content-center">
                                <div class="most-ordered-title-line flex-grow-1"></div>
                                <h4 class="mx-3 mb-0 most-ordered-title-text"> مقالات ذات صلة </h4>
                                <div class="most-ordered-title-line flex-grow-1"></div>
                            </div> 
                            <br>
                            <div class="row g-4 justify-content-center">
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="text-center most-ordered-card">
                                        <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                            class="mb-2 most-ordered-img" alt="اسم الخدمة">
                                        <div class="most-ordered-title"> اسم الخدمة </div>
                                        <div class="most-ordered-desc-card" style="color: #5D5FED"> تيك توك </div>
                                        <div class="time text-muted" style="color: #9C9C9C;font-size: 12px"> <i class="bi bi-alarm"></i> منذ سنتين </div>
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
                </div>
            </div>
        </div>
    </section>
    <!-- ===========================  End New Blog  ========================== -->
    <!-- ======================= Blog Details Section End ========================= -->
@endsection
