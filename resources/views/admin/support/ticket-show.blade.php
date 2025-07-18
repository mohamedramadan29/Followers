@extends('admin.layouts.master')
@section('title')
    خدمة العملاء
@endsection
@section('support-active', 'active')
@section('support-collapse', 'show')
@section('css')
    {{--    <!-- DataTables CSS --> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <style>
        .support-type {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .support-type .form-check {
            padding: 0;
        }

        .support-type input {
            opacity: 0;
        }

        .support-type label {
            background-color: #F3F3F3;
            padding: 7px 20px;
            border-radius: 7px;
            color: #5D5FED;
            cursor: pointer;
        }

        .support-type input:checked+label {
            color: #fff;
            background-color: #5D5FED;
        }
    </style>
@endsection
@section('content')
    <!-- ==================================================== -->
    <!-- Start right Content here -->
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <div class="row g-1">
                <div class="col-xxl-3">
                    <div class="offcanvas-xxl offcanvas-start h-100" tabindex="-1" id="Contactoffcanvas"
                        aria-labelledby="ContactoffcanvasLabel">
                        <div class="card position-relative" style="padding: 0">
                            <div class="border-0 card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title"> المعلومات العامة </h4>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane show active">

                                    <div class="mb-3 chat-setting-height" style="height: 100%">
                                        <div class="col-sm-12 col-xs-12 support-type">
                                            <div class="form-check">
                                                <input value="orders" class="form-check-input" type="radio"
                                                    name="support_type" id="radioSupportType1"
                                                    @if ($ticket->support_type == 'orders') checked @endif>
                                                <label class="form-check-label" for="radioSupportType1">
                                                    <i class="bi bi-card-list"></i> الطلبات
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input value="payments" class="form-check-input" type="radio"
                                                    name="support_type" id="radioSupportType2"
                                                    @if ($ticket->support_type == 'payments') checked @endif>
                                                <label class="form-check-label" for="radioSupportType2">
                                                    <i class="bi bi-wallet2"></i>
                                                    المدفوعات
                                                </label>
                                            </div>

                                        </div>
                                        <div class="ticket_number" style="padding: 10px;color:#000">
                                            <div class="form-group">
                                                <label for="" style="margin-bottom:5px"> رقم الطلب </label>
                                                <input disabled readonly type="text" value="{{ $ticket->id }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <!-- Start Ticket Status  -->
                                        <!-- Close Ticket -->
                                        @livewire('admin.chat-event.ticket-status', ['ticket' => $ticket])
                                        <!-- End Ticket Status  -->
                                        <!-- End Close Ticket -->
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card -->
                    </div>
                </div> <!-- end col -->

                <div class="col-xxl-9">
                    <div class="overflow-hidden card position-relative">

                        <div class="card-header d-flex align-items-center mh-100">
                            <button class="px-2 btn btn-light d-xxl-none d-flex align-items-center me-2" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#Contactoffcanvas"
                                aria-controls="Contactoffcanvas">
                                <i class="bx bx-menu fs-18"></i>
                            </button>

                            <div class="d-flex align-items-center">
                                @if ($ticket->user->image != '')
                                    <img class="rounded me-2" height="36" alt="avatar-4"
                                        src="{{ asset('assets/uploads/Users/' . $ticket->user->image) }}">
                                @else
                                    <img class="rounded me-2" height="36" alt="avatar-4"
                                        src="{{ asset('assets/uploads/Users/user_avatar.png') }}">
                                @endif
                                <div class="d-none d-md-flex flex-column">
                                    <h5 class="my-0 fs-16 fw-semibold">
                                        <a data-bs-toggle="offcanvas" href="#user-profile" class="text-dark">
                                            {{ $ticket->user->name }}
                                        </a>
                                    </h5>
                                    <p class="mb-0 text-success fw-semibold fst-italic">
                                        {{ $messages->last()->created_at->diffForHumans() }} </p>
                                </div>
                            </div>

                            <div class="flex-grow-1">
                                <ul class="gap-3 mb-0 list-inline float-end d-flex">
                                    <li class="list-inline-item fs-20 dropdown">
                                        <a data-bs-toggle="offcanvas" href="#user-profile" class="text-dark">
                                            <i class="bx bx-user"></i>
                                        </a>
                                    </li>

                                    <li class="list-inline-item fs-20 dropdown d-none d-md-flex">
                                        <a href="javascript: void(0);" class="dropdown-toggle arrow-none text-dark"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item"
                                                href="{{ url('admin/user/show/' . $ticket->user->id) }}"><i
                                                    class="bx bx-user-circle me-2"></i> البروفايل </a>
                                            <a class="dropdown-item" href="javascript: void(0);"><i
                                                    class="bx bx-music me-2"></i> سجل الطلبات </a>
                                            <a class="dropdown-item" href="javascript: void(0);"><i
                                                    class="bx bx-search me-2"></i> زيادة رصيد </a>
                                            <a class="dropdown-item" href="javascript: void(0);"><i
                                                    class="bx bx-image me-2"></i> خصم رصيد </a>
                                            <a class="dropdown-item" href="javascript: void(0);"><i
                                                    class="bx bx-right-arrow-circle me-2"></i>حالة المستخدم </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="chat-box">
                            <ul class="p-3 chat-conversation-list chatbox-height">
                                @foreach ($messages as $message)
                                    <li class="clearfix {{ $message['sender_type'] == 'support' ? 'odd' : '' }}">
                                        <div class="chat-conversation-text">
                                            <div class="d-flex">
                                                <div class="chat-ctext-wrap">
                                                    <p> {{ $message['message'] }} </p>
                                                </div>
                                            </div>
                                            <p class="mt-1 mb-0 text-muted fs-12 ms-2">
                                                {{ $message['created_at']->diffForHumans() }}</p>
                                        </div>
                                    </li>
                                @endforeach
                                {{-- <li class="clearfix odd">
                                    <div class="chat-conversation-text ms-0">
                                        <div class="d-flex justify-content-end">
                                            <div class="chat-ctext-wrap">
                                                <p>Hi </p>
                                            </div>
                                        </div>
                                        <p class="mt-1 mb-0 text-muted fs-12">8:20 am<i
                                                class="bx bx-check-double ms-1 text-primary"></i></p>
                                    </div>
                                </li> --}}
                            </ul>
                            <!-- ###################################################################### -->
                            <!-- end chat-conversation-list -->
                            <div class="p-2 bg-opacity-50 bg-light">
                                <form class="needs-validation" method="POST"
                                    action="{{ route('admin.support.send_message', $ticket->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row align-items-center">
                                        <div class="mb-2 col mb-sm-0 d-flex">
                                            <div class="input-group">
                                                <input type="text" name="message" class="border-0 form-control"
                                                    placeholder="اكتب رسالتك">
                                            </div>
                                        </div>
                                        <div class="col-sm-auto">
                                            <div class="btn-group btn-toolbar">
                                                <!-- زر اختيار ملف -->
                                                <label for="chat-attachment" class="mb-0 btn btn-sm btn-light">
                                                    <i class="bx bx-paperclip fs-18"></i>
                                                </label>
                                                <!-- input مخفي لرفع الملف -->
                                                <input type="file" name="file" id="chat-attachment"
                                                    class="d-none">
                                                <!-- زر الإرسال -->
                                                <button type="submit" class="btn btn-sm btn-primary chat-send">
                                                    <i class="bx bx-send fs-18"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Profile Start -->
                        <div class="shadow offcanvas offcanvas-end position-absolute border-start" data-bs-scroll="true"
                            data-bs-backdrop="false" tabindex="-1" id="user-profile"
                            aria-labelledby="user-profileLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title text-truncate w-50" id="user-profileLabel">معلومات المستخدم
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="p-0 offcanvas-body h-100" data-simplebar>
                                <div class="p-3">
                                    <div class="text-center">
                                        @if ($ticket->user->image != '')
                                            <img class="mb-1 img-thumbnail avatar-lg rounded-circle" alt="avatar-4"
                                                src="{{ asset('assets/uploads/Users/' . $ticket->user->image) }}">
                                        @else
                                            <img class="mb-1 img-thumbnail avatar-lg rounded-circle" alt="avatar-4"
                                                src="{{ asset('assets/uploads/Users/user_avatar.png') }}">
                                        @endif


                                        <h4>{{ $ticket->user->name }}</h4>
                                        <p> {{ $ticket->user->person_info }} </p>

                                        <p class="mt-2 text-muted fs-14"> اخر ظهور : <strong
                                                class="text-success">{{ $ticket->user->isOnline() ? 'Online' : $ticket->user->last_seen->diffForHumans() }}</strong>
                                        </p>
                                    </div>

                                    <div class="mt-3">
                                        <hr>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class=""><strong> <img width="15px"
                                                        src="{{ asset('assets/admin/images/trending.svg') }}"
                                                        alt=""> رصيد الحساب :</strong>
                                            </p>
                                            <p> {{ number_format($ticket->user->balance, 2) }} دولار </p>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class=""><strong> <img width="15px"
                                                        style="transform: rotate(90deg)"
                                                        src="{{ asset('assets/admin/images/trending.svg') }}"
                                                        alt=""> النفقات :</strong>
                                            </p>
                                            <p> {{ number_format($ticket->user->total_spend, 6) }} دولار </p>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class=""><strong> <img width="15px"
                                                        src="{{ asset('assets/admin/images/container.svg') }}"
                                                        alt=""> اجمالي الطلبات :</strong>
                                            </p>
                                            <p> {{ $ticket->user->orders->count() }} </p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class=""><strong> <img width="15px"
                                                        src="{{ asset('assets/admin/images/container.svg') }}"
                                                        alt=""> الطلبات قيد التنفيذ :</strong>
                                            </p>
                                            <p> {{ $ticket->user->processing_orders }} </p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class=""><strong> <img width="15px"
                                                        src="{{ asset('assets/admin/images/container.svg') }}"
                                                        alt=""> حالة الحساب :</strong>
                                            </p>
                                            <p> {{ $ticket->user->account_status }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Profile End -->

                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>
        <!-- End Container Fluid -->
    </div>
    <!-- ==================================================== -->
    <!-- End Page Content -->
    <!-- ==================================================== -->


@endsection

@section('js')
    <script>
        window.addEventListener('ticket-status-updated', event => {
            alert('تم تحديث حالة التذكرة');
        });
        window.addEventListener('close-ticket', event => {
            alert('تم اغلاق التذكرة');
        })
    </script>

@endsection
