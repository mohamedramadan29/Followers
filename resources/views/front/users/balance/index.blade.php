@extends('front.layouts.master')
@section('title', ' رصيدي ')
@section('content')
    <!-- ======================== Breadcrumb Three Section Start ===================== -->
    <section class="breadcrumb-three section-bg position-relative z-index-1 overflow-hidden">

        <img src="{{ asset('assets/front/') }}/images/gradients/breadcrumb-gradient-bg.png" alt=""
            class="bg--gradient">

        <img src="{{ asset('assets/front/') }}/images/shapes/element-moon3.png" alt="" class="element one">
        <img src="{{ asset('assets/front/') }}/images/shapes/element-moon1.png" alt="" class="element three">

        <div class="container container-two">
            <div class="breadcrumb-three-content border-bottom border-color">
                <div class="breadcrumb-three-content__inner">
                    <div class="breadcrumb-three-content__left">
                        <div class="flx-between align-items-end gap-3">
                            <div class="author-profile d-flex gap-2 flex-column">
                                <div class="author-profile__thumb flex-shrink-0">
                                    @if (Auth::user()->image != '')
                                        <img style="border-radius: 50%;height:95%;width:95%"
                                            src="{{ asset('assets/uploads/Users/' . Auth::user()->image) }}" alt="">
                                    @else
                                        <img style="border-radius: 50%;height:95%;width:95%"
                                            src="{{ asset('assets/uploads/Users/user_avatar.png') }}" alt="">
                                    @endif

                                </div>

                                <div class="d-flex align-items-end flex-wrap gap-4">
                                    <div class="author-profile__info">
                                        <h5 class="author-profile__name mb-2"> {{ Auth::user()->name }} </h5>
                                        <span class="author-profile__membership font-14"> عضو
                                            {{ \Carbon\Carbon::parse(Auth::user()->created_at)->diffForHumans() }} </span>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="breadcrumb-three-content__right flex-shrink-0  d-flex align-items-center gap-4 gap-lg-5">

                                <div class="sales">
                                    <span class="sales__text mb-1 text-heading fw-500">الرصيد الحالي </span>
                                    <h5 class="sales__amount mb-0"> {{ number_format(Auth::user()->balance,2) }} دولار </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav tab-bordered nav-pills mt-4" id="pills-tabbs" role="tablist">

                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/orders') }}" class="nav-link"> طلباتي </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/balance') }}" class="nav-link active"> الرصيد </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ url('user/tickets') }}" class="nav-link"> تذاكر الدعم </a>
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
    <section class="profile pt-5 padding-b-120">
        <div class="container container-two">
            <div class="tab-content" id="pills-tabb">
                <div class="tab-pane fade show active" id="pills-Followingg" role="tabpanel"
                    aria-labelledby="pills-Followingg-tab" tabindex="0">
                    <!-- ================== Setting Balance  Start ====================== -->
                    <div class="row gy-4">
                        <div class="text-center mt-64">
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
                                                                <div class="payment-select-card mb-4">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-between">
                                                                        <div class="d-flex align-items-center gap-3">
                                                                            <div class="common-check common-radio mb-0">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="payment_method" value="paypal"
                                                                                    id="paypal" />
                                                                                <label class="form-check-label"
                                                                                    for="paypal"> </label>
                                                                            </div>
                                                                            <div class="">
                                                                                <h6 class="font-16 mb-0"> باي بال  </h6>
                                                                                <p class="font-14"> الدفع من خلال باي بال  </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="payment-select-card__logo">
                                                                            <img src="{{ asset('assets/front/images/Mada.png') }}"
                                                                                alt="" />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="payment-select-card mb-4">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-between">
                                                                        <div class="d-flex align-items-center gap-3">
                                                                            <div class="common-check common-radio mb-0">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="payment_method" value="crepto"
                                                                                    id="crepto" />
                                                                                <label class="form-check-label"
                                                                                    for="crepto"> </label>
                                                                            </div>
                                                                            <div class="">
                                                                                <h6 class="font-16 mb-0">العملات الرقمية </h6>
                                                                                <p class="font-14"> الدفع من خلال العملات الرقمية  </p>
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
                                                <button type="submit" class="btn btn-primary btn w-100 btn-main btn-md">
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

                        <div class="col-lg-6">
                            <div class="statement-item card common-card border border-gray-five">
                                <div class="card-body">
                                    <div class="statement-item__header">
                                        <h6 class="statement-item__title"> الرصيد الحالي </h6>
                                    </div>
                                    <ul class="statement-list">
                                        <li class="statement-list__item text-center">
                                            <h6 class="statement-list__amount mb-0 mt-1 fw-600">
                                                {{ number_format(Auth::user()->balance,2) }} دولار
                                            </h6>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card common-card border border-gray-five">
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
                                        {{-- <div class="flx-between gap-2">
                                            <div class="paginate-content flx-align flex-nowrap gap-3">

                                            </div>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination common-pagination mt-0">
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
                                                        <a class="page-link flx-align gap-2 flex-nowrap"
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
                    <!-- ================== Setting Section End ====================== -->
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== Profile Section End ============================== -->


@endsection
