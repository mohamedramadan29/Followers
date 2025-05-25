@extends('front.layouts.master')
@section('title', 'حساب جديد ')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/front/css/new-custome.css') }}">
@endsection
@section('content')
    <!-- ================================== Account Page Start =========================== -->
    <section class="login-modern">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="flex-row overflow-hidden border-0 shadow-lg card" style="border-radius: 20px;
                    margin-top: 30px;">
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
                                <h4 class="mt-3 mb-4 fw-bold" style="font-size: 1.5rem;">تسجيل حساب جديد</h4>
                            </div>
                            <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 position-relative">
                                    <input name="name" required type="text"
                                        class="form-control form-control-lg pe-5 text-end" id="name"
                                        placeholder="الاسم الأول" value="{{ old('name') }}">
                                    <span class="me-1 d-flex align-items-center">
                                        <img src="{{ asset('assets/front/images/icons/user-icon.svg') }}" alt="">
                                    </span>
                                </div>
                                <div class="mb-3 position-relative">
                                    <input name="email" required type="email"
                                        class="form-control form-control-lg pe-5 text-end" id="email"
                                        placeholder="البريد الإلكتروني" value="{{ old('email') }}">
                                    <span class="me-1 d-flex align-items-center">
                                        <img src="{{ asset('assets/front/images/icons/envelope-icon.svg') }}"
                                            alt="">
                                    </span>
                                </div>

                                <div class="mb-3 position-relative d-flex">
                                    <div class="position-relative w-100">
                                        <input name="phone" required type="tel"
                                            class="form-control form-control-lg pe-5 text-end" id="phone"
                                            placeholder="رقم الجوال">
                                        <span class="me-1 d-flex align-items-center">
                                            <img src="{{ asset('assets/front/images/icons/phone.svg') }}" alt=""
                                        </span>
                                    </div>
                                    <div class="position-relative" style="min-width: 120px;">
                                        <span id="country-flag"
                                            class="position-absolute top-50 end-0 translate-middle-y me-2"
                                            style="font-size: 1.2em; pointer-events: none;">🇸🇦</span>
                                        <select name="country_code pe-5" id="country_code"
                                            class="form-select form-control-lg text-end ps-5"
                                            style="background: #EAEAEA; border: none; border-radius: 8px 0 0 8px; direction: ltr; padding-right: 2.5em;height: 100%">
                                            <option value="+966" selected>+966</option>
                                            <option value="+20">+20</option>
                                            <option value="+971">+971</option>
                                            <option value="+965">+965</option>
                                            <!-- أضف المزيد حسب الحاجة -->
                                        </select>
                                    </div>

                                </div>

                                <div class="mb-3 position-relative">
                                    <input required type="password" name="password"
                                        class="form-control form-control-lg pe-5 text-end" id="your-password"
                                        placeholder="كلمة المرور">
                                    <span class="me-1 d-flex align-items-center">
                                        <img src="{{ asset('assets/front/images/icons/lock-icon.svg') }}" alt="">
                                    </span>
                                </div>
                                <div class="mb-3 position-relative">
                                    <input required type="password" name="confirm-password"
                                        class="form-control form-control-lg pe-5 text-end" id="confirm-password"
                                        placeholder="تأكيد كلمة المرور">
                                    <span class="me-1 d-flex align-items-center">
                                        <img src="{{ asset('assets/front/images/icons/lock-icon.svg') }}" alt="">
                                    </span>
                                </div>



                                <div class="mb-3 d-flex align-items-center">
                                    <input required class="form-check-input" type="checkbox" name="checkbox" id="agree"
                                        style="accent-color: #6a7cff;">
                                    <label class="mb-0 form-check-label fw-400 font-16 text-body ms-2" for="agree">
                                        الموافقة على
                                        <a href="{{ url('terms') }}" class="text-main">الشروط والاحكام</a> </label>
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
                                <button type="submit" class="mb-3 btn btn-primary btn-lg w-100"
                                    style="border-radius: 8px;">إنشاء حساب</button>
                                <div class="mb-3">
                                    <a href="{{ route('auth.google.redirect', 'google') }}"
                                        class="btn w-100 d-flex align-items-center justify-content-center"
                                        style="background: #fff; border: 1px solid #ddd; border-radius: 8px; color: #222 !important; font-weight: 600; font-size: 1.1rem;">
                                        <img src="{{ asset('assets/front/images/icons/google.svg') }}" alt=""
                                            style="width: 22px; margin-left: 8px;"> الدخول عبر جوجل
                                    </a>
                                </div>
                                <div class="mt-2 text-center">
                                    <span class="font-14">لديك حساب بالفعل؟ <a
                                            class="text-main text-decoration-underline fw-bold"
                                            href="{{ route('login') }}">دخول</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================== Account Page End =========================== -->
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var select = document.getElementById('country_code');
            var flagSpan = document.getElementById('country-flag');

            function updateFlag() {
                var val = select.value;
                var flag = '🇸🇦';
                if (val === '+966') flag = '🇸🇦';
                else if (val === '+20') flag = '🇪🇬';
                else if (val === '+971') flag = '🇦🇪';
                else if (val === '+965') flag = '🇰🇼';
                // أضف المزيد حسب الحاجة
                flagSpan.textContent = flag;
            }
            select.addEventListener('change', updateFlag);
            updateFlag();
        });
    </script>
@endsection
