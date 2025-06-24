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
                        <div class="col-12">
                            <div class="border card common-card border-gray-five">
                                <div class="card-body">
                                    @if ($transactions->count() > 0)
                                        <div class="add-new-balance">
                                            <button  type="button" class="add-new-balance-buttom" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                شحن الرصيد الان <i class="bi bi-plus"></i>
                                            </button>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="table-search" class="table table-bordered">
                                                <thead class="table-primary-custome">
                                                    <tr>
                                                        <th> رقم العملية </th>
                                                        <th> تاريخ العملية </th>
                                                        <th> قيمة العملية </th>
                                                        <th> الحالة </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($transactions as $transaction)
                                                    <tr>
                                                        <td>{{ $transaction->id }} # </td>
                                                        <td>{{ $transaction->created_at }}</td>
                                                        <td> {{ number_format($transaction->amount, 2) }} ر.س </td>
                                                        <td> <span
                                                                class="badge badge-success bg-success">
                                                                @if ($transaction->payment_status == 'pending')
                                                                    <span class="badge badge-warning bg-warning">قيد الانتظار</span>
                                                                @else
                                                                    <span class="badge badge-success bg-success"> مكتملة  </span>
                                                                @endif
                                                                </span> </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="no_tickets no-orders">
                                            <img src="{{ asset('assets/front/uploads/empty.svg') }}" alt="">
                                            <h6> لا توجد أرصدة حاليا في حسابك </h6>

                                            <button type="button" class="btn btn-main btn-lg pill fw-300"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                شحن الرصيد الان <i class="bi bi-plus"></i>
                                            </button>

                                        </div>
                                    @endif
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
    <div class="text-center">
        <!-- Modal -->
        <div class="modal fade add_balance" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 style="font-size: 20px" class="modal-title fs-5" id="exampleModalLabel">
                            شحن رصيد </h1>
                    </div>
                    <form action="{{ route('store_balance') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row gy-3">
                                <div class="col-sm-12 col-xs-12">
                                    <label for=""> ادخل المبلغ المراد شحنة بالدولار </label>
                                    <input name="amount" type="number"
                                        class="common-input common-input--md border--color-dark bg--white" id="name"
                                        placeholder=" مثال 20  ">
                                </div>
                            </div>
                            <div class="payment_faqs">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                ماذا أفعل اذا واجهتنى مشكلة في عملية الدفع؟
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                في حالة لم يتم توجيهك إلى صفحة الدفع يمكنك استخدام صفحة
                                                الدفع اليدوي وسيتم حل المشكلة، بينما في حالة فشلت عملية
                                                الدفع الخاصة بك سواء اثناء أو بعد عملية الدفع يمكنك بكل
                                                بساطة التواصل معنا .
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                هل يمكنني استرداد مبلغ قمت بشحنه أو جزء منه؟
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                في حالة لم يتم توجيهك إلى صفحة الدفع يمكنك استخدام صفحة
                                                الدفع اليدوي وسيتم حل المشكلة، بينما في حالة فشلت عملية
                                                الدفع الخاصة بك سواء اثناء أو بعد عملية الدفع يمكنك بكل
                                                بساطة التواصل معنا .
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--
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
                            </div> --}}
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> شحن </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                رجوع </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
