@extends('front.layouts.master')
@section('title', ' رصيدي ')
@section('content')

    <!-- ======================== Dashboard Cards Section Start ===================== -->
    <section class="dashboard-cards-section">
        <div class="dashboard-cards-row">
            <div class="dashboard-card-item active">
                <div class="">
                    <img src="{{ asset('assets/front/uploads/balance-now.png') }}" alt="الرصيد الحالي"
                        class="dashboard-card-img">
                </div>
                <div class="dashboard-card-info">
                    <div class="dashboard-card-value">{{ number_format(Auth::user()->balance, 2) }} <img
                            src="{{ asset('assets/front/images/icons/riyal-white.svg') }}" alt=""> </div>
                    <div class="dashboard-card-label">رصيدك الآن</div>
                    <i class="bi bi-arrow-left"></i>
                </div>
            </div>
            <div class="dashboard-card-item">
                <div class="">
                    <img src="{{ asset('assets/front/uploads/current-used.png') }}" alt=" جار استخدامه "
                        class="dashboard-card-img">
                </div>
                <div class="dashboard-card-info">
                    <div class="dashboard-card-value">{{ number_format(Auth::user()->balance, 2) }} <img
                            src="{{ asset('assets/front/images/icons/riyal-maincolor.svg') }}" alt=""> </div>
                    <div class="dashboard-card-label"> جار استخدامه </div>
                    <i class="bi bi-arrow-left"></i>
                </div>
            </div>
            <div class="dashboard-card-item">
                <div class="">
                    <img src="{{ asset('assets/front/uploads/spend.png') }}" alt=" أنفقت معنا  " class="dashboard-card-img">
                </div>
                <div class="dashboard-card-info">
                    <div class="dashboard-card-value">{{ number_format(Auth::user()->balance, 2) }} <img
                            src="{{ asset('assets/front/images/icons/riyal-maincolor.svg') }}" alt=""> </div>
                    <div class="dashboard-card-label"> أنفقت معنا </div>
                    <i class="bi bi-arrow-left"></i>
                </div>
            </div>
            <div class="dashboard-card-item">
                <div class="">
                    <img src="{{ asset('assets/front/uploads/add-balance.png') }}" alt=" شحن رصيد الآن  "
                        class="dashboard-card-img">
                </div>
                <div class="dashboard-card-info">
                    <i class="bi bi-plus"></i>
                    <div class="dashboard-card-label"> شحن رصيد الآن </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================== Dashboard Cards Section End ===================== -->

    <!-- ======================== Breadcrumb Three Section Start ===================== -->
    <section class="overflow-hidden position-relative z-index-1">
        <div class="container container-two">
            <div class="breadcrumb-three-content border-bottom border-color">
                <ul class="mt-4 nav tab-bordered nav-pills" id="pills-tabbs" role="tablist">

                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/orders') }}" class="nav-link"> <i class="bi bi-cart"></i> طلباتي </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/balance') }}" class="nav-link active"> <i class="bi bi-currency-dollar"></i>
                            شحن رصيد </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/wishlist') }}" class="nav-link"> <i class="bi bi-heart"></i> المفضلة </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/alerts') }}" class="nav-link"> <i class="bi bi-bell"></i> الاشعارات </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/tickets') }}" class="nav-link"> <i class="bi bi-chat-dots"></i> الدعم الفني
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/setting') }}" class="nav-link"> <i class="bi bi-gear-fill"></i> الاعدادات
                        </a>
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
                    <div class="row gy-4">
                        <div class="mt-64 text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-main btn-lg pill fw-300" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                شحن الرصيد الان <i class="bi bi-plus"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade add_balance" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 style="font-size: 20px" class="modal-title fs-5" id="exampleModalLabel">
                                                أدخل المبلغ المراد شحنه
                                                بالدولار </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('store_balance') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row gy-3">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <input name="amount" type="number" height="60px"
                                                            class="common-input common-input--md border--color-dark bg--white"
                                                            id="name" placeholder=" مثال 20  ">
                                                    </div>
                                                </div>

                                                <div class="payment_methods">
                                                    <!-- Payment Method Start -->
                                                    <div class="mt-4">
                                                        <div class="">
                                                            <div class="payment-select-card-wrapper">
                                                                <div class="mb-4 payment-select-card">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-between">
                                                                        <div class="gap-3 d-flex align-items-center">
                                                                            <div class="mb-0 common-check common-radio">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="payment_method"
                                                                                    value="paypal" id="paypal" />
                                                                                <label class="form-check-label"
                                                                                    for="paypal"> </label>
                                                                            </div>
                                                                            <div class="">
                                                                                <h6 class="mb-0 font-16"> باي بال </h6>
                                                                                <p class="font-14"> الدفع من خلال باي بال
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="payment-select-card__logo">
                                                                            <img src="{{ asset('assets/front/images/Mada.png') }}"
                                                                                alt="" />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-4 payment-select-card">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-between">
                                                                        <div class="gap-3 d-flex align-items-center">
                                                                            <div class="mb-0 common-check common-radio">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="payment_method"
                                                                                    value="crepto" id="crepto" />
                                                                                <label class="form-check-label"
                                                                                    for="crepto"> </label>
                                                                            </div>
                                                                            <div class="">
                                                                                <h6 class="mb-0 font-16">العملات الرقمية
                                                                                </h6>
                                                                                <p class="font-14"> الدفع من خلال العملات
                                                                                    الرقمية </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="payment-select-card__logo">
                                                                            <img src="{{ asset('assets/front/images/crepto.png') }}"
                                                                                alt="" />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Payment Method End -->
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary w-100 btn-main btn-md">
                                                    شحن الرصيد <i class="bi bi-plus"></i> </button>
                                            </div>

                                        </form>
                                        <ul class="unlisted charge_info">
                                            <li> <i class="bi bi-check2-all"></i> ادفع بطريقة امنة ومشفرة </li>
                                            <li> <i class="bi bi-check2-all"></i> احدث طرق الدفع </li>
                                        </ul>
                                    </div>
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
                                    </div>
                                    <div class="no_tickets no-orders">
                                        <img src="{{ asset('assets/front/uploads/empty.svg') }}" alt="">
                                        <h6> لا توجد أرصدة حاليا في حسابك </h6>

                                        <button type="button" class="btn btn-main btn-lg pill fw-300"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            شحن الرصيد الان <i class="bi bi-plus"></i>
                                        </button>

                                    </div>
                                </div>
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
