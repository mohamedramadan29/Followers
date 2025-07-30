@extends('front.layouts.master')
@section('title', ' عدّاد متابعين التيك توك ')
@section('content')


    <!-- ########################## Start New Design ######################### -->
    <div class="container">
        @if (!isset($username))
        <main class="shadow-sm card-custom-insta">
            <h4>عداد متابعين التيك توك</h4>
            <div class="divider"></div>
            <div class="side-icon left" aria-hidden="true">
                <img src="{{ asset('assets/front/images/tiktok.png') }}" alt="">
            </div>
            <div class="side-icon right" aria-hidden="true">
                <img src="{{ asset('assets/front/images/tiktok.png') }}" alt="">
            </div>
            <div class="icon-center" aria-hidden="true" title="Instagram followers icon">
                <img src="{{ asset('assets/front/images/insta-counter-icon.png') }}" alt="">
            </div>
            <form action="{{ url('tiktokCounter') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="form-label-custom" for="username">إدخال اسم المستخدم</label>
                    <input type="text" id="username" required value="{{ $username ?? old('username') }}" name="username" class="form-control form-control-custom"
                        placeholder="أدخل اسم المستخدم هنا" aria-label="أدخل اسم المستخدم هنا" />
                    <button type="submit" class="mt-4 btn btn-custom">تحقق الآن</button>
                </div>
            </form>
        </main>
    </div>
    @endif
    <!-- ########################## End New Design ########################### -->

    <!--========================== Banner Section Start ==========================-->
    {{-- <section class="hero section-bg z-index-1">
        <div class="container container-two">
            <div class="row align-items-center gy-sm-5 gy-4">
                <div class="col-lg-6">
                    <div class="hero-inner position-relative pe-lg-5">
                        <div>
                            <h1 class="hero-inner__title"> عدّاد متابعين التيك توك
                            </h1>
                            <p class="hero-inner__desc font-18"> عدّاد متابعين التيك توك للوقت الحقيقي والمفصل والدقيق. لا
                                حاجة لتسجيل الدخول إلى حسابك التيك توك. </p>
                            <div class="position-relative">
                                <form action="{{ url('tiktokCounter') }}" method="post">
                                    @csrf
                                    <div class="search-box">
                                        <input type="text" required
                                            class="shadow-sm common-input common-input--lg pill auto-suggestion-input"
                                            placeholder="  ادخل اسم المستخدم في تيك توك  " name="username" value="{{ old('username') }}">
                                        <button type="submit" class="border-0 btn btn-main btn-icon icon"><img
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
    </section> --}}
    <!--========================== Banner Section End ==========================-->
    @if (isset($username))
        <!--==========================  Start Counter Result  ==========================-->
        <div class="instagram_counter_result">
            <div class="container container-two">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="counter_result_wrapper">
                            <div class="counter_result_inner">
                                <h3 class="counter_result_inner__title">عداد متابعين تيك توك</h3>
                            </div>
                            <div class="wraper">

                                <div id="countik-widget"></div>

                                <script src="https://countik.com/widget.js"></script>
                                <script>
                                    window.onload = function() {
                                        if (typeof window.initializeCountikWidget === 'function') {
                                            window.initializeCountikWidget({
                                                container: '#countik-widget',
                                                themeColor: '#444444',
                                                uniqueId: '{{ $username }}', // ضع هنا اسم المستخدم الصحيح
                                                language: 'ar'
                                            });
                                        } else {
                                            console.error("لم يتم تحميل سكريبت Countik بشكل صحيح.");
                                        }
                                    };
                                </script>
                                 <a  href="https://countik.com/ar/user/kyliecantrall" target="_blank" class="pow-countik"
                                 style="font-size:11px;color:#fff;display:block;padding:4px 3px;text-decoration:none;">مدعوم من Countik™</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--========================== End Counter Result  ==========================-->
 
    <!-- ======================== End The Instagrame Serveice =================== -->

@endsection
