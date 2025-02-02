@extends('front.layouts.master')
@section('title', 'حساب جديد ')
@section('content')
    <!-- ================================== Account Page Start =========================== -->
    <section class="account d-flex">
        <img src="{{ asset('assets/front/') }}/images/thumbs/account-img.png" alt="" class="account__img">
        <div class="account__left d-md-flex d-none flx-align section-bg position-relative z-index-1 overflow-hidden">
            <img src="{{ asset('assets/front/') }}/images/shapes/pattern-curve-seven.png" alt=""
                class="position-absolute end-0 top-0 z-index--1 h-100">
            <div class="account-thumb">
                <img src="{{ asset('assets/front/') }}/images/hero_image.png" alt="">
            </div>
        </div>
        <div class="account__right padding-t-120 flx-align">

            <div class="account-content">
                <h4 class="account-content__title mb-48 text-capitalize"> انشاء حســاب جديــد </h4>
                <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-12">
                            <label for="name" class="form-label mb-2 font-18 font-heading fw-600"> الاسم </label>
                            <div class="position-relative">
                                <input name="name" required type="text"
                                    class="common-input common-input--bg common-input--withIcon" id="name"
                                    placeholder="اكتب الاســـم " value="{{ old('name') }}">
                                <span class="input-icon"><img src="{{ asset('assets/front/') }}/images/icons/user-icon.svg"
                                        alt=""></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label mb-2 font-18 font-heading fw-600"> البريد الالكتروني
                            </label>
                            <div class="position-relative">
                                <input name="email" required type="email"
                                    class="common-input common-input--bg common-input--withIcon" id="email"
                                    placeholder=" اكتــب البريد الالكترونــــى " value="{{ old('email') }}">
                                <span class="input-icon"><img
                                        src="{{ asset('assets/front/') }}/images/icons/envelope-icon.svg"
                                        alt=""></span>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="your-password" class="form-label mb-2 font-18 font-heading fw-600"> كلمة المرور
                            </label>
                            <div class="position-relative">
                                <input required type="password" name="password"
                                    class="common-input common-input--bg common-input--withIcon" id="your-password"
                                    placeholder="8 احرف علي الاقل ">
                                <span class="input-icon toggle-password cursor-pointer" id="#your-password"><img
                                        src="{{ asset('assets/front/') }}/images/icons/lock-icon.svg" alt=""></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="confirm-password" class="form-label mb-2 font-18 font-heading fw-600"> تاكيد كلمة
                                المرور </label>
                            <div class="position-relative">
                                <input required type="password" name="confirm-password"
                                    class="common-input common-input--bg common-input--withIcon" id="confirm-password"
                                    placeholder=" تاكــيد كلمــة المرور ">
                                <span class="input-icon toggle-password cursor-pointer" id="#confirm-password"><img
                                        src="{{ asset('assets/front/') }}/images/icons/lock-icon.svg" alt=""></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="common-check my-2">
                                <input required class="form-check-input" type="checkbox" name="checkbox" id="agree">
                                <label class="form-check-label mb-0 fw-400 font-16 text-body" for="agree"> الموافقة علي
                                    <a href="{{ url('terms') }}"> الشروط والاحكام </a> </label>
                            </div>
                        </div>
                        <div class="col-12">
                            {!! NoCaptcha::display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-main btn-lg w-100 pill"> انشــاء حساب جديد </button>
                        </div>
                        <div class="col-12">
                            <a href="{{route('auth.google.redirect','google')}}" type="submit" class="btn btn-outline-light btn-lg-icon btn-lg w-100 pill">
                                <span class="icon icon-left"><img src="{{ asset('assets/front/') }}/images/icons/google.svg"
                                        alt=""></span>
                                سجل من خلال جوجل
                            </a>
                        </div>
                        <div class="col-sm-12 mb-0">
                            <div class="have-account">
                                <p class="text font-14"> لديك حساب بالفعل ؟ <a
                                        class="link text-main text-decoration-underline  fw-500"
                                        href="{{ route('login') }}"> تسجيل دخول </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- ================================== Account Page End =========================== -->
@endsection
