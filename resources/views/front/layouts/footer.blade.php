<div class="last_news_section">
    <button class="news_button" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
        aria-controls="offcanvasExample">
        <i class="bi bi-exclamation-triangle-fill"></i>
    </button>
</div>

@include('front.layouts.last_news_section')

<!--###################### Start Chatt Faq #######################-->
<div class="robot-chat">
    <button class="robot-chat-button">
        اسالني سوالا <i class="bi bi-android2"></i>
    </button>
    <div class="chat-body hidden">
        <div class="chat-header">
            <h3>اسالني سوالا</h3>
            <button class="chat-close-button">
                <i class="bi bi-x close-chat"></i>
            </button>
        </div>
        <div class="chat-content">
            <div class="chat-message">
                <div class="not_question">
                    <img src="{{ asset('assets/front/images/faq.gif') }}" alt="">
                    <p>مرحبا بك في متجر المتابعين</p>
                </div>
                <div class="answers">
                </div>
            </div>
        </div>
        <div class="chat-input">
            <input type="text" id="faq-input" placeholder="اكتب سوالك هنا">
        </div>
    </div>
</div>
<style>
    .hidden {
        display: none;
    }
</style>
<script>
    // استهداف عناصر الـ DOM
    const chatButton = document.querySelector('.robot-chat-button');
    const chatBody = document.querySelector('.chat-body');
    const closechat = document.querySelector('.close-chat');
    // إضافة حدث النقر لتفعيل toggle
    chatButton.addEventListener('click', () => {
        chatBody.classList.toggle('hidden'); // تبديل ظهور/اختفاء الـ chat-body
    });
    // إضافة حدث النقر لإغلاق الـ chat-body عند الضغط على زر الإغلاق
    closechat.addEventListener('click', () => {
        chatBody.classList.add('hidden'); // إضافة فئة hidden لإخفاء الـ chat-body
    });
</script>

<script>
    const inputField = document.getElementById('faq-input');
    const answersDiv = document.querySelector('.answers');
    const notQuestionDiv = document.querySelector('.not_question');

    inputField.addEventListener('input', function() {
        const query = inputField.value;
        // إخفاء القسم الخاص بـ not_question إذا كان هناك نص مكتوب
        if (query.length > 0) {
            notQuestionDiv.style.display = 'none'; // إخفاء
        } else {
            notQuestionDiv.style.display = 'block'; // إظهار عند تفريغ الإدخال
            answersDiv.innerHTML = ''; // تنظيف النتائج
        }

        if (query.length > 0) {
            // إرسال طلب AJAX للبحث
            fetch(`/search-faqs?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    // تنظيف الإجابات القديمة
                    answersDiv.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(faq => {
                            const faqElement = document.createElement('div');
                            faqElement.classList.add('faq-suggestion');
                            faqElement.innerHTML = `
                                <strong>${faq.question}</strong>
                                <p>${faq.answer}</p>
                            `;
                            answersDiv.appendChild(faqElement);
                        });
                    } else {
                        answersDiv.innerHTML = '<p>لا توجد نتائج</p>';
                    }
                });
        } else {
            answersDiv.innerHTML = ''; // تنظيف النتائج إذا كان الحقل فارغًا
        }
    });
</script>

@include('front.layouts.chat')

<!--###################### End Chatt Faq #######################-->
<!-- ==================== Footer Start Here ==================== -->
@php
    use App\Models\admin\PublicSetting;
    $setting = PublicSetting::first();
@endphp

<footer class="footer-section ">
    <img src="{{ asset('assets/front/') }}/images/shapes/pattern.png" alt="" class="bg-pattern">
    <img src="{{ asset('assets/front/') }}/images/shapes/element1.png" alt="" class="element one">
    <img src="{{ asset('assets/front/') }}/images/shapes/element2.png" alt="" class="element two">
    <img src="{{ asset('assets/front/') }}/images/gradients/footer-gradient.png" alt="" class="bg--gradient">

    <div class="container container-two">
        <div class="row gy-5">
            <div class="col-xl-3 col-sm-6">
                <div class="footer-widget">
                    <div class="footer-widget__logo">
                        {{-- <a href="{{ url('/') }}"> متجر المتابعين </a> --}}
                        <h5 class="footer-widget__title text-white"> متجر المتابعين </h5>
                    </div>
                    <p class="footer-widget__desc">
                        نقدم لك خدمات التواصل الاجتماعي لتعزيز تواجدك بين منافسيك، أسهل وأبسط وأسرع خدمات سوشيال ميديا
                        في العالم العربي
                    </p>

                </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-xs-6">
                <div class="footer-widget">
                    <h5 class="footer-widget__title text-white"> روابط </h5>
                    <ul class="footer-lists">
                        <li class="footer-lists__item"><a href="{{ url('/') }}" class="footer-lists__link">
                                الرئيسية
                            </a></li>
                        <li class="footer-lists__item"><a href="product-details.html" class="footer-lists__link">
                                الاقسام </a></li>
                        <li class="footer-lists__item"><a href="profile.html" class="footer-lists__link"> الخدمات </a>
                        </li>
                        <li class="footer-lists__item"><a href="{{ url('contact') }}" class="footer-lists__link">تواصل
                                معنا
                            </a>
                        </li>
                        <li class="footer-lists__item"><a href="{{ url('blog') }}" class="footer-lists__link"> المدونة
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-xs-6 ps-xl-5">
                <div class="footer-widget">
                    <h5 class="footer-widget__title text-white"> تابعنا </h5>
                    <div class="footer-widget__social">
                        <ul class="social-icon-list">
                            @if ($setting['facebook'] != '')
                                <li class="social-icon-list__item">
                                    <a href="{{ $setting['facebook'] }}" class="social-icon-list__link  flx-center"><i
                                            class="fab fa-facebook-f"></i></a>
                                </li>
                            @endif

                            @if ($setting['twitter'] != '')
                                <li class="social-icon-list__item">
                                    <a href="{{ $setting['twitter'] }}" class="social-icon-list__link  flx-center"> <i
                                            class="fab fa-twitter"></i></a>
                                </li>
                            @endif

                            @if ($setting['linkedin'] != '')
                                <li class="social-icon-list__item">
                                    <a href="{{ $setting['linkedin'] }}" class="social-icon-list__link  flx-center"> <i
                                            class="fab fa-linkedin-in"></i></a>
                                </li>
                            @endif

                            @if ($setting['pinterest'] != '')
                                <li class="social-icon-list__item">
                                    <a href="{{ $setting['pinterest'] }}" class="social-icon-list__link  flx-center">
                                        <i class="fab fa-pinterest-p"></i></a>
                                </li>
                            @endif

                            @if ($setting['youtube'] != '')
                                <li class="social-icon-list__item">
                                    <a href="{{ $setting['youtube'] }}" class="social-icon-list__link  flx-center"> <i
                                            class="fab fa-youtube"></i></a>
                                </li>
                            @endif

                            @if ($setting['instagram'] != '')
                                <li class="social-icon-list__item">
                                    <a href="{{ $setting['instagram'] }}" class="social-icon-list__link flx-center">
                                        <i class="fab fa-instagram"></i></a>
                                </li>
                            @endif

                            @if ($setting['whatsapp'] != '')
                                <li class="social-icon-list__item">
                                    <a href="{{ $setting['whatsapp'] }}" class="social-icon-list__link flx-center">
                                        <i class="fab fa-whatsapp"></i></a>
                                </li>
                            @endif

                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="footer-widget">
                    <h5 class="footer-widget__title text-white">اشترك معنا </h5>
                    <p class="footer-widget__desc"> اشترك معنا الان للحصول علي افضل العروض </p>
                    <form action="#" class="mt-4 subscribe-box d-flex align-items-center flex-column gap-2">
                        <input type="text" class="form-control common-input pill text-white"
                            placeholder=" ادخل البريد الالكتروني  ">
                        <button type="submit" class="btn btn-main btn-lg w-100 pill"> اشترك الان </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- bottom Footer -->
<div class="bottom-footer">
    <div class="container container-two">
        <div class="bottom-footer__inner flx-between gap-3">
            <p class="bottom-footer__text font-14">جميع الحقوق محفوظة © 2024 أرخص موقع زيادة متابعين </p>
            <div class="footer-links">
                <a href="{{ url('terms') }}" class="footer-link font-14"> الشروط والاحكام </a>
                <a href="{{ url('return-policy') }}" class="footer-link font-14"> سياسة الاستبدال و الاسترجاع </a>
                <a href="{{ url('privacy-policy') }}" class="footer-link font-14"> سياسة الاستخدام والخصوصية </a>
            </div>
        </div>
    </div>
</div>
<!-- ==================== Footer End Here ==================== -->

</main>

<!-- Jquery js -->
<script src="{{ asset('assets/front/') }}/js/jquery-3.7.1.min.js"></script>

<!-- Bootstrap Bundle Js -->
<script src="{{ asset('assets/front/') }}/js/boostrap.bundle.min.js"></script>
<!-- CountDown -->
<script src="{{ asset('assets/front/') }}/js/countdown.js"></script>
<!-- counter up -->
<script src="{{ asset('assets/front/') }}/js/counterup.min.js"></script>
<!-- Slick js -->
<script src="{{ asset('assets/front/') }}/js/slick.min.js"></script>
<!-- magnific popup -->
<script src="{{ asset('assets/front/') }}/js/jquery.magnific-popup.js"></script>
<!-- apex chart -->
<script src="{{ asset('assets/front/') }}/js/apexchart.js"></script>
<!-- marquee -->
<script src="{{ asset('assets/front/') }}/js/marquee.min.js"></script>

<!-- main js -->
<script src="{{ asset('assets/front/') }}/js/main.js"></script>
@toastifyJs

{!! NoCaptcha::renderJs() !!}
</body>

</html>
