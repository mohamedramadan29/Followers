@extends('front.layouts.master')
@section('title', ' شحن الرصيد ')
@section('content')
<!-- ======================== Breadcrumb Three Section Start ===================== -->
<section class="overflow-hidden breadcrumb-three section-bg position-relative z-index-1">

    <img src="{{ asset('assets/front/') }}/images/gradients/breadcrumb-gradient-bg.png" alt="" class="bg--gradient">

    <img src="{{ asset('assets/front/') }}/images/shapes/element-moon3.png" alt="" class="element one">
    <img src="{{ asset('assets/front/') }}/images/shapes/element-moon1.png" alt="" class="element three">

    <div class="container container-two">
        <div class="breadcrumb-three-content border-bottom border-color">
            <div class="breadcrumb-three-content__inner">
                <div class="breadcrumb-three-content__left">
                    <div class="gap-3 flx-between align-items-end">
                        <div class="gap-2 author-profile d-flex flex-column">
                            <div class="flex-shrink-0 author-profile__thumb">
                                @if (Auth::user()->image != '')
                                <img style="border-radius: 50%;height:95%;width:95%"
                                    src="{{ asset('assets/uploads/Users/' . Auth::user()->image) }}" alt="">
                                @else
                                <img style="border-radius: 50%;height:95%;width:95%"
                                    src="{{ asset('assets/uploads/Users/user_avatar.png') }}" alt="">
                                @endif

                            </div>

                            <div class="flex-wrap gap-4 d-flex align-items-end">
                                <div class="author-profile__info">
                                    <h5 class="mb-2 author-profile__name"> {{ Auth::user()->name }} </h5>
                                    <span class="author-profile__membership font-14"> عضو
                                        {{ \Carbon\Carbon::parse(Auth::user()->created_at)->diffForHumans() }} </span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex-shrink-0 gap-4 breadcrumb-three-content__right d-flex align-items-center gap-lg-5">

                            <div class="sales">
                                <span class="mb-1 sales__text text-heading fw-500">الرصيد الحالي </span>
                                <h5 class="mb-0 sales__amount">15,830 ر.س</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="mt-4 nav tab-bordered nav-pills" id="pills-tabbs" role="tablist">

                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/orders') }}" class="nav-link"> طلباتي </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/balance') }}" class="nav-link active"> الرصيد </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/tickets') }}" class="nav-link"> تذاكر الدعم <span
                                class="notification">2</span> </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/setting') }}" class="nav-link"> الاعدادات </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/alerts') }}" class="nav-link"> التنبيهات </a>
                    </li>

                </ul>
        </div>
    </div>
</section>
<!-- ======================== Breadcrumb Three Section End ===================== -->

<!-- ===================== orders Section Start ============================== -->
<section class="pt-5 profile padding-b-120">
    <div class="container container-two">
        <div class="tab-content" id="pills-tabb">
            <div class="tab-pane fade show active" id="pills-Followingg" role="tabpanel"
                aria-labelledby="pills-Followingg-tab" tabindex="0">
                <!-- ================== Setting Balance  Start ====================== -->
                <div class="row gy-5">
                    <div class="col-lg-8 pe-sm-5">
                        <div class="cart-personal__content">
                            <h5 class="mb-32 cart-personal__title">Personal information</h5>
                            <form action="#">
                                <div class="mb-4">
                                    <label for="email" class="mb-2 form-label font-18 fw-500 font-heading">Email Address
                                        <span class="text-danger">*</span>
                                    </label>
                                    <span class="mb-2 text d-block">We will send the purchase receipt to this
                                        address.</span>
                                    <input type="email" class="common-input" id="email" placeholder="Email address" />
                                </div>
                                <div class="mb-4">
                                    <label for="name" class="mb-2 form-label font-18 fw-500 font-heading">First Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <span class="mb-2 text d-block">We will use this to personalize your account
                                        experience.</span>
                                    <input type="text" class="common-input" id="name" placeholder="First name" />
                                </div>
                                <div class="mb-4">
                                    <label for="lastName" class="mb-2 form-label font-18 fw-500 font-heading">Last name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <span class="mb-2 text d-block">We will use this to personalize your account
                                        experience.</span>
                                    <input type="text" class="common-input" id="lastName" placeholder="Last name" />
                                </div>
                                <div class="mt-32 mb-32">
                                    <div class="common-check">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="agree" />
                                        <label class="mb-0 form-check-label" for="agree">Agree To Terms</label>
                                    </div>
                                    <div class="mb-0 common-check">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="privacy" />
                                        <label class="mb-0 form-check-label" for="privacy">Agree To Privacy
                                            Policy</label>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <form action="#" class="gap-3 apply-coupon flx-align">
                            <input type="text" class="w-auto common-input common-input--md pill"
                                placeholder="Coupon code" />
                            <button type="submit"
                                class="gap-2 px-4 py-3 btn btn-main btn-md px-sm-5 flx-align pill fw-300">
                                Apply
                            </button>
                        </form>

                        <!-- Payment Method Start -->
                        <div class="mt-4 shadow card common-card">
                            <div class="p-4 bg-white card-header">
                                <h6 class="mb-0">Payment Method</h6>
                            </div>
                            <div class="p-4 card-body">
                                <div class="payment-select-card-wrapper">
                                    <div class="mb-4 payment-select-card">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="gap-3 d-flex align-items-center">
                                                <div class="mb-0 common-check common-radio">
                                                    <input class="form-check-input" type="radio" name="radio"
                                                        id="paypal" />
                                                    <label class="form-check-label" for="paypal"> </label>
                                                </div>
                                                <div class="">
                                                    <h6 class="mb-0 font-16">Paypal</h6>
                                                    <p class="font-14">Lorem ipsum dolor sit amet.</p>
                                                </div>
                                            </div>
                                            <div class="payment-select-card__logo">
                                                <img src="../../../upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/800px-PayPal.svg.png"
                                                    alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 payment-select-card">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="gap-3 d-flex align-items-center">
                                                <div class="mb-0 common-check common-radio">
                                                    <input class="form-check-input" type="radio" name="radio"
                                                        id="paypal2" />
                                                    <label class="form-check-label" for="paypal2">
                                                    </label>
                                                </div>
                                                <div class="">
                                                    <h6 class="mb-0 font-16">Paypal</h6>
                                                    <p class="font-14">Lorem ipsum dolor sit amet.</p>
                                                </div>
                                            </div>
                                            <div class="payment-select-card__logo">
                                                <img src="../../../upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/800px-PayPal.svg.png"
                                                    alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 payment-select-card">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="gap-3 d-flex align-items-center">
                                                <div class="mb-0 common-check common-radio">
                                                    <input class="form-check-input" type="radio" name="radio"
                                                        id="paypal3" />
                                                    <label class="form-check-label" for="paypal3">
                                                    </label>
                                                </div>
                                                <div class="">
                                                    <h6 class="mb-0 font-16">Paypal</h6>
                                                    <p class="font-14">Lorem ipsum dolor sit amet.</p>
                                                </div>
                                            </div>
                                            <div class="payment-select-card__logo">
                                                <img src="../../../upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/800px-PayPal.svg.png"
                                                    alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 payment-select-card">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="gap-3 d-flex align-items-center">
                                                <div class="mb-0 common-check common-radio">
                                                    <input class="form-check-input" type="radio" name="radio"
                                                        id="paypal4" />
                                                    <label class="form-check-label" for="paypal4">
                                                    </label>
                                                </div>
                                                <div class="">
                                                    <h6 class="mb-0 font-16">Paypal</h6>
                                                    <p class="font-14">Lorem ipsum dolor sit amet.</p>
                                                </div>
                                            </div>
                                            <div class="payment-select-card__logo">
                                                <img src="../../../upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/800px-PayPal.svg.png"
                                                    alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 payment-select-card">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="gap-3 d-flex align-items-center">
                                                <div class="mb-0 common-check common-radio">
                                                    <input class="form-check-input" type="radio" name="radio"
                                                        id="paypal5" />
                                                    <label class="form-check-label" for="paypal5">
                                                    </label>
                                                </div>
                                                <div class="">
                                                    <h6 class="mb-0 font-16">Paypal</h6>
                                                    <p class="font-14">Lorem ipsum dolor sit amet.</p>
                                                </div>
                                            </div>
                                            <div class="payment-select-card__logo">
                                                <img src="../../../upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/800px-PayPal.svg.png"
                                                    alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="payment-select-card">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="gap-3 d-flex align-items-center">
                                                <div class="mb-0 common-check common-radio">
                                                    <input class="form-check-input" type="radio" name="radio"
                                                        id="paypal6" />
                                                    <label class="form-check-label" for="paypal6">
                                                    </label>
                                                </div>
                                                <div class="">
                                                    <h6 class="mb-0 font-16">Paypal</h6>
                                                    <p class="font-14">Lorem ipsum dolor sit amet.</p>
                                                </div>
                                            </div>
                                            <div class="payment-select-card__logo">
                                                <img src="../../../upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/800px-PayPal.svg.png"
                                                    alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Payment Method End -->

                        <div class="gap-2 cart-content__bottom flx-between">
                            <a href="cart.html" class="gap-2 btn btn-outline-light flx-align pill btn-lg">
                                <span class="icon line-height-1 font-20"><i class="las la-arrow-left"></i></span>
                                Back
                            </a>
                            <a href="cart-payment.html" class="gap-2 btn btn-main flx-align pill btn-lg">
                                Proceed To Payment
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order-summary">
                            <h5 class="mb-32 order-summary__title">Order Summary</h5>
                            <ul class="billing-list">
                                <li class="billing-list__item flx-between">
                                    <span class="text text-heading fw-500">You have 3 items</span>
                                    <span class="amount text-heading fw-500">$259.00</span>
                                </li>
                                <li class="billing-list__item flx-between">
                                    <span class="text text-heading fw-500">Discount</span>
                                    <span class="amount text-body">$00.00</span>
                                </li>
                                <li class="billing-list__item flx-between">
                                    <span class="text text-heading fw-500">Handling Fee</span>
                                    <span class="amount text-body">$15.00</span>
                                </li>
                                <li class="billing-list__item flx-between">
                                    <span class="text text-heading fw-500">Subtotal</span>
                                    <span class="amount text-body">$15.00</span>
                                </li>
                                <li class="billing-list__item flx-between">
                                    <span class="text text-heading font-20 fw-500 font-heading">Total</span>
                                    <span class="amount text-heading font-20 fw-500 font-heading">$274.00</span>
                                </li>
                            </ul>
                            <button type="submit" class="mt-32 btn btn-outline-light pill btn-lg w-100">
                                <span class="icon icon-left">
                                    <img src="assets/images/icons/cart-reverse.svg" alt="" class="white-version" />
                                    <img src="assets/images/icons/cart-white.svg" alt="" class="dark-version" />
                                </span>
                                Purchased Now
                            </button>
                        </div>
                    </div>
                </div>
                <!-- ================== Setting Section End ====================== -->
            </div>
        </div>
    </div>
</section>
<!-- ===================== Profile Section End ============================== -->


@endsection
