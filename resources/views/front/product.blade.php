@extends('front.layouts.master')
@section('title')
    {{ $service['name'] }}
@endsection
@section('content')
    <!-- ======================== Breadcrumb one Section Start ===================== -->
    <div class="container container-two" style="margin-top: 30px;">
        <div class="row">
            <div class="col-12">
                <ul class="gap-2 mb-2 breadcrumb-list flx-align breadcrumb">
                    <li class="breadcrumb-list__item font-14 text-body">
                        <a href="{{ url('/') }}" class="breadcrumb-list__link text-body hover-text-main"> الرئيسية
                        </a>
                    </li>
                    <li class="breadcrumb-list__item font-14 text-body">
                        <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                    </li>
                    <li class="breadcrumb-list__item font-14 text-body">
                        <a href="{{ url('category/' . $service['Main_Category']['slug']) }}"
                            class="breadcrumb-list__link text-body hover-text-main">
                            {{ $service['Main_Category']['name'] }} </a>
                    </li>
                    <li class="breadcrumb-list__item font-14 text-body">
                        <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                    </li>
                    <li class="breadcrumb-list__item font-14 text-body breadcrumb-item active">
                        <span class="breadcrumb-list__text"> {{ $service['name'] }} </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ======================== Breadcrumb one Section End ===================== -->
    <!-- ======================= Product Details Section Start ==================== -->
    <div class="mt-32 product-details padding-b-120">
        <div class="container container-two">
            <div class="row gy-4">
                <div class="col-lg-5">
                    <div class="product-details__thumb">
                        <img src="{{ asset('assets/uploads/Product_images/' . $service['image']) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <!-- ======================= Product Sidebar Start ========================= -->
                    <div class="product-details-section">
                        <h4> {{ $service['name'] }} </h4>
                        <div class="product-sidebar section-bg">
                            <div class="container container-two">
                                <div class="gap-2 breadcrumb-tab flx-wrap align-items-start gap-lg-4">
                                    <ul class="nav tab-bordered nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-price-select-tab"
                                                data-bs-toggle="pill" data-bs-target="#pills-price-select" type="button"
                                                role="tab" aria-controls="pills-price-select" aria-selected="true">
                                                <i class="bi bi-gear-wide-connected"></i>
                                                الخيــــارات </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-product-details-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-product-details" type="button" role="tab"
                                                aria-controls="pills-product-details" aria-selected="true">
                                                <i class="bi bi-book"></i>
                                                الوصف
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-rating-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-rating" type="button" role="tab"
                                                aria-controls="pills-rating" aria-selected="false">
                                                <span class="gap-1 d-flex align-items-center">
                                                    <i class="bi bi-star"></i>
                                                    التقيمــات </span>
                                                </span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="success-purches">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4> تم إرسال طلبك بنجاح </h4>
                                        <i class="bi bi-x-square"></i>
                                    </div>

                                    <ul class="list-unstyled">
                                        <li> رقم الطلب : <span> 343434 </span> </li>
                                        <li> الخدمة : <span> زيادة مشاهدات تليجرام - خدمة جديدة - وصول سريع للتنفيذ - 50.000
                                                باليوم </span> </li>
                                        <li> الرابط : <span> https://nayefstor.com/recharge-balance/p512525813 </span> </li>
                                        <li> الكمية : <span> 100 </span> </li>
                                        <li> سعر الطلب : <span> 0.13 </span> </li>
                                        <li> الرصيد المتبقي: <span> 100 </span> </li>
                                    </ul>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-price-select" role="tabpanel"
                                        aria-labelledby="pills-price-select-tab" tabindex="0">
                                        <br>
                                        <form action="{{ route('make_order') }}" autocomplete="off" method="post"
                                            class="form-select-product-details">
                                            @csrf
                                            <p class="product-title"> أفضل خدمة زيادة مشاهادات تيليجرام من جميع دول العالم
                                                خدمة ممتازة لتكبير
                                                القنوات بسرعة، </p>
                                            <span class="gap-1 d-flex align-items-center stars">
                                                <span class="star-rating">
                                                    <span class="star-rating__item font-11"><i
                                                            class="fas fa-star"></i></span>
                                                    <span class="star-rating__item font-11"><i
                                                            class="fas fa-star"></i></span>
                                                    <span class="star-rating__item font-11"><i
                                                            class="fas fa-star"></i></span>
                                                    <span class="star-rating__item font-11"><i
                                                            class="fas fa-star"></i></span>
                                                    <span class="star-rating__item font-11"><i
                                                            class="fas fa-star"></i></span>
                                                </span>
                                                <span class="star-rating__text text-body"> ( 30 تقيم ) </span>
                                            </span>
                                            <div class="mb-3 col-sm-12 col-xs-12">
                                                <input type="hidden" name="website_serv_id" value="{{ $service['id'] }}">
                                                <input required type="hidden" name="main_service"
                                                    value="{{ $service['service_id'] }}">
                                                <input type="hidden" required name="provider_id"
                                                    value="{{ $service->provider_id }}">
                                                <input type="hidden" name="service_refill" id="service_refill"
                                                    value="">
                                                <input type="hidden" name="service_cancel" id="service_cancel"
                                                    value="">
                                                <label for="Stateee" class="mb-2 form-label font-18 font-heading fw-600">
                                                    حدد
                                                    الخدمة </label>
                                                <div class="select-has-icon">
                                                    <select required class="border common-input" id="Stateee"
                                                        name="sub_service_id">
                                                        <option value="" selected disabled> حدد الخدمة </option>
                                                        @foreach ($service['SubServices'] as $subservice)
                                                            <option value="{{ $subservice['provider_service_id'] }}">
                                                                {{ $subservice['name'] }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-xs-12">
                                                <div class="service_price">
                                                    <p> السعر لكل <span
                                                            id="min_quantity">{{ $service_from_provider->min }}</span>
                                                    </p>
                                                    <h6 id="total_price_for_min">
                                                        {{ number_format($service_from_provider->final_price, 4) }} $
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-xs-12">
                                                <label for="account_link"
                                                    class="mb-2 form-label font-18 font-heading fw-600">
                                                    الرابط </label>
                                                <input required type="url" name="account_link"
                                                    class="border common-input common-input--grayBg" id="account_link"
                                                    placeholder=" ضع رابط القناة أو الجروب هنا... ">
                                            </div>

                                            <div class="mb-3 col-sm-12 col-xs-12">
                                                <label for="follower_num"
                                                    class="mb-2 form-label font-18 font-heading fw-600">
                                                    الكمية
                                                </label>
                                                <input type="number" required min="{{ $service_from_provider->min }}"
                                                    max="{{ $service_from_provider->max }}" name="followers_num"
                                                    class="common-input" id="follower_num"
                                                    placeholder="ادخل العدد المطلوب">
                                                <div class="min_max_quantity">
                                                    <p> الحد الأدنى لطلب الخدمة هو <span
                                                            id="min_quantity">{{ $service_from_provider->min }}</span>
                                                    </p>
                                                    <p> الحد الأقصى لطلب الخدمة هو <span
                                                            id="max_quantity">{{ $service_from_provider->max }}</span>
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- New Speed -->
                                            <div class="col-sm-12 col-xs-12">
                                                <label for="account_link"
                                                    class="mb-2 form-label font-18 font-heading fw-600">
                                                    السرعة </label>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-xs-12">
                                                <div class="price_section">
                                                    <h4 class="price">
                                                        <span> 16 </span>
                                                        <span> دقيقة </span>
                                                    </h4>
                                                </div>
                                                <div class="min_max_quantity">
                                                    <p> متوسط مدة التنفيذ لكل 100 زيادة بناءً على آخر 10 طلبات </p>
                                                </div>
                                            </div>
                                            <!-- End New Speed  -->
                                            <div class="col-sm-12 col-xs-12">
                                                <label for="account_link"
                                                    class="mb-2 form-label font-18 font-heading fw-600">
                                                    السعــر </label>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-xs-12 last_price">
                                                <div class="price_section">
                                                    <h4 class="price">
                                                        <span
                                                            id="final_price">{{ number_format($service_from_provider->final_price, 4) }}</span>
                                                        <span> $ </span>
                                                    </h4>
                                                    <input type="hidden" id="hidden_final_price" name="final_price"
                                                        value="">
                                                </div>
                                            </div>

                                            <button type="submit"
                                                class="gap-2 mt-32 btn btn-main d-flex w-100 justify-content-center align-items-center pill px-sm-5">
                                                تأكيد الطلب
                                                <img width="20px"
                                                    src="{{ asset('assets/front/') }}/images/icons/shopping.png"
                                                    alt="">
                                            </button>
                                            <div class="service_advantages">
                                                <div class="row">
                                                    <div class="col-lg-3 col-6">
                                                        @if ($service['speed_active'] == 1)
                                                            <div class="info">
                                                                <i class="bi bi-lightning"></i>
                                                                <p> السرعة </p>
                                                                <h5> {{ $service['speed_active_text'] }} </h5>
                                                            </div>
                                                        @else
                                                            <div class="info disabled">
                                                                <i class="bi bi-lightning"></i>
                                                                <p> السرعة </p>
                                                                <h5> غير متاح </h5>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-3 col-6">
                                                        @if ($service['start_time'] == 1)
                                                            <div class="info">
                                                                <i class="bi bi-alarm"></i>
                                                                <p> وقت البدء </p>
                                                                <h5> {{ $service['start_time_text'] }} </h5>
                                                            </div>
                                                        @else
                                                            <div class="info disabled">
                                                                <i class="bi bi-alarm"></i>
                                                                <p> وقت البدء </p>
                                                                <h5> غير متاح </h5>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-3 col-6">
                                                        @if ($service['security'] == 1)
                                                            <div class="info">
                                                                <i class="bi bi-trophy"></i>
                                                                <p> الضمان </p>
                                                                <h5> <i style="font-size: 12px;color:#23B120"
                                                                        class="fa fa-check-circle"></i>
                                                                    {{ $service['security_text'] }} </h5>
                                                            </div>
                                                        @else
                                                            <div class="info disabled">
                                                                <i class="bi bi-trophy"></i>
                                                                <p> الضمان </p>
                                                                <h5> غير متاح </h5>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-3 col-6">
                                                        @if ($service['quality_status'] == 1)
                                                            <div class="info">
                                                                <i class="bi bi-check-square"></i>
                                                                <p> الجودة </p>
                                                                <div class="progress" role="progressbar"
                                                                    aria-label="Basic example"
                                                                    aria-valuenow="{{ $service['quality_percentage'] }}"
                                                                    aria-valuemin="0" aria-valuemax="100">
                                                                    <div class="progress-bar"
                                                                        style="width: {{ $service['quality_percentage'] }}%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="info disabled">
                                                                <i class="bi bi-check-square"></i>
                                                                <p> الجودة </p>
                                                                <h5> غير متاح </h5>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <script>
                                            // عند تغيير الخدمة الفرعية من الـ select
                                            document.getElementById('Stateee').addEventListener('change', function() {
                                                const provider_service_id = this.value;
                                                const service_id = "{{ $service['id'] }}"; // أخذ ID الخدمة من الـ Blade
                                                if (provider_service_id) {
                                                    // استرجاع البيانات من السيرفر عن طريق fetch
                                                    fetch(`/get-sub-service-details/${service_id}/${provider_service_id}`)
                                                        .then(response => response.json())
                                                        .then(data => {
                                                            // تحديث البيانات بناءً على الخدمة الفرعية
                                                            document.getElementById('min_quantity').textContent = data.min;
                                                            document.getElementById('max_quantity').textContent = data.max;
                                                            document.getElementById('total_price_for_min').textContent = `${data.final_price} $`;
                                                            document.getElementById('final_price').textContent = data.final_price;
                                                            document.getElementById('hidden_final_price').value = data.final_price;
                                                            document.getElementById('service_refill').value = data.service_refill;
                                                            document.getElementById('service_cancel').value = data.service_cancel;
                                                            const followerInput = document.getElementById('follower_num');
                                                            const minQuantityElement = document.getElementById('min_quantity');
                                                            const finalPriceElement = document.getElementById('final_price');
                                                            const hiddenFinalPrice = document.getElementById('hidden_final_price');
                                                            // تحديث القيم بناءً على الخدمة الفرعية
                                                            const minQuantity = parseInt(data.min);
                                                            const totalPriceForMin = parseFloat(data.final_price);
                                                            unitPrice = totalPriceForMin / minQuantity; // حساب سعر الوحدة بناءً على الخدمة الفرعية
                                                            followerInput.addEventListener('input', function() {
                                                                const quantity = parseInt(followerInput.value);
                                                                // التحقق إذا كان العدد المدخل أكبر من أو يساوي الحد الأدنى
                                                                if (quantity >= parseInt(minQuantityElement.innerText)) {
                                                                    const totalPrice = (quantity * unitPrice).toFixed(
                                                                        4); // حساب السعر النهائي بناءً على الخدمة الأساسية أو الفرعية
                                                                    finalPriceElement.innerText =
                                                                        `${totalPrice}`; // تحديث السعر في الصفحة
                                                                    hiddenFinalPrice.value = totalPrice;
                                                                } else {
                                                                    finalPriceElement.innerText = "0"; // في حال الإدخال أقل من الحد الأدنى
                                                                    hiddenFinalPrice.value = "0";
                                                                }
                                                            });
                                                        })
                                                        .catch(error => console.error('Error:', error));
                                                }
                                            });
                                            document.addEventListener("DOMContentLoaded", function() {
                                                // العناصر المهمة
                                                const followerInput = document.getElementById('follower_num');
                                                const finalPriceElement = document.getElementById('final_price');
                                                const totalPriceForMinElement = document.getElementById('total_price_for_min');
                                                const minQuantityElement = document.getElementById('min_quantity');
                                                const hiddenFinalPrice = document.getElementById('hidden_final_price'); //
                                                let unitPrice = parseFloat(totalPriceForMinElement.innerText) / parseInt(minQuantityElement
                                                    .innerText); // الحساب الأولي لسعر الوحدة من الخدمة الأساسية
                                                // عند تغيير العدد المدخل، تحديث السعر النهائي
                                                followerInput.addEventListener('input', function() {
                                                    const quantity = parseInt(followerInput.value);
                                                    // التحقق إذا كان العدد المدخل أكبر من أو يساوي الحد الأدنى
                                                    if (quantity >= parseInt(minQuantityElement.innerText)) {
                                                        const totalPrice = (quantity * unitPrice).toFixed(
                                                            3); // حساب السعر النهائي بناءً على الخدمة الأساسية أو الفرعية
                                                        finalPriceElement.innerText = `${totalPrice}`; // تحديث السعر في الصفحة
                                                        hiddenFinalPrice.value = totalPrice;
                                                    } else {
                                                        finalPriceElement.innerText = "0"; // في حال الإدخال أقل من الحد الأدنى
                                                        hiddenFinalPrice.value = "0";
                                                    }
                                                });
                                            });
                                        </script>

                                    </div>
                                    <div class="tab-pane fade" id="pills-product-details" role="tabpanel"
                                        aria-labelledby="pills-product-details-tab" tabindex="0">
                                        <!-- Product Details Content Start -->
                                        <div class="product-details">

                                            <p class="product-details__desc">
                                                {{ $service['description'] }}
                                            </p>

                                            <div class="product-details__item">
                                                <h5 class="mb-3 product-details__title"> مميزات خدمتنا </h5>
                                                <ul class="product-list">
                                                    <li class="product-list__item"> متابعون آمنون وفعّالون: نضمن جودة
                                                        الخدمة مع
                                                        الحفاظ على أمان حسابك بالكامل. </li>
                                                    <li class="product-list__item"> دعم فني دائم: فريقنا متاح على مدار
                                                        الساعة
                                                        لضمان تجربة سلسة وخالية من المشاكل. </li>
                                                    <li class="product-list__item"> سرعة التنفيذ: تحقيق النتائج بشكل فوري
                                                        لضمان
                                                        رضاك التام. </li>
                                                    <li class="product-list__item"> أسعار تنافسية: خدمات بجودة عالية
                                                        وبأسعار
                                                        تناسب الجميع. </li>
                                                </ul>
                                            </div>
                                            <div class="product-details__item">
                                                <h5 class="mb-3 product-details__title"> الأمان والخصوصية </h5>
                                                <ul class="product-list">
                                                    <li class="product-list__item"> تجربة آمنة تمامًا: نلتزم بأعلى معايير
                                                        الأمان لضمان خصوصية حسابك وحمايته أثناء الخدمة. </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Product Details Content End -->
                                    </div>
                                    <br>
                                    <div class="tab-pane fade" id="pills-rating" role="tabpanel"
                                        aria-labelledby="pills-rating-tab" tabindex="0">
                                        <div class="mt-4 product-reviews">
                                            <!-- Single Review -->
                                            <div
                                                class="mb-3 review-item d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="reviewer-avatar">
                                                        <img src="{{ asset('assets/front/uploads/person.jpg') }}"
                                                            alt="avatar" width="40" height="40"
                                                            style="border-radius: 50%;">
                                                    </div>
                                                    <div class="mx-3 review-content">
                                                        <div class="reviewer-name">نايف الراشدي</div>
                                                        <div class="review-stars">
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                        </div>
                                                        <p> يعطيني الخدمة ممتازة </p>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <div class="review-rating"> <button class="btn btn-success btn-sm"> <i
                                                                class="bi bi-check2-circle"></i> قام بالشراء </button>
                                                    </div>
                                                    <div class="review-time text-muted">منذ 30 دقيقة</div>
                                                </div>
                                            </div>
                                            <!-- Repeat for more reviews -->
                                            <div
                                                class="mb-3 review-item d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="reviewer-avatar">
                                                        <img src="{{ asset('assets/front/images/avatar.png') }}"
                                                            alt="avatar" width="40" height="40"
                                                            style="border-radius: 50%;">
                                                    </div>
                                                    <div class="mx-3 review-content">
                                                        <div class="reviewer-name">نايف الراشدي</div>
                                                        <div class="review-stars">
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <div class="review-rating"> <button class="btn btn-success btn-sm"> <i
                                                                class="bi bi-check2-circle"></i> قام بالشراء </button>
                                                    </div>
                                                    <div class="review-time text-muted">منذ 30 دقيقة</div>
                                                </div>
                                            </div>
                                        </div>

                                        <style>

                                        </style>
                                    </div>
                                    <div class="tab-pane fade" id="pills-comments" role="tabpanel"
                                        aria-labelledby="pills-comments-tab" tabindex="0">
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ======================= Product Sidebar End ========================= -->
            </div>
        </div>

        <!-- ======================= Product Details Section End ==================== -->

        <!-- =========================== Most Requested Services Section Start ========================== -->
        <section class="py-5 most-ordered-section">
            <div class="container">
                <div class="mb-2 most-ordered-title-bar d-flex align-items-center justify-content-center">
                    <div class="most-ordered-title-line flex-grow-1"></div>
                    <h4 class="mx-3 mb-0 most-ordered-title-text">أكثر الخدمات طلباً</h4>
                    <div class="most-ordered-title-line flex-grow-1"></div>
                </div>
                <div class="mb-3 text-center most-ordered-desc">نحن نفخر بأنفسنا لتقديم خدمة رائعة</div>
                <div class="most-ordered-slider position-relative">
                    <div class="swiper most-ordered-swiper">
                        <div class="swiper-wrapper">
                            <!-- كرر هذا البلوك لكل خدمة -->
                            <div class="swiper-slide">
                                <div class="text-center most-ordered-card">
                                    <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                        class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                    <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                    <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على
                                        المنصة) + ضمان</div>
                                    <div class="mt-2 mb-1 most-ordered-rating">
                                        <span>(30)</span>
                                        <span class="stars ms-1">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="most-ordered-price">100 / <span class="text-primary">0.00#</span></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center most-ordered-card">
                                    <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                        class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                    <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                    <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على
                                        المنصة) + ضمان</div>
                                    <div class="mt-2 mb-1 most-ordered-rating">
                                        <span>(30)</span>
                                        <span class="stars ms-1">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="most-ordered-price">100 / <span class="text-primary">0.00#</span></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center most-ordered-card">
                                    <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                        class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                    <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                    <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على
                                        المنصة) + ضمان</div>
                                    <div class="mt-2 mb-1 most-ordered-rating">
                                        <span>(30)</span>
                                        <span class="stars ms-1">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="most-ordered-price">100 / <span class="text-primary">0.00#</span></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center most-ordered-card">
                                    <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                        class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                    <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                    <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على
                                        المنصة) + ضمان</div>
                                    <div class="mt-2 mb-1 most-ordered-rating">
                                        <span>(30)</span>
                                        <span class="stars ms-1">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="most-ordered-price">100 / <span class="text-primary">0.00#</span></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center most-ordered-card">
                                    <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                        class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                    <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                    <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على
                                        المنصة) + ضمان</div>
                                    <div class="mt-2 mb-1 most-ordered-rating">
                                        <span>(30)</span>
                                        <span class="stars ms-1">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="most-ordered-price">100 / <span class="text-primary">0.00#</span></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center most-ordered-card">
                                    <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                        class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                    <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                    <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على
                                        المنصة) + ضمان</div>
                                    <div class="mt-2 mb-1 most-ordered-rating">
                                        <span>(30)</span>
                                        <span class="stars ms-1">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="most-ordered-price">100 / <span class="text-primary">0.00#</span></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center most-ordered-card">
                                    <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                        class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                    <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                    <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على
                                        المنصة) + ضمان</div>
                                    <div class="mt-2 mb-1 most-ordered-rating">
                                        <span>(30)</span>
                                        <span class="stars ms-1">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="most-ordered-price">100 / <span class="text-primary">0.00#</span></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center most-ordered-card">
                                    <img src="{{ asset('assets/front/images/icons/insta.png') }}"
                                        class="mb-2 most-ordered-img" alt="زيادة لايكات انستقرام">
                                    <div class="most-ordered-title">زيادة لايكات انستقرام</div>
                                    <div class="most-ordered-desc-card">زيادة لايكات انستقرام بسرعة جداً (الأرخص على
                                        المنصة) + ضمان</div>
                                    <div class="mt-2 mb-1 most-ordered-rating">
                                        <span>(30)</span>
                                        <span class="stars ms-1">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="most-ordered-price">100 / <span class="text-primary">0.00#</span></div>
                                </div>
                            </div>
                            <!-- ... كرر البطاقات حسب الحاجة ... -->
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =========================== Most Requested Services Section End ========================== -->

        <!-- =========================== Arrival Product Section Start ========================== -->
        <section class="arrival-product padding-y-120 section-bg position-relative z-index-1">
            <img src="{{ asset('assets/front/') }}/images/gradients/product-gradient.png" alt=""
                class="bg--gradient white-version">

            <img src="{{ asset('assets/front/') }}/images/shapes/element2.png" alt="" class="element one">

            <div class="container container-two">
                <div class="section-heading">
                    <h3 class="section-heading__title"> اشتري المستخدمون ايضا </h3>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                        aria-labelledby="pills-all-tab" tabindex="0">
                        <div class="row gy-4">
                            @foreach ($samservices as $service)
                                <div class="col-xl-3 col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="product-item__thumb d-flex">
                                            <a href="{{ url('product/' . $service['slug']) }}" class="link w-100">
                                                <img src="{{ asset('assets/uploads/Product_images/' . $service['image']) }}"
                                                    alt="{{ $service['name'] }}" class="cover-img">
                                            </a>
                                            <button type="button" class="product-item__wishlist"><i
                                                    class="fas fa-heart"></i></button>
                                        </div>
                                        <div class="product-item__content">
                                            <h6 class="product-item__title">
                                                <a href="{{ url('product/' . $service['slug']) }}" class="link">
                                                    {{ $service['name'] }} </a>
                                            </h6>
                                            <div class="gap-2 product-item__info flx-between">

                                                <div class="gap-2 flx-align">
                                                    {{-- <h6 class="mb-0 product-item__price"> 100 $ </h6> --}}
                                                    {{-- <span
                                            class="product-item__prevPrice text-decoration-line-through">$259</span> --}}
                                                </div>
                                            </div>
                                            {{-- <div class="gap-2 product-item__bottom flx-between">
                                    <div>
                                        <span class="mb-2 product-item__sales font-14">1200 مبيعة </span>
                                        <div class="gap-1 d-flex align-items-center">
                                            <ul class="star-rating">
                                                <li class="star-rating__item font-11"><i
                                                        class="fas fa-star"></i></li>
                                                <li class="star-rating__item font-11"><i
                                                        class="fas fa-star"></i></li>
                                                <li class="star-rating__item font-11"><i
                                                        class="fas fa-star"></i></li>
                                                <li class="star-rating__item font-11"><i
                                                        class="fas fa-star"></i></li>
                                                <li class="star-rating__item font-11"><i
                                                        class="fas fa-star"></i></li>
                                            </ul>
                                            <span class="star-rating__text text-heading fw-500 font-14">
                                                (16)
                                            </span>
                                        </div>
                                    </div>

                                </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =========================== Arrival Product Section End ========================== -->
    @endsection


    @section('js')
        <!-- SwiperJS CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new Swiper('.most-ordered-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 24,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    autoplay: {
                        delay: 1500,
                        disableOnInteraction: false,
                    },
                    loop: true,
                    breakpoints: {
                        576: {
                            slidesPerView: 2
                        },
                        992: {
                            slidesPerView: 3
                        },
                        1200: {
                            slidesPerView: 4
                        }
                    }
                });
            });
        </script>
    @endsection
