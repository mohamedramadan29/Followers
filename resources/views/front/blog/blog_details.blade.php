@extends('front.layouts.master')
@section('title')
    {{ $blog['name'] }}
@endsection
@section('content')
    <!-- ======================= Blog Details Section Start ========================= -->
    <section class="blog-details padding-y-120 position-relative overflow-hidden">
        <div class="container container-two">
            <!-- blog details top Start -->
            <div class="blog-details-top mb-64">
                <div class="blog-details-top__info flx-align gap-3 mb-4">
                    {{-- <div class="blog-details-top__thumb flx-align gap-2">
                        <img src="{{ asset('assets/front/') }}/images/thumbs/blog-details-user.png" alt="">
                        <span class="text-heading fw-500">Michel Smith</span>
                    </div> --}}
                    <span class="blog-details-top__date flx-align gap-2">
                        <img src="{{ asset('assets/front/') }}/images/icons/clock.svg" alt="">
                        {{ $blog->created_at->translatedFormat('d F , Y') }}
                    </span>
                </div>
                <h2 class="blog-details-top__title mb-4 text-capitalize"> {{ $blog->name }} </h2>
                <p class="blog-details-top__desc"> {{ $blog->short_desc }} </p>
            </div>
            <!-- blog details top End -->
            <div class="row gy-4">
                <div class="col-lg-8 pe-lg-5">
                    <!-- blog details content Start -->
                    <div class="blog-details-content">
                        <div class="blog-details-content__thumb mb-32">
                            <img src="{{ asset('assets/uploads/Blogs/' . $blog->image) }}" alt="{{ $blog->name }}">
                        </div>
                        {!! $blog->desc !!}
                        <!-- Post Tag & Share Start -->
                        <div class="flx-between gap-2 mb-40 mt-40">
                            <div class="socail-share flx-align gap-3">
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
                        <!-- Post Tag & Share End -->


                    </div>
                    <!-- blog details content End-->
                </div>
                <div class="col-lg-4">
                    <!-- blog Sidebar Start -->
                    <div class="common-sidebar-wrapper">
                        {{-- <div class="common-sidebar p-0">
                            <form action="#" autocomplete="off">
                                <div class="search-box w-100">
                                    <input type="text" class="common-input border-0" placeholder="Type here...">
                                    <button type="submit" class="icon line-height-1 rounded-icon white-version">
                                        <img src="{{ asset('assets/front/') }}/images/icons/search-dark.svg" alt="">
                                    </button>
                                    <button type="submit" class="icon line-height-1 rounded-icon dark-version">
                                        <img src="{{ asset('assets/front/') }}/images/icons/search-dark-white.svg" alt="">
                                    </button>
                                </div>
                            </form>
                        </div> --}}

                        <div class="common-sidebar">
                            <h6 class="common-sidebar__title"> احدث المقالات </h6>
                            @foreach ($lastest_blogs as $blog)
                                <div class="latest-blog">
                                    <div class="latest-blog__thumb">
                                        <a href="{{ url('blog/' . $blog['slug']) }}"> <img
                                                src="{{ asset('assets/uploads/Blogs/' . $blog->image) }}"
                                                class="cover-img" alt="{{ $blog->name }}"></a>
                                    </div>
                                    <div class="latest-blog__content">
                                        <span class="latest-blog__date font-14 mb-2">{{ $blog->created_at->translatedFormat('d F , Y') }}</span>
                                        <h6 class="latest-blog__title fw-500 font-body font-16">
                                            <a href="{{ url('blog/' . $blog['slug']) }}"> {{ $blog->name }} </a>
                                        </h6>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        {{-- <div class="common-sidebar">
                            <h6 class="common-sidebar__title"> Categories </h6>
                            <ul class="category-list">
                                <li class="category-list__item">
                                    <a href="blog.html"
                                        class="category-list__link flx-align flex-nowrap gap-2 text-body hover-text-main">
                                        <span class="icon font-12"> <i class="fas fa-chevron-right"></i></span>
                                        <span class="text">WordPress (12)</span>
                                    </a>
                                </li>
                                <li class="category-list__item">
                                    <a href="blog.html"
                                        class="category-list__link flx-align flex-nowrap gap-2 text-body hover-text-main">
                                        <span class="icon font-12"> <i class="fas fa-chevron-right"></i></span>
                                        <span class="text">App & Saas (6)</span>
                                    </a>
                                </li>
                                <li class="category-list__item">
                                    <a href="blog.html"
                                        class="category-list__link flx-align flex-nowrap gap-2 text-body hover-text-main">
                                        <span class="icon font-12"> <i class="fas fa-chevron-right"></i></span>
                                        <span class="text">Web Development (6)</span>
                                    </a>
                                </li>
                                <li class="category-list__item">
                                    <a href="blog.html"
                                        class="category-list__link flx-align flex-nowrap gap-2 text-body hover-text-main">
                                        <span class="icon font-12"> <i class="fas fa-chevron-right"></i></span>
                                        <span class="text">Graphics (6)</span>
                                    </a>
                                </li>
                                <li class="category-list__item">
                                    <a href="blog.html"
                                        class="category-list__link flx-align flex-nowrap gap-2 text-body hover-text-main">
                                        <span class="icon font-12"> <i class="fas fa-chevron-right"></i></span>
                                        <span class="text">IOS/Android Design (6)</span>
                                    </a>
                                </li>
                                <li class="category-list__item">
                                    <a href="blog.html"
                                        class="category-list__link flx-align flex-nowrap gap-2 text-body hover-text-main">
                                        <span class="icon font-12"> <i class="fas fa-chevron-right"></i></span>
                                        <span class="text">Web Design (6)</span>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}

                    </div>
                    <!-- blog Sidebar End-->
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= Blog Details Section End ========================= -->
 
@endsection
