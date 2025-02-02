@extends('front.layouts.master')
@section('title')
    {{ $service['name'] }}
@endsection
@section('content')
    <!-- ======================== Breadcrumb Two Section Start ===================== -->
    <section class="breadcrumb border-bottom p-0 d-block section-bg position-relative z-index-1">

        <div class="breadcrumb-two">
            <img src="{{ asset('assets/front/') }}/images/gradients/breadcrumb-gradient-bg.png" alt=""
                class="bg--gradient">
            <div class="container container-two">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="breadcrumb-two-content">

                            <ul class="breadcrumb-list flx-align gap-2 mb-2">
                                <li class="breadcrumb-list__item font-14 text-body">
                                    <a href="index.html" class="breadcrumb-list__link text-body hover-text-main"> الرئيسية
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
                                <li class="breadcrumb-list__item font-14 text-body">
                                    <span class="breadcrumb-list__text"> {{ $service['name'] }} </span>
                                </li>
                            </ul>

                            <h3 class="breadcrumb-two-content__title mb-3 text-capitalize"> {{ $service['name'] }} </h3>

                            <div class="breadcrumb-content flx-align gap-3">

                                {{-- <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                    <span class="icon">
                                        <img src="{{ asset('assets/front/') }}/images/icons/cart-icon.svg" alt=""
                                            class="white-version">
                                        <img src="{{ asset('assets/front/') }}/images/icons/cart-white.svg" alt=""
                                            class="dark-version w-20">
                                    </span>
                                    <span class="text"> 200 مبيعــة </span>
                                </div> --}}
                                {{-- <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                    <span class="icon">
                                        <img src="{{ asset('assets/front/') }}/images/icons/check-icon.svg" alt=""
                                            class="white-version">
                                        <img src="{{ asset('assets/front/') }}/images/icons/check-icon-white.svg"
                                            alt="" class="dark-version">
                                    </span>
                                    <span class="text"> ضمان مدى الحياة </span>
                                </div> --}}
                                {{-- <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                    <span class="icon">
                                        <img src="{{ asset('assets/front/') }}/images/icons/check-icon.svg" alt=""
                                            class="white-version">
                                        <img src="{{ asset('assets/front/') }}/images/icons/check-icon-white.svg"
                                            alt="" class="dark-version">
                                    </span>
                                    <span class="text"> 29 تقييم </span>
                                </div> --}}
                            </div>
                            {{-- <div class="breadcrupm_price_section">
                                <h5 type="button" class="font-heading font-18"> السعر لكل <span class="numbers"> 50 </span>
                                </h5>
                                <h6 class="product-sidebar__title product_price"> 1.00 <span> ر.س </span> </h6>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================== Breadcrumb Two Section End ===================== -->
    <!-- ======================= Product Details Section Start ==================== -->
    <div class="product-details mt-32 padding-b-120">
        <div class="container container-two">
            <div class="row gy-4">
                <div class="col-lg-5">
                    <div class="product-details__thumb">
                        <img src="{{ asset('assets/uploads/Product_images/' . $service['image']) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <!-- ======================= Product Sidebar Start ========================= -->
                    <div class="product-sidebar section-bg">
                        <div class="container container-two">
                            <div class="breadcrumb-tab flx-wrap align-items-start gap-lg-4 gap-2">
                                <ul class="nav tab-bordered nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-price-select-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-price-select" type="button" role="tab"
                                            aria-controls="pills-price-select" aria-selected="true"> الخيــــارات </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-product-details-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-product-details" type="button" role="tab"
                                            aria-controls="pills-product-details" aria-selected="true"> تفاصيــل المنتــج
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-rating-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-rating" type="button" role="tab"
                                            aria-controls="pills-rating" aria-selected="false">
                                            <span class="d-flex align-items-center gap-1">
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
                                                <span class="star-rating__text text-body"> 5.0</span>
                                                <span class="star-rating__text text-body"> <span> </span>
                                                    التقيمــات </span>
                                            </span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-price-select" role="tabpanel"
                                    aria-labelledby="pills-price-select-tab" tabindex="0">
                                    <br>
                                    <form action="{{ route('make_order') }}" autocomplete="off" method="post"
                                        class="form-select-product-details">
                                        @csrf
                                        <div class="col-sm-12 col-xs-12 mb-3">
                                            <input type="hidden" name="website_serv_id" value="{{ $service['id'] }}">
                                            <input required type="hidden" name="main_service"
                                                value="{{ $service['service_id'] }}">
                                            <input type="hidden" required name="provider_id"
                                                value="{{ $service->provider_id }}">
                                                <input type="hidden" name="service_refill" id="service_refill" value="">
                                                <input type="hidden" name="service_cancel" id="service_cancel" value="">
                                            <label for="Stateee" class="form-label mb-2 font-18 font-heading fw-600"> حدد
                                                الخدمة </label>
                                            <div class="select-has-icon">
                                                <select required class="common-input border" id="Stateee"
                                                    name="sub_service_id">
                                                    <option value="" selected disabled> حدد الخدمة </option>
                                                    @foreach ($service['SubServices'] as $subservice)
                                                        <option value="{{ $subservice['provider_service_id'] }}">
                                                            {{ $subservice['name'] }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xs-12 mb-3">
                                            <div class="service_price">
                                                <p> السعر لكل <span
                                                        id="min_quantity">{{ $service_from_provider->min }}</span>
                                                </p>
                                                <h6 id="total_price_for_min">
                                                    {{ number_format($service_from_provider->final_price, 4) }} $
                                                </h6>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-xs-12 mb-3">
                                            <label for="follower_num" class="form-label mb-2 font-18 font-heading fw-600">
                                                العدد المطلوب
                                            </label>
                                            <input type="number" required min="{{ $service_from_provider->min }}"
                                                max="{{ $service_from_provider->max }}" name="followers_num"
                                                class="common-input" id="follower_num" placeholder="ادخل العدد المطلوب">
                                            <div class="min_max_quantity">
                                                <p> اقل عدد هو :: <span
                                                        id="min_quantity">{{ $service_from_provider->min }}</span> </p>
                                                <p> اكبر عدد هو :: <span
                                                        id="max_quantity">{{ $service_from_provider->max }}</span> </p>
                                            </div>

                                        </div>
                                        <div class="col-sm-12 col-xs-12 mb-3">
                                            <label for="account_link" class="form-label mb-2 font-18 font-heading fw-600">
                                                الرابط </label>
                                            <input required type="url" name="account_link"
                                                class="common-input common-input--grayBg border" id="account_link"
                                                placeholder="  ضع رابط الحساب هنا  ">
                                        </div>
                                        <div class="col-sm-12 col-xs-12 mb-3 last_price">
                                            <div class="price_section">
                                                <p>
                                                    <img src="{{ asset('assets/front/images/money1.svg') }}"
                                                        alt=""> السعــر الكــلي
                                                </p>
                                                <h4 class="price">
                                                    <span
                                                        id="final_price">{{ number_format($service_from_provider->final_price, 4) }}</span>
                                                    <span> $ </span>
                                                </h4>
                                                <input type="hidden" id="hidden_final_price" name="final_price"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="service_advantages">
                                            <div class="row">
                                                <div class="col-lg-3 col-6">
                                                    @if ($service['speed_active'] == 1)
                                                        <div class="info">
                                                            <i class="fa fa-bolt"></i>
                                                            <p> السرعة </p>
                                                            <h5> {{ $service['speed_active_text'] }} </h5>
                                                        </div>
                                                    @else
                                                        <div class="info disabled">
                                                            <i class="fa fa-bolt"></i>
                                                            <p> السرعة </p>
                                                            <h5> غير متاح </h5>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    @if ($service['start_time'] == 1)
                                                        <div class="info">
                                                            <i class="fa fa-stopwatch"></i>
                                                            <p> وقت البدء </p>
                                                            <h5> {{ $service['start_time_text'] }} </h5>
                                                        </div>
                                                    @else
                                                        <div class="info disabled">
                                                            <i class="fa fa-stopwatch"></i>
                                                            <p> وقت البدء </p>
                                                            <h5> غير متاح </h5>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-3 col-6">
                                                    @if ($service['security'] == 1)
                                                        <div class="info">
                                                            <i class="fa fa-lock"></i>
                                                            <p> الضمان </p>
                                                            <h5> {{ $service['security_text'] }} </h5>
                                                        </div>
                                                    @else
                                                        <div class="info disabled">
                                                            <i class="fa fa-lock"></i>
                                                            <p> الضمان </p>
                                                            <h5> غير متاح </h5>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-3  col-6">
                                                    @if ($service['quality_status'] == 1)
                                                        <div class="info">
                                                            <i class="fa fa-check-double"></i>
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
                                                            <i class="fa fa-check-double"></i>
                                                            <p> الجودة </p>
                                                            <h5> غير متاح </h5>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-main d-flex w-100 justify-content-center align-items-center gap-2 pill px-sm-5 mt-32">
                                            طلب الخدمة الان
                                            <img src="{{ asset('assets/front/') }}/images/icons/add-to-cart.svg"
                                                alt="">
                                        </button>
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
                                            <h5 class="product-details__title mb-3"> مميزات خدمتنا </h5>
                                            <ul class="product-list">
                                                <li class="product-list__item"> متابعون آمنون وفعّالون: نضمن جودة الخدمة مع
                                                    الحفاظ على أمان حسابك بالكامل. </li>
                                                <li class="product-list__item"> دعم فني دائم: فريقنا متاح على مدار الساعة
                                                    لضمان تجربة سلسة وخالية من المشاكل. </li>
                                                <li class="product-list__item"> سرعة التنفيذ: تحقيق النتائج بشكل فوري لضمان
                                                    رضاك التام. </li>
                                                <li class="product-list__item"> أسعار تنافسية: خدمات بجودة عالية وبأسعار
                                                    تناسب الجميع. </li>
                                            </ul>
                                        </div>
                                        <div class="product-details__item">
                                            <h5 class="product-details__title mb-3"> الأمان والخصوصية </h5>
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
                                    <div class="product-review-wrapper">
                                        <div class="product-review">
                                            <div class="product-review__top flx-between">
                                                <div class="product-review__rating flx-align">
                                                    <div class="d-flex align-items-center gap-1">
                                                        <ul class="star-rating">
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                        </ul>
                                                        <span class="star-rating__text text-body"> 5.0</span>
                                                    </div>
                                                </div>
                                                <div class="product-review__date">
                                                    بواسطة <a href="#" class="product-review__user text--base"> محمد
                                                        رمضان </a>
                                                    منذ شهرين
                                                </div>
                                            </div>
                                            <div class="product-review__body">
                                                <p class="product-review__desc"> تعامل رائع ومضمون .. عن نفسي مو اول مره
                                                    اتعامل معهم في مصداقيه وارتحت معاهم يشهد الله ♥️ </p>
                                            </div>
                                        </div>
                                        <div class="product-review">
                                            <div class="product-review__top flx-between">
                                                <div class="product-review__rating flx-align">
                                                    <div class="d-flex align-items-center gap-1">
                                                        <ul class="star-rating">
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                        </ul>
                                                        <span class="star-rating__text text-body"> 5.0</span>
                                                    </div>
                                                </div>
                                                <div class="product-review__date">
                                                    بواسطة <a href="#" class="product-review__user text--base"> محمد
                                                        رمضان </a>
                                                    منذ شهرين
                                                </div>
                                            </div>
                                            <div class="product-review__body">
                                                <p class="product-review__desc"> تعامل رائع ومضمون .. عن نفسي مو اول مره
                                                    اتعامل معهم في مصداقيه وارتحت معاهم يشهد الله ♥️ </p>
                                            </div>
                                        </div>
                                        <div class="product-review">
                                            <div class="product-review__top flx-between">
                                                <div class="product-review__rating flx-align">
                                                    <div class="d-flex align-items-center gap-1">
                                                        <ul class="star-rating">
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                        </ul>
                                                        <span class="star-rating__text text-body"> 5.0</span>
                                                    </div>
                                                </div>
                                                <div class="product-review__date">
                                                    بواسطة <a href="#" class="product-review__user text--base"> محمد
                                                        رمضان </a>
                                                    منذ شهرين
                                                </div>
                                            </div>
                                            <div class="product-review__body">
                                                <p class="product-review__desc"> تعامل رائع ومضمون .. عن نفسي مو اول مره
                                                    اتعامل معهم في مصداقيه وارتحت معاهم يشهد الله ♥️ </p>
                                            </div>
                                        </div>

                                        <div class="product-review">
                                            <div class="product-review__top flx-between">
                                                <div class="product-review__rating flx-align">
                                                    <div class="d-flex align-items-center gap-1">
                                                        <ul class="star-rating">
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                            <li class="star-rating__item font-11"><i
                                                                    class="fas fa-star"></i>
                                                            </li>
                                                        </ul>
                                                        <span class="star-rating__text text-body"> 5.0</span>
                                                    </div>
                                                </div>
                                                <div class="product-review__date">
                                                    بواسطة <a href="#" class="product-review__user text--base"> محمد
                                                        رمضان </a>
                                                    منذ شهرين
                                                </div>
                                            </div>
                                            <div class="product-review__body">
                                                <p class="product-review__desc"> تعامل رائع ومضمون .. عن نفسي مو اول مره
                                                    اتعامل معهم في مصداقيه وارتحت معاهم يشهد الله ♥️ </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-comments" role="tabpanel"
                                    aria-labelledby="pills-comments-tab" tabindex="0">
                                </div>



                            </div>
                        </div>
                    </div>

                </div>
                <!-- ======================= Product Sidebar End ========================= -->
            </div>
        </div>
    </div>
    </div>
    <!-- ======================= Product Details Section End ==================== -->
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
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab"
                    tabindex="0">
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
                                        <div class="product-item__info flx-between gap-2">

                                            <div class="flx-align gap-2">
                                                {{-- <h6 class="product-item__price mb-0"> 100 $ </h6> --}}
                                                {{-- <span
                                            class="product-item__prevPrice text-decoration-line-through">$259</span> --}}
                                            </div>
                                        </div>
                                        {{-- <div class="product-item__bottom flx-between gap-2">
                                    <div>
                                        <span class="product-item__sales font-14 mb-2">1200 مبيعة </span>
                                        <div class="d-flex align-items-center gap-1">
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
@endsection
