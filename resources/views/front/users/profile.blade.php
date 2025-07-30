@extends('front.layouts.master')
@section('title', ' حسابي ')
@section('content')


    <!-- ======================== Breadcrumb Three Section Start ===================== -->
    <section class="overflow-hidden breadcrumb-three section-bg position-relative z-index-1">

        <img src="{{ asset('assets/front/') }}/images/gradients/breadcrumb-gradient-bg.png" alt=""
            class="bg--gradient">

        <img src="{{ asset('assets/front/') }}/images/shapes/element-moon3.png" alt="" class="element one">
        <img src="{{ asset('assets/front/') }}/images/shapes/element-moon1.png" alt="" class="element three">

        <div class="container container-two">
            <div class="breadcrumb-three-content border-bottom border-color">
                <div class="breadcrumb-three-content__inner">
                    <div class="breadcrumb-three-content__left">
                        <div class="gap-3 flx-between align-items-end">
                            <div class="gap-2 author-profile d-flex flex-column">
                                <div class="flex-shrink-0 author-profile__thumb">
                                    <img src="{{ asset('assets/front/') }}/images/thumbs/author-profile.png" alt="">
                                </div>

                                <div class="flex-wrap gap-4 d-flex align-items-end">
                                    <div class="author-profile__info">
                                        <h5 class="mb-2 author-profile__name"> محمد رمضان </h5>
                                        <span class="author-profile__membership font-14"> عضو منذ اسبوع </span>
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
                        <a href="{{ url('user/balance') }}" class="nav-link"> الرصيد </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/tickets') }}" class="nav-link"> تذاكر الدعم <span
                                class="notification">2</span> </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/setting') }}" class="nav-link active"> الاعدادات </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/alerts') }}" class="nav-link active"> التنبيهات </a>
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

                <div class="tab-pane fade show active" id="pills-orders" role="tabpanel" aria-labelledby="pills-orders-tab"
                    tabindex="0">
                    <!-- ========================= Orders section start =========================== -->
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <div class="border statement-item card common-card border-gray-five">
                                <div class="card-body">
                                    <div class="statement-item__header">
                                        <h6 class="statement-item__title"> الرصيد الحالي </h6>
                                    </div>
                                    <ul class="statement-list">
                                        <li class="text-center statement-list__item">

                                            <h6 class="mt-1 mb-0 statement-list__amount fw-600">
                                                $50.00
                                            </h6>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="border statement-item card common-card border-gray-five">
                                <div class="card-body">
                                    <div class="statement-item__header">
                                        <h6 class="statement-item__title"> انفقت معنا </h6>
                                    </div>
                                    <ul class="statement-list">
                                        <li class="text-center statement-list__item">
                                            <h6 class="mt-1 mb-0 statement-list__amount fw-600">
                                                $100.00
                                            </h6>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="border card common-card border-gray-five">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-body mt--24">
                                            <thead>
                                                <tr>
                                                    <th>تاريخ الطلب </th>
                                                    <th> رقم الطلب </th>
                                                    <th>اسم الخدمة </th>
                                                    <th>السعر </th>
                                                    <th>حالة الطلب </th>
                                                    <th>تافصيل </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td data-label="Date">2022-12-31 03:36 AM</td>
                                                    <td data-label="Order ID">#DR54745425478</td>
                                                    <td data-label="Type">زيادة لايكات انستقرام سريعة جداً </td>
                                                    <td data-label="Price">59.00 ر.س</td>
                                                    <td data-label="status"> <span class="badge badge-success bg-success">
                                                            تم التنفيذ </span> </td>
                                                    <td data-label="Details">
                                                        <a href="#" class="btn btn-main"><i
                                                                class="far fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td data-label="Date">2022-12-31 03:36 AM</td>
                                                    <td data-label="Order ID">#DR54745425478</td>
                                                    <td data-label="Type">زيادة لايكات انستقرام سريعة جداً </td>
                                                    <td data-label="Price">59.00 ر.س</td>
                                                    <td data-label="status"> <span class="badge badge-success bg-warning">
                                                            جاري التنفيذ </span> </td>
                                                    <td data-label="Details">
                                                        <a href="#" class="btn btn-main"><i
                                                                class="far fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td data-label="Date">2022-12-31 03:36 AM</td>
                                                    <td data-label="Order ID">#DR54745425478</td>
                                                    <td data-label="Type">زيادة لايكات انستقرام سريعة جداً </td>
                                                    <td data-label="Price">59.00 ر.س</td>
                                                    <td data-label="status"> <span class="badge badge-success bg-success">
                                                            تم التنفيذ </span> </td>
                                                    <td data-label="Details">
                                                        <a href="#" class="btn btn-main"><i
                                                                class="far fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td data-label="Date">2022-12-31 03:36 AM</td>
                                                    <td data-label="Order ID">#DR54745425478</td>
                                                    <td data-label="Type">زيادة لايكات انستقرام سريعة جداً </td>
                                                    <td data-label="Price">59.00 ر.س</td>
                                                    <td data-label="status"> <span class="badge badge-success bg-success">
                                                            تم التنفيذ </span> </td>
                                                    <td data-label="Details">
                                                        <a href="#" class="btn btn-main"><i
                                                                class="far fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td data-label="Date">2022-12-31 03:36 AM</td>
                                                    <td data-label="Order ID">#DR54745425478</td>
                                                    <td data-label="Type">زيادة لايكات انستقرام سريعة جداً </td>
                                                    <td data-label="Price">59.00 ر.س</td>
                                                    <td data-label="status"> <span class="badge badge-success bg-success">
                                                            تم التنفيذ </span> </td>
                                                    <td data-label="Details">
                                                        <a href="#" class="btn btn-main"><i
                                                                class="far fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="gap-2 flx-between">
                                            <div class="flex-nowrap gap-3 paginate-content flx-align">

                                            </div>
                                            <nav aria-label="Page navigation example">
                                                <ul class="mt-0 pagination common-pagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">4</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="flex-nowrap gap-2 page-link flx-align"
                                                            href="#">التالي
                                                            <span class="icon line-height-1 font-20"><i
                                                                    class="las la-arrow-left"></i></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ========================= Orders section End =========================== -->
                </div>

                <div class="tab-pane fade" id="pills-portfolio" role="tabpanel" aria-labelledby="pills-portfolio-tab"
                    tabindex="0">
                    <!-- Profile Portfolio Content Star -->

                    <div class="row gy-4">
                        <div class="mt-64 text-center">
                            <a href="#" class="btn btn-main btn-lg pill fw-300">
                                شحن الرصيد
                            </a>
                        </div>

                        <div class="col-lg-6">
                            <div class="border statement-item card common-card border-gray-five">
                                <div class="card-body">
                                    <div class="statement-item__header">
                                        <h6 class="statement-item__title"> الرصيد الحالي </h6>
                                    </div>
                                    <ul class="statement-list">
                                        <li class="text-center statement-list__item">

                                            <h6 class="mt-1 mb-0 statement-list__amount fw-600">
                                                $50.00
                                            </h6>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="border statement-item card common-card border-gray-five">
                                <div class="card-body">
                                    <div class="statement-item__header">
                                        <h6 class="statement-item__title"> انفقت معنا </h6>
                                    </div>
                                    <ul class="statement-list">
                                        <li class="text-center statement-list__item">
                                            <h6 class="mt-1 mb-0 statement-list__amount fw-600">
                                                $100.00
                                            </h6>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="border card common-card border-gray-five">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-body mt--24">
                                            <thead>
                                                <tr>
                                                    <th> تاريخ العملية </th>
                                                    <th> رقم العملية </th>
                                                    <th> قيمة العملية </th>
                                                    <th> الحالة </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td data-label="Date">2022-12-31 03:36 AM</td>
                                                    <td data-label="Order ID">#DR54745425478</td>
                                                    <td data-label="price"> 20 ر.س </td>
                                                    <td data-label="status"> <span class="badge badge-success bg-success">
                                                            تم بنجاح </span> </td>

                                                </tr>

                                            </tbody>
                                        </table>
                                        {{-- <div class="gap-2 flx-between">
                                            <div class="flex-nowrap gap-3 paginate-content flx-align">

                                            </div>
                                            <nav aria-label="Page navigation example">
                                                <ul class="mt-0 pagination common-pagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">4</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="flex-nowrap gap-2 page-link flx-align"
                                                            href="#">التالي
                                                            <span class="icon line-height-1 font-20"><i
                                                                    class="las la-arrow-left"></i></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Portfolio Content End -->

                </div>
                <div class="tab-pane fade" id="pills-support" role="tabpanel" aria-labelledby="pills-support-tab"
                    tabindex="0">
                    <!-- ========================= Orders section start =========================== -->
                    <div class="row gy-4">
                        <div class="col-lg-12">
                            <form action="#" class="ticket_search">
                                <div class="search_input">
                                    <div class="position-relative">
                                        <input name="text" required type="email"
                                            class="common-input common-input--bg common-input--withIcon" id="email"
                                            placeholder="  بحث برقم الطلــب ">
                                        <span class="input-icon"><img
                                                src="{{ asset('assets/front/') }}/images/icons/envelope-icon.svg"
                                                alt=""></span>
                                    </div>
                                </div>
                                <div class="search_button">
                                    <button type="submit" class="btn btn-main btn-lg w-100 pill"> اضافة تذكرة جديدة
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-12">
                            <div class="border card common-card border-gray-five">
                                <div class="card-body">
                                    <div class="no_tickets">
                                        <i class="fa fa-comments"></i>
                                        <h6> تواصل معنا في أي وقت اذا احتجت أي مساعدة </h6>
                                        <button type="submit" class="btn btn-main btn-lg w-100 pill"> اضافة تذكرة جديدة
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ========================= Orders section End =========================== -->
                </div>
                <div class="tab-pane fade" id="pills-Followingg" role="tabpanel" aria-labelledby="pills-Followingg-tab"
                    tabindex="0">
                    Settingd dddf
                </div>
                <div class="tab-pane fade" id="pills-Settingss" role="tabpanel" aria-labelledby="pills-Settingss-tab"
                    tabindex="0">

                    <!-- ================== Setting Section Start ====================== -->
                    <div class="row gy-4">
                        <div class="col-lg-4 pe-xl-5">
                            <div class="setting-sidebar">
                                <h6 class="setting-sidebar__title">Your Details</h6>
                                <ul class="setting-sidebar-list">
                                    <li class="setting-sidebar-list__item"><a href="#personalInfo"
                                            class="setting-sidebar-list__link active">Personal Information</a></li>
                                    <li class="setting-sidebar-list__item"><a href="#profile"
                                            class="setting-sidebar-list__link">Profile</a></li>
                                    <li class="setting-sidebar-list__item"><a href="#paymentSystem"
                                            class="setting-sidebar-list__link">Setup Payment System</a></li>
                                    <li class="setting-sidebar-list__item"><a href="#emailSetting"
                                            class="setting-sidebar-list__link">Email Setting</a></li>
                                    <li class="setting-sidebar-list__item"><a href="#socialNetwork"
                                            class="setting-sidebar-list__link">Social Networks</a></li>
                                </ul>
                            </div>
                        </div>


                        <div class="col-lg-8">
                            <!-- <form action="#"> -->
                            <div class="setting-content" data-bs-spy="scroll" data-bs-target="#sidebar-scroll-spy">
                                <div class="overflow-hidden mb-24 border card common-card border-gray-five"
                                    id="personalInfo">
                                    <div class="card-header">
                                        <h6 class="title">Personal Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row gy-3">
                                            <div class="col-sm-6 col-xs-6">
                                                <label for="fName" class="form-label">First Name</label>
                                                <input type="text"
                                                    class="common-input common-input--md border--color-dark bg--white"
                                                    id="fName">
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <label for="lName" class="form-label">Last Name</label>
                                                <input type="text"
                                                    class="common-input common-input--md border--color-dark bg--white"
                                                    id="lName">
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <label for="country" class="form-label">Country</label>
                                                <input type="text"
                                                    class="common-input common-input--md border--color-dark bg--white"
                                                    id="country">
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text"
                                                    class="common-input common-input--md border--color-dark bg--white"
                                                    id="address">
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <label for="city" class="form-label">City</label>
                                                <input type="text"
                                                    class="common-input common-input--md border--color-dark bg--white"
                                                    id="city">
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <label for="zipCode" class="form-label">Zip Code</label>
                                                <input type="text"
                                                    class="common-input common-input--md border--color-dark bg--white"
                                                    id="zipCode">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="overflow-hidden mb-24 border card common-card border-gray-five"
                                    id="profile">
                                    <div class="card-header">
                                        <h6 class="title">Personal Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row gy-3">
                                            <div class="col-sm-6 col-xs-6">
                                                <label for="fileUpload" class="form-label">Upload a New Avatar</label>
                                                <input type="file"
                                                    class="common-input common-input--md border--color-dark bg--white"
                                                    id="fileUpload">
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <label for="fileUploadTwo" class="form-label">Upload a New
                                                    Avatar</label>
                                                <input type="file"
                                                    class="common-input common-input--md border--color-dark bg--white"
                                                    id="fileUploadTwo">
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <label for="ProfileHeading" class="form-label">Profile Heading</label>
                                                <input type="text"
                                                    class="common-input common-input--md border--color-dark bg--white"
                                                    id="ProfileHeading">
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <label class="form-label">Show Country on Your</label>
                                                <div class="gap-3 mt-2 flx-align">
                                                    <div class="mb-0 common-check common-radio">
                                                        <input class="form-check-input" type="radio" name="showCountry"
                                                            id="yes">
                                                        <label class="form-check-label ps-2" for="yes">Yes</label>
                                                    </div>
                                                    <div class="mb-0 common-check common-radio">
                                                        <input class="form-check-input" type="radio" name="showCountry"
                                                            id="no">
                                                        <label class="form-check-label ps-2" for="no">No</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="aboutProfile" class="form-label">Write Something About Your
                                                    Profile</label>
                                                <textarea class="common-input common-input--md border--color-dark bg--white" id="aboutProfile"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="overflow-hidden mb-24 border card common-card border-gray-five"
                                    id="paymentSystem">
                                    <div class="card-header">
                                        <h6 class="title">Payment Method</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-0 payment-method">
                                            <div class="payment-method__wrapper arrow-sm">
                                                <div class="payment-method__item">
                                                    <input class="form-check-input" type="radio" name="payment"
                                                        id="payment1" hidden>
                                                    <label class="form-check-label" for="payment1">
                                                        <img src="{{ asset('assets/front/') }}/images/thumbs/payment-method1.png"
                                                            alt="">
                                                    </label>
                                                </div>
                                                <div class="payment-method__item">
                                                    <input class="form-check-input" type="radio" name="payment"
                                                        id="payment2" hidden checked>
                                                    <label class="form-check-label" for="payment2">
                                                        <img src="{{ asset('assets/front/') }}/images/thumbs/payment-method2.png"
                                                            alt="">
                                                    </label>
                                                </div>
                                                <div class="payment-method__item">
                                                    <input class="form-check-input" type="radio" name="payment"
                                                        id="payment3" hidden>
                                                    <label class="form-check-label" for="payment3">
                                                        <img src="{{ asset('assets/front/') }}/images/thumbs/payment-method3.png"
                                                            alt="">
                                                    </label>
                                                </div>
                                                <div class="payment-method__item">
                                                    <input class="form-check-input" type="radio" name="payment"
                                                        id="payment4" hidden>
                                                    <label class="form-check-label" for="payment4">
                                                        <img src="{{ asset('assets/front/') }}/images/thumbs/payment-method4.png"
                                                            alt="">
                                                    </label>
                                                </div>
                                                <div class="payment-method__item">
                                                    <input class="form-check-input" type="radio" name="payment"
                                                        id="payment5" hidden>
                                                    <label class="form-check-label" for="payment5">
                                                        <img src="{{ asset('assets/front/') }}/images/thumbs/payment-method5.png"
                                                            alt="">
                                                    </label>
                                                </div>
                                                <div class="payment-method__item">
                                                    <input class="form-check-input" type="radio" name="payment"
                                                        id="payment6" hidden>
                                                    <label class="form-check-label" for="payment6">
                                                        <img src="{{ asset('assets/front/') }}/images/thumbs/payment-method6.png"
                                                            alt="">
                                                    </label>
                                                </div>
                                                <div class="payment-method__item">
                                                    <input class="form-check-input" type="radio" name="payment"
                                                        id="payment7" hidden>
                                                    <label class="form-check-label" for="payment7">
                                                        <img src="{{ asset('assets/front/') }}/images/thumbs/payment-method7.png"
                                                            alt="">
                                                    </label>
                                                </div>
                                                <div class="payment-method__item">
                                                    <input class="form-check-input" type="radio" name="payment"
                                                        id="payment8" hidden>
                                                    <label class="form-check-label" for="payment8">
                                                        <img src="{{ asset('assets/front/') }}/images/thumbs/payment-method8.png"
                                                            alt="">
                                                    </label>
                                                </div>
                                                <div class="payment-method__item">
                                                    <input class="form-check-input" type="radio" name="payment"
                                                        id="payment9" hidden>
                                                    <label class="form-check-label" for="payment9">
                                                        <img src="{{ asset('assets/front/') }}/images/thumbs/payment-method9.png"
                                                            alt="">
                                                    </label>
                                                </div>
                                                <div class="payment-method__item">
                                                    <input class="form-check-input" type="radio" name="payment"
                                                        id="payment10" hidden>
                                                    <label class="form-check-label" for="payment10">
                                                        <img src="{{ asset('assets/front/') }}/images/thumbs/payment-method10.png"
                                                            alt="">
                                                    </label>
                                                </div>
                                                <div class="payment-method__item">
                                                    <input class="form-check-input" type="radio" name="payment"
                                                        id="payment11" hidden>
                                                    <label class="form-check-label" for="payment11">
                                                        <img src="{{ asset('assets/front/') }}/images/thumbs/payment-method11.png"
                                                            alt="">
                                                    </label>
                                                </div>
                                                <div class="payment-method__item">
                                                    <input class="form-check-input" type="radio" name="payment"
                                                        id="payment12" hidden>
                                                    <label class="form-check-label" for="payment12">
                                                        <img src="{{ asset('assets/front/') }}/images/thumbs/payment-method12.png"
                                                            alt="">
                                                    </label>
                                                </div>
                                                <div class="payment-method__item">
                                                    <input class="form-check-input" type="radio" name="payment"
                                                        id="payment13" hidden>
                                                    <label class="form-check-label" for="payment13">
                                                        <img src="{{ asset('assets/front/') }}/images/thumbs/payment-method13.png"
                                                            alt="">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="overflow-hidden mb-24 border card common-card border-gray-five"
                                    id="emailSetting">
                                    <div class="card-header">
                                        <h6 class="title">Email Settings</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row gy-3">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="common-check">
                                                    <input class="form-check-input" type="checkbox" id="ratingReminder">
                                                    <label class="form-check-label" for="ratingReminder"> Rating
                                                        reminder send an email for client rating </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="common-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="reviewNotification">
                                                    <label class="form-check-label" for="reviewNotification"> Item
                                                        review notification</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="common-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="updateNotification">
                                                    <label class="form-check-label" for="updateNotification"> Item
                                                        update notification</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="common-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="dailyNootification">
                                                    <label class="form-check-label" for="dailyNootification"> Daily
                                                        update notification</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="common-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="itemNotification">
                                                    <label class="form-check-label" for="itemNotification"> Item
                                                        Notification</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="common-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="commentNotification">
                                                    <label class="form-check-label" for="commentNotification"> Item
                                                        comment notification</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="overflow-hidden mb-24 border card common-card border-gray-five"
                                    id="socialNetwork">
                                    <div class="card-header">
                                        <h6 class="title">Social Network Settings</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row gy-3">
                                            <div class="col-sm-6 col-xs-6">
                                                <label for="facebookUrl" class="form-label">Facebook Profile Url</label>
                                                <div class="position-relative">
                                                    <input type="url"
                                                        class="common-input common-input--md common-input--withLeftIcon"
                                                        id="facebookUrl" placeholder="Facebook Profile Url">
                                                    <span class="input-icon input-icon--left text-main"><i
                                                            class="fab fa-facebook-f"></i> </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <label for="linkedinUrl" class="form-label">Linkedin Profile Url</label>
                                                <div class="position-relative">
                                                    <input type="url"
                                                        class="common-input common-input--md common-input--withLeftIcon"
                                                        id="linkedinUrl" placeholder="Linkedin Profile Url">
                                                    <span class="input-icon input-icon--left text-main"><i
                                                            class="fab fa-linkedin-in"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <label for="behanceUrl" class="form-label">Behance Profile Url</label>
                                                <div class="position-relative">
                                                    <input type="url"
                                                        class="common-input common-input--md common-input--withLeftIcon"
                                                        id="behanceUrl" placeholder="Behance Profile Url">
                                                    <span class="input-icon input-icon--left text-main"><i
                                                            class="fab fa-behance"></i> </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <label for="dribbleUrl" class="form-label">Dribble Profile Url</label>
                                                <div class="position-relative">
                                                    <input type="url"
                                                        class="common-input common-input--md common-input--withLeftIcon"
                                                        id="dribbleUrl" placeholder="Dribble Profile Url">
                                                    <span class="input-icon input-icon--left text-main"><i
                                                            class="fab fa-dribbble"></i> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn w-100 btn-main btn-md">Save Information</button>

                            </div>
                            <!-- </form> -->
                        </div>
                    </div>
                    <!-- ================== Setting Section End ====================== -->

                </div>

            </div>
        </div>
    </section>
    <!-- ===================== Profile Section End ============================== -->

    <!-- ======================== Brand Section Start ========================= -->
    <div class="brand">
        <div class="container">
            <div class="brand-slider">
                <div class="brand-item d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-img1.png" alt=""
                        class="white-version">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-white-img1.png" alt=""
                        class="dark-version">
                </div>
                <div class="brand-item d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-img2.png" alt=""
                        class="white-version">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-white-img2.png" alt=""
                        class="dark-version">
                </div>
                <div class="brand-item d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-img3.png" alt=""
                        class="white-version">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-white-img3.png" alt=""
                        class="dark-version">
                </div>
                <div class="brand-item d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-img4.png" alt=""
                        class="white-version">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-white-img4.png" alt=""
                        class="dark-version">
                </div>
                <div class="brand-item d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-img5.png" alt=""
                        class="white-version">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-white-img5.png" alt=""
                        class="dark-version">
                </div>
                <div class="brand-item d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-img3.png" alt=""
                        class="white-version">
                    <img src="{{ asset('assets/front/') }}/images/thumbs/brand-white-img3.png" alt=""
                        class="dark-version">
                </div>
            </div>
        </div>
    </div>
    <!-- ======================== Brand Section End ========================= -->
@endsection
