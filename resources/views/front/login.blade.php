@extends('front.layouts.master')
@section('title', ' تسجيل دخول ')
@section('css')

@endsection
@section('content')
    <section class="login-modern">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="overflow-hidden flex-row border-0 shadow-lg card" style="border-radius: 20px;">
                        <!-- القسم الأيمن: صورة ونص -->
                        <div class="text-center col-md-6 d-none d-md-flex flex-column align-items-center justify-content-center"
                            style="background: #6a7cff; color: #fff; width: 40%;">
                            <img src="{{ asset('assets/front/uploads/logo-login.svg') }}" alt="Logo">
                            <img class="handshake" src="{{ asset('assets/front/uploads/hand-login.png') }}" alt="Handshake">
                            <h3 class="mb-3 fw-bold">شراكة لنمو الأعمال</h3>
                            <p style="font-size: 1rem; line-height: 2;">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء
                                لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي
                                يقرأها.</p>
                        </div>
                        <!-- القسم الأيسر: النموذج -->
                        <div class="p-5 bg-white col-md-6 d-flex flex-column justify-content-center">
                            <div class="mb-4 text-center">
                                <img src="{{ asset('assets/front/uploads/iconlogin.svg') }}" alt=""
                                    style="width: 60px;">
                                <h4 class="mt-3 mb-4 fw-bold" style="font-size: 1.5rem;">تسجيل الدخول للحساب</h4>
                            </div>
                            <form action="{{ route('login.post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 position-relative">
                                    <input required name="email" type="email" value="{{ old('email') }}"
                                        class="form-control form-control-lg pe-5 text-end" id="email"
                                        placeholder="البريد الإلكتروني">
                                    <span class="me-1 d-flex align-items-center" style="">
                                        <img src="{{ asset('assets/front/images/icons/envelope-icon.svg') }}"
                                            alt="">
                                    </span>
                                </div>
                                <div class="mb-3 position-relative">
                                    <input required type="password" name="password"
                                        class="form-control form-control-lg pe-5 text-end" id="your-password"
                                        placeholder="كلمة المرور">
                                    <span class="me-1 d-flex align-items-center">
                                        <img src="{{ asset('assets/front/images/icons/lock-icon.svg') }}" alt="">
                                    </span>
                                </div>

                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                         <input class="form-check-input" type="checkbox" name="remeber" id="keepMe">
                                        <label class="form-check-label font-14" for="keepMe">تذكرني</label>
                                    </div>
                                    <a href="{{ url('forget-password') }}"
                                        class="text-decoration-underline text-main font-14">هل نسيت كلمة المرور؟</a>
                                </div>
                                <div class="mb-3 text-center">
                                    {!! NoCaptcha::display() !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block">
                                            <strong
                                                class="text-danger">{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="mb-3 btn w-100"
                                    style="background: #6a7cff; color: #fff; border-radius: 8px; font-weight: 600; font-size: 1.1rem;">دخول
                                    الآن</button>
                                <div class="mb-3">
                                    <a href="{{ route('auth.google.redirect', 'google') }}"
                                        class="btn w-100 d-flex align-items-center justify-content-center"
                                        style="background: #fff; border: 1px solid #ddd; border-radius: 8px; color: #222 !important; font-weight: 600; font-size: 1.1rem;">
                                        <img src="{{ asset('assets/front/images/icons/google.svg') }}" alt=""
                                            style="width: 22px; margin-left: 8px;"> الدخول عبر جوجل
                                    </a>
                                </div>
                                <div class="mt-2 text-center">
                                    <span class="font-14">ليس لديك حساب؟ <a
                                            class="text-main text-decoration-underline fw-bold"
                                            href="{{ route('register') }}">اشترك</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
