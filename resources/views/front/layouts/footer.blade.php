<div class="last_news_section">
    <button class="news_button" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
        aria-controls="offcanvasExample">
        
        <img src="{{ asset('assets/front/images/notification.svg') }}" alt="">
    </button>
</div>

@include('front.layouts.last_news_section')

<!--###################### Start Chatt Faq #######################-->
<div class="robot-chat">
    <button class="robot-chat-button">
        اسالني سوالا <i class="bi bi-android2"></i>
    </button>
    <div class="hidden chat-body">
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

@php
    use App\Models\admin\PublicSetting;

    $setting = PublicSetting::first();

@endphp

<!--###################### End Chatt Faq #######################-->
<!-- ==================== Footer Start Here ==================== -->
<footer class="footer-section custom-purple-footer">
    <div class="container container-two">
        <div class="row gy-5 align-items-center">
            <div class="text-center col-xl-4 col-sm-6">
                <div class="footer-widget">

                    <img src="{{ asset('assets/front/uploads/logo-login.svg') }}" alt="شعار منصة الأعمال السعودي"
                        style="max-width: 120px; margin-bottom: 15px;">
                    <p class="text-white footer-widget__desc" style="font-size: 15px;">
                        متجر زيادة التفاعل خدمات سوشيال ميديا محترف في زيادة متابعين تيك توك ودعمها بمشاهدات ولايكات
                        ومشاركات بجودة مضمونة. كما يوفر هذه الخدمة لمختلف المنصات مثل تيك توك، انستقرام، فيسبوك، بأفضل
                        الأسعار.
                    </p>
                    <ul class="mt-3 footer-social-icons list-inline">
                        @if ($setting['facebook'] != '')
                            <li class="list-inline-item"><a href="{{ $setting['facebook'] }}" class="text-white"><i
                                        class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if ($setting['instagram'] != '')
                            <li class="list-inline-item"><a href="{{ $setting['instagram'] }}" class="text-white"><i
                                        class="fab fa-instagram"></i></a></li>
                        @endif
                        @if ($setting['linkedin'] != '')
                            <li class="list-inline-item"><a href="{{ $setting['linkedin'] }}" class="text-white"><i
                                        class="fab fa-linkedin-in"></i></a></li>
                        @endif
                        @if ($setting['whatsapp'] != '')
                            <li class="list-inline-item"><a href="{{ $setting['whatsapp'] }}" class="text-white"><i
                                        class="fab fa-whatsapp"></i></a></li>
                        @endif
                        @if ($setting['twitter'] != '')
                            <li class="list-inline-item"><a href="{{ $setting['twitter'] }}" class="text-white"><i
                                        class="fab fa-twitter"></i></a></li>
                        @endif
                        @if ($setting['youtube'] != '')
                            <li class="list-inline-item"><a href="{{ $setting['youtube'] }}" class="text-white"><i
                                        class="fab fa-youtube"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="mb-4 col-xl-3 col-sm-6 mb-xl-0">
                <div class="footer-widget">
                    <h5 class="text-white footer-widget__title">روابط تهمك</h5>
                    <ul class="footer-lists">
                        <li class="footer-lists__item"> <a href="{{ url('blog') }}"> المدونة </a> </li>
                        <li class="footer-lists__item"> <a href="{{ url('terms') }}"> الشروط والأحكام </a> </li>
                        <li class="footer-lists__item">سياسة الإرجاع</li>
                        <li class="footer-lists__item">سياسة الإستخدام والخصوصية</li>
                    </ul>
                </div>
            </div>
            <div class="mb-4 col-xl-2 col-sm-6 mb-xl-0">
                <div class="footer-widget">
                    <h5 class="text-white footer-widget__title">أخرى</h5>
                    <ul class="footer-lists">
                        <li class="footer-lists__item">عدد متابعين تيك توك</li>
                        <li class="footer-lists__item">عدد متابعين انستقرام</li>
                    </ul>
                </div>
            </div>

            <div class="mb-4 text-center col-xl-3 col-sm-6 mb-xl-0">
                <div class="footer-widget">
                    <img src="{{ asset('assets/front/uploads/suadi.png') }}" alt="شعار منصة الأعمال السعودي"
                        style="max-width: 120px; margin-bottom: 15px;">
                    <h5 class="mt-3 text-white footer-widget__title">توثيق في منصة الأعمال السعودي</h5>
                </div>
            </div>
        </div>
    </div>
    <hr style="border-color: #fff2; margin: 30px 0 10px 0;">
    <div class="container container-two">
        <div class="row">
            <div class="text-center col-12">
                <p class="mb-1 text-white footer-copyright" style="font-size: 16px;">حقوق محفوظة متجر زيادة التفاعل ©
                    2025</p>
            </div>
        </div>
    </div>
</footer>
<style>
    .custom-purple-footer {
        background: #595bb3;
        color: #fff;
        padding: 50px 0 0 0;
        position: relative;
        font-family: inherit;
    }

    .custom-purple-footer .footer-widget__title {
        font-size: 20px;
        margin-bottom: 18px;
        font-weight: bold;
    }

    .custom-purple-footer .footer-lists {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .custom-purple-footer .footer-lists__item {
        color: #fff;
        margin-bottom: 10px;
        font-size: 16px;
    }

    .custom-purple-footer .footer-social-icons .list-inline-item {
        margin: 0 7px;
    }

    .custom-purple-footer .footer-lists__item a {
        color: #fff
    }

    .custom-purple-footer .footer-social-icons .list-inline-item a {
        font-size: 22px;
        color: #fff;
        transition: color 0.2s;
    }

    .custom-purple-footer .footer-social-icons .list-inline-item a:hover {
        color: #ffd700;
    }

    .custom-purple-footer hr {
        border-top: 1px solid #fff2;
    }

    .custom-purple-footer .footer-copyright {
        margin-bottom: 10px;
    }

    @media (max-width: 767px) {
        .custom-purple-footer {
            padding: 30px 0 0 0;
        }

        .custom-purple-footer .footer-widget__title {
            font-size: 17px;
        }

        .custom-purple-footer .footer-lists__item {
            font-size: 14px;
        }
    }
</style>
<!-- ==================== Footer End Here ==================== -->

</main>

<!-- Jquery js -->
<script src="{{ asset('assets/front/') }}/js/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
</script>

<!-- Bootstrap Bundle Js -->

{{-- <script src="{{ asset('assets/front/') }}/js/boostrap.bundle.min.js"></script> --}}
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
@yield('js')
{!! NoCaptcha::renderJs() !!}
</body>

</html>
