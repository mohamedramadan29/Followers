@extends('admin.layouts.master')
@section('title')
    المستخدمين
@endsection
@section('css')
@endsection
@section('content')
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">
            @if (Session::has('Success_message'))
                @php
                    toastify()->success(\Illuminate\Support\Facades\Session::get('Success_message'));
                @endphp
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    @php
                        toastify()->error($error);
                    @endphp
                @endforeach
            @endif

            <div class="row">
                    <div class="col-xl-12 col-lg-8">
                        <div class="card" style="background-color: #F2F2F8">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title"> تفاصيل المستخدم </h4>
                                <div class="buttons">
                                    @if ($user->block_status == 0)
                                    <form action="{{ route('admin.user.ban', $user->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn-ban btn {{ $user->block_status == 0 ? 'active' : '' }}"> <i class="ti ti-ban"></i> حظر </button>
                                        <button type="button" class="btn-unban btn"> <i class="ti ti-check"></i> رفع حظر </button>
                                    </form>
                                    @else
                                    <form action="{{ route('admin.user.unban', $user->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn-unban btn {{ $user->block_status == 1 ? 'active' : '' }}"> <i class="ti ti-check"></i> رفع حظر </button>
                                        <button type="button" class="btn-ban btn {{ $user->block_status == 0 ? 'active' : '' }}"> <i class="ti ti-ban"></i> حظر </button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 person_info">
                                        <img src="{{ asset('assets/admin/images/avatar.png') }}" alt="">
                                        <h3> {{ $user->name }} </h3>
                                        <p>
                                            {{ $user->person_info }}
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> رقم الهاتف </label>
                                            <input disabled readonly type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $user->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="api_url" class="form-label"> البريد الالكتروني </label>
                                            <input disabled readonly type="text" id="api_url" name="api_url"
                                                class="form-control" placeholder="" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="account_status" class="form-label"> حالة الحساب </label>
                                            <input disabled readonly type="text" id="account_status"
                                                name="account_status" class="form-control" placeholder="" value=" محظور  ">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> الرصيد الحالي </label>
                                            <input disabled readonly type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $user->balance }} دولار">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> عدد الطلبات </label>
                                            <input disabled readonly type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $user->total_orders }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> انفاق الحساب </label>
                                            <input disabled readonly type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $user->total_orders }}">
                                        </div>
                                    </div>
                                    {{--
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> حالة الحساب </label>
                                            <input disabled readonly type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $user->account_status }}">
                                        </div>
                                    </div>
 --}}
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> الجنس </label>
                                            <input disabled readonly type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $user->sex }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> المدينة </label>
                                            <input disabled readonly type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $user->city }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> تاريخ الميلاد </label>
                                            <input disabled readonly type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $user->birthday }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> تاريخ التسجيل في الموقع </label>
                                            <input disabled readonly type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $user->created_at }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> اخر ظهور </label>
                                            <input disabled readonly type="text" id="api_key" name="api_key"
                                                class="form-control" placeholder="" value="{{ $user->activity }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <div class="mb-3">
                                            <label for="api_key" class="form-label"> اولوية الدعم الفني </label>
                                            <select disabled name="" id="" class="form-select" readonly>
                                                <option value="عادي">عادي</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="gap-1">
                                <form action="#" method="get" class="d-flex"
                                    style="justify-content: flex-start;align-items: center">
                                    <ul class="list-unstyled orders-tabs" style="justify-content: flex-start">
                                        <li>
                                            <a href="" class="all active"> سجل الطلبات </a>
                                        </li>
                                        <li>
                                            <a href="#" class="complete"> سجل المدفوعات </a>
                                        </li>
                                    </ul>
                                </form>


                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table id="table-search"
                                        class="table mb-0 align-middle table-bordered gridjs-table table-hover table-centered">
                                        <thead class="bg-light-subtle table-primary-custome">
                                            <tr>
                                                <th> رقم الطلب عند المزود</th>
                                                <th> رقم الخدمة عند المزود </th>
                                                <th> رقم الطلب </th>
                                                <th>السعر </th>
                                                <th> التاريخ / الوقت </th>
                                                <th> الخدمة </th>
                                                <th> الرابط </th>
                                                <th> الكمية </th>
                                                <th>عدد البدء </th>
                                                <th> العدد المتبقي </th>
                                                <th>حالة الطلب </th>
                                                <th> إجراءات </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td data-label="Order ID"># {{ $order['order_number'] }} </td>
                                                    <td data-label="Order ID"># {{ $order['order_number'] }} </td>
                                                    <td data-label="Order ID"># {{ $order['order_number'] }} </td>
                                                    <td data-label="Price"> {{ $order['total_price'] }} $ </td>
                                                    <td data-label="Date"> {{ $order['created_at'] }} </td>
                                                    <td data-label="Type"> {{ $order['name'] }} </td>
                                                    <td data-label="Date"> {{ $order['quantity'] }} </td>
                                                    <td data-label="Date">
                                                        {{ $order->provider_details->start_count }} </td>
                                                    <td data-label="Date"> {{ $order->provider_details->remains }}
                                                    </td>
                                                    @php
                                                        // مصفوفة الحالات والألوان
                                                        $statuses = [
                                                            'Partial' => [
                                                                'text' => 'مكتمل جزئياً',
                                                                'class' => 'bg-warning',
                                                            ], // اللون الأصفر
                                                            'Completed' => [
                                                                'text' => 'مكتمل',
                                                                'class' => 'bg-success',
                                                            ], // اللون الأخضر
                                                            'Pending' => [
                                                                'text' => 'قيد التنفيذ',
                                                                'class' => 'bg-primary',
                                                            ], // اللون الأزرق
                                                            'Processing' => [
                                                                'text' => 'جاري المعالجة',
                                                                'class' => 'bg-info',
                                                            ], // اللون السماوي
                                                            'Canceled' => [
                                                                'text' => 'ملغي',
                                                                'class' => 'bg-danger',
                                                            ], // اللون الأحمر
                                                            'Refunded' => [
                                                                'text' => 'تم الاسترداد',
                                                                'class' => 'bg-dark',
                                                            ], // اللون الرمادي الداكن
                                                        ];

                                                        // الحالة الحالية
                                                        $current_status = $order->provider_details->status ?? 'Unknown';
                                                        $status_details = $statuses[$current_status] ?? [
                                                            'text' => 'غير معروف',
                                                            'class' => 'bg-secondary',
                                                        ]; // لون رمادي فاتح للحالة غير المعروفة
                                                    @endphp

                                                    <td data-label="status">
                                                        <span class="badge {{ $status_details['class'] }}">
                                                            {{ $status_details['text'] }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="gap-2 d-flex">
                                                            <a href="{{ url('admin/provider/update/' . $order['id']) }}"
                                                                class="btn-sm color-success">
                                                                <iconify-icon icon="solar:pen-2-broken"
                                                                    class="align-middle fs-18"></iconify-icon>
                                                            </a>
                                                            <button type="button" class="btn-sm color-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete_category_{{ $order['id'] }}">
                                                                <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                                    class="align-middle fs-18"></iconify-icon>
                                                            </button>
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <!-- End Container Fluid -->

    </div>

@endsection
